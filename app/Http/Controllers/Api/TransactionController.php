<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();
        return response()->json($transactions);
    }

    // public function create()
    // {
    //     return view('transactions.create');
    // }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'type' => 'required',
            'amount' => 'required|numeric',
            'reason' => 'required|string',
        ]);

        Transaction::create($request->all());
        return 'Transacción registrada';
    }

    public function show($id)
    {
        $transaction = transaction::findOrFail($id);
        return response()->json($transaction);
    }

    public function update(Request $request, transaction $transaction)
    {
        $request->validate([
            'date' => 'required|date',
            'type' => 'required',
            'amount' => 'required|numeric',
            'reason' => 'required|string'
        ]);

        $transaction->update($request->all());
        return response()->json(['message' => 'Actualizado Correctamente']);
    }

    public function destroy(transaction $transaction)
    {
        $transaction->delete();
        return response()->json(['message' => 'Eliminado Correctamente']);
    }
}
