<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // En Laravel, esto reemplaza a toda tu consulta SQL manual:
        $totalAlertas = Producto::whereColumn('stock', '<=', 'stock_minimo')->count();
        $totalProductos = Producto::count();

        return view('dashboard', compact('totalAlertas', 'totalProductos'));
    }
}