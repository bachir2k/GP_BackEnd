<?php

namespace App\Repositories;

use App\Models\Composante;

class ComposanteRepository 
{
    public function all()
    {
        return Composante::all();
    }

    public function create(array $data)
    {
        return Composante::create($data);
    }

    public function update($id, array $data)
    {
        $composante = Composante::find($id);

        if (!$composante) {
            return null;
        }

        $composante->update($data);
        return $composante;
    }

    public function delete($id)
    {
        $composante = Composante::find($id);

        if (!$composante) {
            return false;
        }

        return $composante->delete();
    }
}
