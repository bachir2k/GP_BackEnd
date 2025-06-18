<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SousComposante\StoreSousComposanteRequest;
use App\Http\Requests\SousComposante\UpdateSousComposanteRequest;
use App\Repositories\SousComposanteRepository;

class SousComposanteController extends Controller
{
    public function __construct(protected SousComposanteRepository $souscomposanteRepo)
    {

    }


    public function index()
    {
        $souscomposantes = $this->souscomposanteRepo->all();

        return response()->json([
            'success' => true,
            'data' => $souscomposantes
        ]);
    }

    public function create(StoreSousComposanteRequest $request)
    {
        $souscomposante = $this->souscomposanteRepo->create($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'sousComposante créé avec succès',
            'data' => $souscomposante
        ], 201);
    }

    public function update(UpdateSousComposanteRequest $request, $id)
    {
        $souscomposante = $this->souscomposanteRepo->update($id, $request->validated());

        if (!$souscomposante) {
            return response()->json(['error' => 'sousComposante non trouvé'], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'sousComposante mis à jour',
            'data' => $souscomposante
        ]);
    }

    public function delete($id)
    {
        $deleted = $this->souscomposanteRepo->delete($id);

        if (!$deleted) {
            return response()->json(['error' => 'sousComposante non trouvé'], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'sousComposante supprimé avec succès'
        ]);
    }
}
