<?php

use App\Http\Controllers\Api\TransactionController;
use App\Http\Controllers\Api\BalancesController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('tokens/create', function (Request $request) {
    $validated =  $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required|string|min:6',
    ]);
    $user = User::query()->create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => bcrypt($validated['password']),
    ]);

    $token = $user->createToken($validated['name']);

    return response()->json([
        'token' => $token->plainTextToken,
    ],201);
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/home', [BalancesController::class, 'index'])->name('api.home');
    Route::resource('balances', BalancesController::class)->names('api.balances');
    Route::resource('transactions', TransactionController::class)->names('api.transactions');;
});
