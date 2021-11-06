<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('principal');
})->name('inicio');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/latest', [RegistroController::class, 'latest'])->name('Registrolatest');
Route::get('/publication', [RegistroController::class, 'publication'])->name('publication');
Route::get('/editorial', [RegistroController::class,'editorial'])->name('editorial');
Route::get('/year/{year}', [RegistroController::class, 'yearShow'])->name('year.show');
Route::get('/view/{year}.html', function ($year) {
    return Redirect::to(route('year.show', $year),301);
});
Route::get('/year', [RegistroController::class, 'year'])->name('year');

Route::resource('registro', RegistroController::class);
Route::resource('author', AuthorController::class);
Route::resource('division', DivisionController::class);
Route::resource('subject', SubjectController::class);

Route::get('/eprint/id/{document}', [RegistroController::class, 'show']);
Route::get('/{eprint:[0-9]+}/{pos:[0-9]+}/{document}', [DocumentController::class, 'showFile']);
Route::post('subirImagen',[RegistroController::class, 'subirImagen']);

Route::group(['middleware' => 'auth'], function () {
//    Route::resource('/config/admin', AdminController::class)->except(['create', 'show']);

    Route::resource('user', UserController::class);
    Route::put('/registro-attach/{registro}', [RegistroController::class, 'attachUser'])->name('registro.attach.user');
    Route::get('/registros/massive', [RegistroController::class, 'massiveFiles'])->name('registro.massive');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'password'])->name('profile.password');
});


Route::group(['middleware' => 'auth'], function () {
    Route::get('table-list', function () {
        return view('pages.table_list');
    })->name('table');
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('table');

    Route::get('typography', function () {
        return view('pages.typography');
    })->name('typography');

    Route::get('icons', function () {
        return view('pages.icons');
    })->name('icons');

    Route::get('map', function () {
        return view('pages.map');
    })->name('map');

    Route::get('notifications', function () {
        return view('pages.notifications');
    })->name('notifications');

    Route::get('rtl-support', function () {
        return view('pages.language');
    })->name('language');

    Route::get('upgrade', function () {
        return view('pages.upgrade');
    })->name('upgrade');
});


Route::get('/{registro}', function ($registro) {
    return Redirect::to(route('registro.show', $registro),301);
})->where('registro', '[0-9]+')->name('registroid');
