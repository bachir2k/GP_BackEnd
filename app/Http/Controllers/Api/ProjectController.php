<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Project\StoreProjectRequest;
use App\Http\Requests\Project\UpdateProjectRequest;
use App\Repositories\ProjectRepository;

class ProjectController extends Controller
{
    

    public function __construct(protected ProjectRepository $projectRepo)
    {

    }


    public function index()
    {
        $projects = $this->projectRepo->all();

        return response()->json([
            'success' => true,
            'data' => $projects
        ]);
    }

    public function create(StoreProjectRequest $request)
    {
        $projet = $this->projectRepo->create($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Projet créé avec succès',
            'data' => $projet
        ], 201);
    }

    public function update(UpdateProjectRequest $request, $id)
    {
        $project = $this->projectRepo->update($id, $request->validated());

        if (!$project) {
            return response()->json(['error' => 'Projet non trouvé'], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Projet mis à jour',
            'data' => $project
        ]);
    }

    public function delete($id)
    {
        $deleted = $this->projectRepo->delete($id);

        if (!$deleted) {
            return response()->json(['error' => 'Projet non trouvé'], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Projet supprimé avec succès'
        ]);
    }
}

