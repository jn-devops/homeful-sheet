<?php

use App\Http\Controllers\EvaluateController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('evaluate', EvaluateController::class)
    ->name('evaluate');
