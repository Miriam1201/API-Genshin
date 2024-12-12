<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Rutas de autenticación para login y logout
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Ruta a la página principal del usuario autenticado
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Rutas de autenticación estándar proporcionadas por Laravel
Auth::routes();

// La ruta al panel de administración de Filament se genera automáticamente.
// Normalmente, puedes acceder a ella en:
// http://127.0.0.1:8000/genshin