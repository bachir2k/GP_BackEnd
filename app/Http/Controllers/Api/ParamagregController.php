<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Paramagreg\StoreParamagregRequest;
use App\Http\Requests\Paramagreg\UpdateParamagregRequest;
use App\Repositories\ParamagregRepository;
use Illuminate\Http\Request;

class ParamagregController extends Controller
{
    

    public function __construct(protected ParamagregRepository $paramagregRepo)
    {

    }


    public function index()
    {
        $paramagregs = $this->paramagregRepo->all();

        return response()->json([
            'success' => true,
            'data' => $paramagregs
        ]);
    }

    public function create(StoreParamagregRequest $request)
    {
        $paramagreg = $this->paramagregRepo->create($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'paramagreg créé avec succès',
            'data' => $paramagreg
        ], 201);
    }

    public function update(UpdateParamagregRequest $request, $id)
    {
        $paramagreg = $this->paramagregRepo->update($id, $request->validated());

        if (!$paramagreg) {
            return response()->json(['error' => 'paramagreg non trouvé'], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'paramagreg mis à jour',
            'data' => $paramagreg
        ]);
    }

    public function delete($id)
    {
        $deleted = $this->paramagregRepo->delete($id);

        if (!$deleted) {
            return response()->json(['error' => 'paramagreg non trouvé'], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'paramagreg supprimé avec succès'
        ]);
    }
}
