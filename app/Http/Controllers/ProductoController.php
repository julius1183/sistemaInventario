<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $productos = \App\Models\Producto::all();
    
    return response()->json($productos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    
public function store(Request $request)
{
    $producto = \App\Models\Producto::create($request->all());

    return response()->json([
        'message' => 'Producto creado con éxito',
        'data' => $producto
    ], 201);
}
    /**
     * Display the specified resource.
     */
   public function show($id)
{
    $producto = \App\Models\Producto::find($id);

    if (!$producto) {
        return response()->json(['message' => 'Producto no encontrado'], 404);
    }

    return response()->json($producto);
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, $id)
{
    $producto = \App\Models\Producto::find($id);

    if (!$producto) {
        return response()->json(['message' => 'Producto no encontrado'], 404);
    }

    $producto->update($request->all());

    return response()->json([
        'message' => 'Producto actualizado con éxito',
        'data' => $producto
    ]);
}

    /**
     * Remove the specified resource from storage.
     */
   public function destroy($id)
{
    $producto = \App\Models\Producto::find($id);

    if (!$producto) {
        return response()->json(['message' => 'Producto no encontrado'], 404);
    }

    $producto->delete();

    return response()->json(['message' => 'Producto eliminado correctamente']);
}
}
