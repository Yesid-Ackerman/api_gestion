<?php

use App\Http\Controllers\Api\TransactionController;
use App\Http\Controllers\Api\TypeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('transactions')->group(function(){
    Route::get('/index', [TransactionController::class, 'index'])->name('transactions.index');
    Route::get('/create', [TransactionController::class, 'create'])->name('transactions.create');
    Route::post('/store', [TransactionController::class, 'store'])->name('transactions.store');
    Route::get('/show/{id}', [TransactionController::class, 'show'])->name('transactions.show');
    Route::put('/update/{transaction}', [TransactionController::class, 'update'])->name('transactions.update');
    Route::delete('/delete/{transaction}', [TransactionController::class, 'destroy'])->name('transactions.destroy');
});

Route::prefix('types')->group(function(){
    Route::get('index', [TypeController::class, 'index']);
    Route::post('store', [TypeController::class, 'store']);
    Route::get('show/{id}', [TypeController::class, 'show']);
    Route::put('update/{type}', [TypeController::class, 'update']);
    Route::delete('delete/{type}', [TypeController::class, 'destroy']);
});
