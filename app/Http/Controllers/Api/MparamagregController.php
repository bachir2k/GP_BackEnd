<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Mparamagreg\StoreMparamagregRequest;
use App\Http\Requests\Mparamagreg\UpdateMparamagregRequest;
use App\Repositories\MparamagregRepository;
use Illuminate\Http\Request;

class MparamagregController extends Controller
{
    

    public function __construct(protected MparamagregRepository $mparamagregRepo)
    {

    }


    public function index()
    {
        $mparamagregs = $this->mparamagregRepo->all();

        return response()->json([
            'success' => true,
            'data' => $mparamagregs
        ]);
    }

    public function create(StoreMparamagregRequest $request)
    {
        $mparamagreg = $this->mparamagregRepo->create($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'mparamagreg créé avec succès',
            'data' => $mparamagreg
        ], 201);
    }

    public function update(UpdateMparamagregRequest $request, $id)
    {
        $mparamagreg = $this->mparamagregRepo->update($id, $request->validated());

        if (!$mparamagreg) {
            return response()->json(['error' => 'mparamagreg non trouvé'], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'mparamagreg mis à jour',
            'data' => $mparamagreg
        ]);
    }

    public function delete($id)
    {
        $deleted = $this->mparamagregRepo->delete($id);

        if (!$deleted) {
            return response()->json(['error' => 'mparamagreg non trouvé'], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'mparamagreg supprimé avec succès'
        ]);
    }
}
