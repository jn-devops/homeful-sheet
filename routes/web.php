<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EvaluationDocumentController;
use App\Models\EvaluationDocument;

use Illuminate\Support\Facades\Route;

// Route::resource('/store', [EvaluationController::class,'store'])->name('save');
Route::get('/', function () {
    return redirect()->route('dashboard');
});
Route::resource('documents', EvaluationDocumentController::class);

Route::post('/create-document',[EvaluationDocumentController::class,'store'])->name('create-document');
Route::get('/dashboard', function () {
    $projects = EvaluationDocumentController::get_projects();
    $documents = EvaluationDocument::all();
    return view('dashboard',compact('documents','projects'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/upload', function () {
    return view('uploadfile');
});
require __DIR__.'/auth.php';
