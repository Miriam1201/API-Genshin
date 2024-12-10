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

    /**
     * Muestra los equipos donde aparece un personaje.
     *
     * @param  string  $characterName
     * @return \Illuminate\Http\JsonResponse
     */
    public function findByCharacter($characterName)
    {
        $teams = Team::with(['mainDps', 'subDps', 'support', 'healerShielder'])
            ->whereHas('mainDps', function ($query) use ($characterName) {
                $query->where('id', $characterName);
            })
            ->orWhereHas('subDps', function ($query) use ($characterName) {
                $query->where('id', $characterName);
            })
            ->orWhereHas('support', function ($query) use ($characterName) {
                $query->where('id', $characterName);
            })
            ->orWhereHas('healerShielder', function ($query) use ($characterName) {
                $query->where('id', $characterName);
            })
            ->get();

        if ($teams->isEmpty()) {
            return response()->json(['message' => 'No teams found for the given character'], 404);
        }

        return response()->json($teams);
    }

}