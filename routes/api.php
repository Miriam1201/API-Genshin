<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\CharacterController;
use App\Http\Controllers\API\ArtifactController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('characters')->group(function () {
    Route::get('/paginate', [CharacterController::class, 'paginate']); // Paginación
    Route::get('/', [CharacterController::class, 'index']); // Todos los personajes
    Route::get('/{id}', [CharacterController::class, 'show']); // Un personaje específico
});


Route::prefix('artifacts')->group(function () {
    Route::get('/paginate', [ArtifactController::class, 'paginate']); // Paginación (debe ir antes)
    Route::get('/', [ArtifactController::class, 'index']); // Todos los artefactos
    Route::get('/{id}', [ArtifactController::class, 'show']); // Artefacto específico
});