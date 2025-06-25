<?php

namespace Database\Seeders;

use App\Models\Profil;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Structure hiérarchique
        $modules = config('permission.permissions-structure');

        
        $profilsConfig = config('permission.profil'); // Récupération de la configuration des rôles
        
        foreach ($profilsConfig as $profilName => $modules) {
            // Cas spécial pour les administrateurs
            if ($modules === 'all') {
                $profil = Profil::firstOrCreate(['name' => $profilName]);
                $profil->syncPermissions(Permission::all());
                continue;
            }

            $profil = Profil::firstOrCreate(['name' => $profilName]);
            $permissions = $this->extractPermissions($modules);

            foreach ($permissions as $permissionName) {
                $permission = Permission::firstOrCreate(['name' => $permissionName]);
                $profil->givePermissionTo($permission);
            }
        }
    }

    /**
     * Fonction récursive pour extraire toutes les permissions de la structure imbriquée.
     */
    private function extractPermissions(array $modules, string $prefix = ''): array
    {
        $permissions = [];

        foreach ($modules as $key => $value) {
            if (is_array($value)) {
                if ($this->isAssoc($value)) {
                    // encore un niveau (ex: 'activite' => ['view', 'edit', ...])
                    $permissions = array_merge(
                        $permissions,
                        $this->extractPermissions($value, $prefix . $key . '.')
                    );
                } else {
                    // fin de l'arbre : liste d'actions
                    foreach ($value as $action) {
                        $permissions[] = $prefix . $key . '.' . $action;
                    }
                }
            } else {
                // Cas exceptionnel : simple chaîne de caractère
                $permissions[] = $prefix . $value;
            }
        }

        return $permissions;
    }

    /**
     * Détecte si un tableau est associatif (au moins une clé non entière)
     */
    private function isAssoc(array $array): bool
    {
        return array_keys($array) !== range(0, count($array) - 1);
    }

}
