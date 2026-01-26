<?php

use App\Http\Controllers\PersonaController;
use Illuminate\Support\Facades\Route;

// Esta línea crea automáticamente todas las rutas necesarias (GET, POST, PUT, DELETE)
Route::apiResource('personas', PersonaController::class);

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

Route::delete('/personas/{id}', [PersonaController::class, 'destroy']);
