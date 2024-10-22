<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PainelController;
use Illuminate\Support\Facades\Route;


foreach (config('tenancy.central_domains') as $domain) {
    Route::domain($domain)->group(function () {
        Route::get('/', [AdminController::class, '__invoke'])->name(name: 'admin.home');
        Route::get('/painel', [PainelController::class, '__invoke'])->name(name: 'admin.painel');
        Route::get('/about', [AboutController::class, '__invoke'])->name(name: 'admin.about');
    });
}
