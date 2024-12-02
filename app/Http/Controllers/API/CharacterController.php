<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Character;

class CharacterController extends Controller
{
    /**
     * Muestra todos los personajes.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $characters = Character::all();
        return response()->json($characters);
    }

    /**
     * Muestra un personaje específico.
     *
     * @param  string  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(string $id)
    {
        $character = Character::find($id);

        if (!$character) {
            return response()->json(['message' => 'Character not found'], 404);
        }

        return response()->json($character);
    }

    /**
     * Muestra una lista de personajes paginada.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function paginate(Request $request)
    {
        $perPage = $request->query('per_page', 10);
        $search = $request->query('search', '');
    
        $query = Character::query();
    
        if ($search) {
            $query->where('name', 'like', "%{$search}%");
        }
    
        $characters = $query->paginate($perPage);
    
        return response()->json($characters, 200);
    }
}
