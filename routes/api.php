<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\AutorInstitucionalController;
use App\Http\Controllers\Api\Search\RegistroApiController;
use Illuminate\Support\Facades\Route;

Route::get('/user', [AuthorController::class, 'index']);
Route::get('/buscar-autor-institucional', [AutorInstitucionalController::class, 'index']);
Route::get('/search/registro', [RegistroApiController::class, 'search'])->name('api.search.registro');
//Route::get('/tipos-registro', RegistroController::class, 'tiposRegistro');
//Route::get('/campos-tipos-registro', RegistroController::class, 'camposTiposRegistro');
