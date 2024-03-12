<?php

use App\Http\Controllers\LibroController;
use Illuminate\Support\Facades\Route;

Route::resource('/libro', LibroController::class);
Route::get('/libro/{id}/destroy', [LibroController::class, 'libroDestroy']);
