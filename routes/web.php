<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Web\BalancesController;
use App\Http\Controllers\Web\EmailVerificationController;
use App\Http\Controllers\Web\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::resource('send_code_email', EmailVerificationController::class);

Route::middleware('auth')->group(function () {
    Route::get('/home', [BalancesController::class, 'index'])->name('home');
    Route::resource('balances', BalancesController::class);
    Route::resource('transactions', TransactionController::class);
});

