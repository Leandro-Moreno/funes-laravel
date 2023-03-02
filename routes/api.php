<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\RoutesController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\Api\CountApiController;
use App\Http\Controllers\Api\Auth\ApiLoginController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\AuthorInstitutionalController;
use App\Http\Controllers\Api\RegistroApiController;
use Illuminate\Support\Facades\Route;

Route::get('/user', [AuthorController::class, 'index']);
Route::get('/buscar-autor-institucional', [AuthorInstitutionalController::class, 'index']);
Route::get('/subject/{subject}', [SubjectController::class, 'showApi'])->name('api.subject.show');
Route::get('/search/registro', [RegistroApiController::class, 'search'])->name('api.search.registro');
Route::get('/count', [CountApiController::class, 'registros'])->name('api.count.registro');
Route::get('/latest', [RegistroApiController::class, 'latest'])->name('api.registro.latest');
Route::get('/routes', [RoutesController::class, 'show'])->name('api.routes.show');
Route::get('/search-simple', [RegistroApiController::class, 'simpleSearch'])->name('api.search.simple');
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/subject', [SubjectController::class, 'indexApi'])->name('api.subject.index');
    Route::post('/subject', [SubjectController::class, 'store'])->name('api.subject.store');
    Route::get('/subject/{subject}', [SubjectController::class, 'showApi'])->name('api.subject.show');
    Route::put('/subject/{subject}', [SubjectController::class, 'update'])->name('api.subject.update');
    Route::delete('/subject/{subject}', [SubjectController::class, 'destroy'])->name('api.subject.destroy');
    Route::get('/subject/create', [SubjectController::class, 'create'])->name('api.subject.create');
    Route::get('/subject/{subject}/edit', [SubjectController::class, 'edit'])->name('api.subject.edit');
    Route::post('/subject/show-array', [SubjectController::class, 'showArray'])->name('api.subject.show.array');
});


//sanctum
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/auth/session', [ApiLoginController::class,'__invoke']);

