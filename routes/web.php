<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\site\HomeController;
use App\Http\Controllers\site\DocumentController;
use App\Http\Controllers\site\PhoneController;

Route::namespace('Site')->group(function () {
    Route::get('/', [HomeController::class, '__invoke'])->name(name: 'site.home');
    Route::get('ramais', [PhoneController::class, '__invoke'])->name(name: 'site.phone');
    Route::get('documentos', [DocumentController::class, '__invoke'])->name(name: 'site.document');
});
