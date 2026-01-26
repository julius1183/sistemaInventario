<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    // Obtenemos todos los registros de la tabla personas
    $personas = Persona::all();

    // Los devolvemos como una lista en formato JSON
    return response()->json($personas, 200);
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
{
    // 1. Validamos los datos antes de hacer cualquier cosa
    $request->validate([
        'nombre'   => 'required|string|max:50',
        'apellido' => 'required|string|max:50',
        'telefono' => 'required|numeric',
        'email'    => 'required|email|unique:personas,email',
    ]);

    // 2. Si la validación pasa, se crea el registro
    $persona = Persona::create($request->all());

    return response()->json([
        'message' => 'Creado con éxito',
        'data' => $persona
    ], 201);
}

    /**
     * Display the specified resource.
     */
    public function show(Persona $persona)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Persona $persona)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Persona $persona)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Persona $persona)
    {
        //
    }

    
}
