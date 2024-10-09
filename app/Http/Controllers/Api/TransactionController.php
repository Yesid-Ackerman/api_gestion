<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = transaction::all();
        return response()->json($transactions);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'type_id' => 'required|exists:types,id',
            'amount' => 'required|numeric',
            'reason' => 'required|string',
        ]);

        transaction::create($request->all());

        return response()->json(['message' => 'Transacción registrada correctamente.'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $transaction = transaction::findOrFail($id);
        return response()->json($transaction);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, transaction $id)
    {
        $request->validate([
            'date' => 'required|date',
            'type_id' => 'required|exists:types,id',
            'amount' => 'required|numeric',
            'reason' => 'required|string',
        ]);

        $id->update($request->all());

        return response()->json(['message' => 'Transacción actualizada correctamente.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(transaction $transaction)
    {
        $transaction->delete();

        return response()->json(['message' => 'Transacción eliminada correctamente.']);
    }
}
