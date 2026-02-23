<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Esta es la RAIZ ('/'). Llama al método index de tu nuevo DashboardController
Route::get('/', [DashboardController::class, 'index']);

// Esta es la ruta para la vista de tus productos
Route::get('/inventario', function () {
    return view('productos.index');
});