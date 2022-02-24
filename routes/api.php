<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\RoutesController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\Api\CountApiController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\AutorInstitucionalController;
use App\Http\Controllers\Api\RegistroApiController;
use Illuminate\Support\Facades\Route;

Route::get('/user', [AuthorController::class, 'index']);
Route::get('/buscar-autor-institucional', [AutorInstitucionalController::class, 'index']);
Route::get('/subject/{subject}', [SubjectController::class, 'showApi'])->name('api.subject.show');
Route::get('/search/registro', [RegistroApiController::class, 'search'])->name('api.search.registro');
Route::get('/count', [CountApiController::class, 'registros'])->name('api.count.registro');
Route::get('/latest', [RegistroApiController::class, 'latest'])->name('api.registro.latest');
Route::get('/routes', [RoutesController::class, 'show'])->name('api.routes.show');
Route::get('/search-simple', [RegistroApiController::class, 'simpleSearch'])->name('api.search.simple');

//Route::get('/tipos-registro', RegistroController::class, 'tiposRegistro');
//Route::get('/campos-tipos-registro', RegistroController::class, 'camposTiposRegistro');
//Route::get('/registro', [RegistroApiController::class, 'index'])->name('registro.index.api');
//Route::group(['middleware' => 'auth:api'], function () {
//});
