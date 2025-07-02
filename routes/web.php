<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn() => 'Laravel is working ✅');


//Route::middleware(['role:admin'])->group(function () {
  //  Route::post('/wallet/debit', [WalletController::class, 'debit']);
//});
