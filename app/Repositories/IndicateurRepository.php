<?php

namespace App\Repositories;

use App\Models\Indicateur;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;


class IndicateurRepository 
{
    public function all()
    {
        return Indicateur::all();
    }

    public function create(array $data)
    {
        return Indicateur::create($data);
    }

    public function update($id, array $data)
    {
        $indicateur = Indicateur::find($id);

        if (!$indicateur) {
            return null;
        }

        $indicateur->update($data);
        return $indicateur;
    }

    public function delete($id)
    {
        $indicateur = Indicateur::find($id);

        if (!$indicateur) {
            return false;
        }

        return $indicateur->delete();
    }
}
