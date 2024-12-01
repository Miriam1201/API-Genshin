<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Artifact;
use App\Http\Controllers\Controller;

class ArtifactController extends Controller
{
    /**
     * Muestra todos los artefactos.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $artifacts = Artifact::all();
        return response()->json($artifacts, 200);
    }

    /**
     * Muestra un artefacto específico.
     *
     * @param  string  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $artifact = Artifact::find($id);

        if (!$artifact) {
            return response()->json(['message' => 'Artifact not found'], 404);
        }

        return response()->json($artifact, 200);
    }

    /**
     * Muestra una lista de artefactos paginada.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function paginate(Request $request)
    {
        $perPage = $request->query('per_page', 10); // Default: 10 items per page
        $artifacts = Artifact::paginate($perPage);
        return response()->json($artifacts, 200);
    }
}
