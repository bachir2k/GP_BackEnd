<?php

namespace App\Repositories;

use App\Models\Activite;

class ActiviteRepository 
{
    public function all()
    {
        return Activite::all();
    }

    public function create(array $data)
    {
        return Activite::create($data);
    }

    public function update($id, array $data)
    {
        $activite = Activite::find($id);

        if (!$activite) {
            return null;
        }

        $activite->update($data);
        return $activite;
    }

    public function delete($id)
    {
        $activite = Activite::find($id);

        if (!$activite) {
            return false;
        }

        return $activite->delete();
    }
}