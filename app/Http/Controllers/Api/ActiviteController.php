<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Activite\StoreActiviteRequest;
use App\Http\Requests\Activite\UpdateActiviteRequest;
use App\Repositories\ActiviteRepository;

class ActiviteController extends Controller
{
    public function __construct(protected ActiviteRepository $activiteRepo)
    {

    }


    public function index()
    {
        $activites = $this->activiteRepo->all();

        return response()->json([
            'success' => true,
            'data' => $activites
        ]);
    }

    public function create(StoreActiviteRequest $request)
    {
        $activite = $this->activiteRepo->create($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'activite créé avec succès',
            'data' => $activite
        ], 201);
    }

    public function update(UpdateActiviteRequest $request, $id)
    {
        $activite = $this->activiteRepo->update($id, $request->validated());

        if (!$activite) {
            return response()->json(['error' => 'activite non trouvé'], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'activite mis à jour',
            'data' => $activite
        ]);
    }

    public function delete($id)
    {
        $deleted = $this->activiteRepo->delete($id);

        if (!$deleted) {
            return response()->json(['error' => 'activite non trouvé'], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'activite supprimé avec succès'
        ]);
    }
}
