<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = transaction::included()->get();
        return response()->json($transactions);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $user_id = Auth::id();
        $data['user_id'] = $user_id;
        $transaction = transaction::create($data);
        return response()->json( $transaction);
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
        $data = $request->all();
        $user_id = Auth::user()->id;
        $data['user_id'] = $user_id;
        $id -> update($data);

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
