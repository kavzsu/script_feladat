<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScriptController;
use App\Http\Controllers\EntryController;

Route::get('/', function () {
    return view('welcome');
});

Route::redirect('/', '/scripts');

// Előadások (Script)
Route::resource('scripts', ScriptController::class);

// Forgatókönyv-bejegyzések (Entry)
Route::resource('entries', EntryController::class);

// Speciális export nézet
Route::get('/scripts/{script}/export', [ScriptController::class, 'export'])->name('scripts.export');

// Egy adott előadás bejegyzései
Route::get('/scripts/{script}/entries', [EntryController::class, 'indexByScript'])->name('scripts.entries');
