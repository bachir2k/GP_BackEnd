<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Indicateur\StoreIndicateurRequest;
use App\Http\Requests\Indicateur\UpdateIndicateurRequest;
use App\Repositories\IndicateurRepository;
use Illuminate\Http\Request;

class IndicateurController extends Controller
{
    

    public function __construct(protected IndicateurRepository $indicateurRepo)
    {

    }


    public function index()
    {
        $indicateurs = $this->indicateurRepo->all();

        return response()->json([
            'success' => true,
            'data' => $indicateurs
        ]);
    }

    public function create(StoreIndicateurRequest $request)
    {
        $indicateur = $this->indicateurRepo->create($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'indicateur créé avec succès',
            'data' => $indicateur
        ], 201);
    }

    public function update(UpdateIndicateurRequest $request, $id)
    {
        $indicateur = $this->indicateurRepo->update($id, $request->validated());

        if (!$indicateur) {
            return response()->json(['error' => 'indicateur non trouvé'], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'indicateur mis à jour',
            'data' => $indicateur
        ]);
    }

    public function delete($id)
    {
        $deleted = $this->indicateurRepo->delete($id);

        if (!$deleted) {
            return response()->json(['error' => 'indicateur non trouvé'], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'indicateur supprimé avec succès'
        ]);
    }
}