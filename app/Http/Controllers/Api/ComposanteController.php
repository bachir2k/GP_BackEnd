<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Composante\StoreComposanteRequest;
use App\Http\Requests\Composante\UpdateComposanteRequest;
use App\Repositories\ComposanteRepository;

class ComposanteController extends Controller
{
    public function __construct(protected ComposanteRepository $composanteRepo)
    {

    }


    public function index()
    {
        $composantes = $this->composanteRepo->all();

        return response()->json([
            'success' => true,
            'data' => $composantes
        ]);
    }

    public function create(StoreComposanteRequest $request)
    {
        $composante = $this->composanteRepo->create($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Composante créé avec succès',
            'data' => $composante
        ], 201);
    }

    public function update(UpdateComposanteRequest $request, $id)
    {
        $composante = $this->composanteRepo->update($id, $request->validated());

        if (!$composante) {
            return response()->json(['error' => 'Composante non trouvé'], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Composante mis à jour',
            'data' => $composante
        ]);
    }

    public function delete($id)
    {
        $deleted = $this->composanteRepo->delete($id);

        if (!$deleted) {
            return response()->json(['error' => 'Composante non trouvé'], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Composante supprimé avec succès'
        ]);
    }
}
