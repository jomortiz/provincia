<?php

use App\Http\Controllers\ProvinciasController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/provincias', [ProvinciasController::class, 'index'])->name('provincias.index');
Route::post('/provincias/store', [ProvinciasController::class, 'store'])->name('provincias.store');
