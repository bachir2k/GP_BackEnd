<?php

namespace App\Repositories;

use App\Models\Paramagreg;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class ParamagregRepository.
 */
class ParamagregRepository 
{
    public function all()
    {
        return Paramagreg::all();
    }

    public function create(array $data)
    {
        return Paramagreg::create($data);
    }

    public function update($id, array $data)
    {
        $mparamagreg = Paramagreg::find($id);

        if (!$mparamagreg) {
            return null;
        }

        $mparamagreg->update($data);
        return $mparamagreg;
    }

    public function delete($id)
    {
        $mparamagreg = Paramagreg::find($id);

        if (!$mparamagreg) {
            return false;
        }

        return $mparamagreg->delete();
    }
}
