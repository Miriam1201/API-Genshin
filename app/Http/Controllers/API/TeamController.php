<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;

class TeamController extends Controller
{
    /**
     * Muestra todos los equipos.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $teams = Team::with(['mainDps', 'subDps', 'support', 'healerShielder'])->get();
        return response()->json($teams);
    }

    /**
     * Muestra un equipo específico.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $team = Team::with(['mainDps', 'subDps', 'support', 'healerShielder'])->find($id);

        if (!$team) {
            return response()->json(['message' => 'Team not found'], 404);
        }

        return response()->json($team);
    }
}