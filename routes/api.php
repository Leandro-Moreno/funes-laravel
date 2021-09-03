<?php

use App\Http\Controllers\AutorController;
use App\Http\Controllers\AutorInstitucionalController;
use App\Http\Controllers\RegistroController;
use Illuminate\Support\Facades\Route;

Route::get('/user', [AutorController::class, 'index']);
Route::get('/buscar-autor-institucional', [AutorInstitucionalController::class, 'index']);
//Route::get('/tipos-registro', RegistroController::class, 'tiposRegistro');
//Route::get('/campos-tipos-registro', RegistroController::class, 'camposTiposRegistro');
