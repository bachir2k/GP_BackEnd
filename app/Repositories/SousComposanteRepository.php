<?php

namespace App\Repositories;

use App\Models\SousComposante;

class SousComposanteRepository 
{
   public function all()
    {
        return SousComposante::all();
    }

    public function create(array $data)
    {
        return SousComposante::create($data);
    }

    public function update($id, array $data)
    {
        $Souscomposante = SousComposante::find($id);

        if (!$Souscomposante) {
            return null;
        }

        $Souscomposante->update($data);
        return $Souscomposante;
    }

    public function delete($id)
    {
        $Souscomposante = SousComposante::find($id);

        if (!$Souscomposante) {
            return false;
        }

        return $Souscomposante->delete();
    }
}
