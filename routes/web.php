<?php

use App\Http\Controllers\LinkController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/537/{shortUrl}', [LinkController::class, 'show'])->name('link.show');

Route::get('document', [\App\Http\Controllers\DocumentController::class, 'preview'])
    ->name('document');
