<?php

use App\Http\Controllers\Api\TransactionController;
use App\Http\Controllers\Api\TypeController;
use App\Http\Controllers\AuthController;
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

Route::group([

    'middleware' => 'auth:api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [AuthController::class,'login'])->withoutMiddleware('auth:api');
    Route::post('logout', [AuthController::class,'logout']);
    Route::post('refresh', [AuthController::class,'refresh']);
    Route::post('me', [AuthController::class,'me']);

});

Route::group([

    'middleware' => 'auth:api'

], function ($router) {
    Route::apiResource('transactions',TransactionController::class);
    Route::apiResource('types',TypeController::class);
});
