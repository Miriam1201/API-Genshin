<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Weapon;

class WeaponController extends Controller
{
    /**
     * Muestra todas las armas.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $weapons = Weapon::all();
        return response()->json($weapons);
    }

    /**
     * Muestra una arma específica.
     *
     * @param  string  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(string $id)
    {
        $weapon = Weapon::find($id);

        if (!$weapon) {
            return response()->json(['message' => 'Weapon not found'], 404);
        }

        return response()->json($weapon);
    }

    /**
     * Muestra una lista de armas paginada.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function paginate(Request $request)
    {
        $perPage = $request->query('per_page', 10);
        $search = $request->query('search', '');

        $query = Weapon::query();

        if ($search) {
            $query->where('name', 'type', "%{$search}%");
        }

        $weapons = $query->paginate($perPage);

        return response()->json($weapons, 200);
    }
}