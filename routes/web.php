<?php

use App\Http\Controllers\AutorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('principal');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/subjects', [RegistroController::class, 'subjects'])->name('subjects');
Route::get('/author', [RegistroController::class, 'author'])->name('author');
Route::get('/division', [RegistroController::class, 'division'])->name('division');
Route::get('/publication', [RegistroController::class, 'publication'])->name('publication');
Route::get('/editorial', [RegistroController::class,'editorial'])->name('editorial');
Route::get('/year', [RegistroController::class, 'year'])->name('year');

Route::resource('registro', RegistroController::class);
Route::post('subirImagen',[RegistroController::class, 'subirImagen']);
Route::resource('autor', AutorController::class);

Route::group(['middleware' => 'auth'], function () {
	Route::get('table-list', function () {
		return view('pages.table_list');
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

Route::group(['middleware' => 'auth'], function () {
//    Route::resource('/config/admin', AdminController::class)->except(['create', 'show']);
	Route::resource('user', UserController::class)->except(['show']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'password'])->name('profile.password');
});
