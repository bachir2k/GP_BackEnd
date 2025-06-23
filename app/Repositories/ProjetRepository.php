<?php

namespace App\Repositories;

use App\Models\Projet;

class ProjetRepository 
{
    
    public function all()
    {
        return Projet::all();
    }


    public function create(array $data)
    {
        return Projet::create($data);
    }

    public function update($id, array $data)
    {
        $projet = Projet::find($id);

        if (!$projet) {
            return null;
        }

        $projet->update($data);
        return $projet;
    }

    public function delete($id)
    {
        $projet = Projet::find($id);

        if (!$projet) {
            return false;
        }

        return $projet->delete();
    }
}
