<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['role:admin'])->group(function () {
    Route::post('/wallet/debit', [WalletController::class, 'debit']);
});
