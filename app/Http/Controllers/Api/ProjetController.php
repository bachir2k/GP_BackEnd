<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Projet\StoreProjetRequest;
use App\Http\Requests\Projet\UpdateProjetRequest;
use App\Repositories\ProjetRepository;
use Illuminate\Http\Request;


class ProjetController extends Controller
{
    public function __construct(protected ProjetRepository $projetRepo) {}

    public function index()
    {
        $projets = $this->projetRepo->all();

        return response()->json([
            'success' => true,
            'data' => $projets
        ]);
    }

     public function create(StoreProjetRequest $request)
    {
        $projet = $this->projetRepo->create($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Projet créé avec succès',
            'data' => $projet
        ], 201);
    }

    public function update(UpdateProjetRequest $request, $id)
    {
        $projet = $this->projetRepo->update($id, $request->validated());

        if (!$projet) {
            return response()->json(['error' => 'Projet non trouvé'], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Projet mis à jour',
            'data' => $projet
        ]);
    }

    public function delete($id)
    {
        $deleted = $this->projetRepo->delete($id);

        if (!$deleted) {
            return response()->json(['error' => 'Projet non trouvé'], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Projet supprimé avec succès'
        ]);
    }
    
}
