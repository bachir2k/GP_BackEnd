<?php

namespace App\Repositories;

use App\Models\Mparamagreg;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

class MparamagregRepository 
{
    public function all()
    {
        return Mparamagreg::all();
    }

    public function create(array $data)
    {
        return Mparamagreg::create($data);
    }

    public function update($id, array $data)
    {
        $mparamagreg = Mparamagreg::find($id);

        if (!$mparamagreg) {
            return null;
        }

        $mparamagreg->update($data);
        return $mparamagreg;
    }

    public function delete($id)
    {
        $mparamagreg = Mparamagreg::find($id);

        if (!$mparamagreg) {
            return false;
        }

        return $mparamagreg->delete();
    }
}
