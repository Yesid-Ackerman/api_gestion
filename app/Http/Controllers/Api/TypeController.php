<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::all();
        return response()->json($types);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string'
        ]);

        Type::create([
            'type' => $request->type,
        ]);

        return response()->json(['message' => 'Tipo de transacción creado con éxito.'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $type = Type::findOrFail($id);
        return response()->json($type);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $type)
    {
        $request->validate([
            'type' => 'required|string'
        ]);

        $type->update([
            'type' => $request->type,
        ]);

        return response()->json(['message' => 'Tipo de transacción actualizado con éxito.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $type->delete();

        return response()->json(['message' => 'Tipo de transacción eliminado con éxito.']);
    }
}
