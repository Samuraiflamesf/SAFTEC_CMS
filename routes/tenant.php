<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\PhoneController;
use App\Http\Controllers\Site\DocumentController;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {
    Route::namespace('Site.client')->group(function () {
        Route::get('documentos', [DocumentController::class, '__invoke'])->name(name: 'client.document');});
        Route::get('ramais', [PhoneController::class, '__invoke'])->name(name: 'client.phone');
        Route::get('/', [HomeController::class, '__invoke'])->name(name: 'client.home');
});