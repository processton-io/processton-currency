<?php
use Processton\ProcesstonCurrency\Http\Controllers\CurrencyController;

Route::middleware([
    'web'
])->group(function () {

    Route::get('/list', [CurrencyController::class, 'index'])->name('processton-app-currency.index');

    Route::any('/invite', [CurrencyController::class, 'invite'])->name('processton-app-currency.invite');
    Route::any('/block', [CurrencyController::class, 'blockCurrency'])->name('processton-app-currency.block');
    Route::any('/un-block', [CurrencyController::class, 'allowCurrency'])->name('processton-app-currency.un_block');
    
});


Route::middleware([
    'api'
])->group(function () {

    Route::get('/list', [CurrencyController::class, 'index'])->name('processton-app-currency.api.index');
    
    
});