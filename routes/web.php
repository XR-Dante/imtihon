<?php

use App\Http\Controllers\BalancesController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [BalancesController::class, 'index'])->name('home');
Route::resource('balances', BalancesController::class);
Route::resource('transactions', TransactionController::class);
//Route::get('readtransaction', [BalancesController::class, 'readtransaction'])->name('readtransaction');
//Route::get('/transactions/create{id}', [TransactionController::class, 'create'])->name('transactions.create');
