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

/*
|--------------------------------------------------------------------------
| Admininistrator Routes
|--------------------------------------------------------------------------
|
| Here is where you can register administrator routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "administrator" middleware group. Now create something great!
|
*/
Route::group(['prefix' => 'administrator'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::group(['prefix' => 'import'], function () {
        Route::get('process', [RegistroController::class, 'massiveFolders'])->name('registro.process');
        Route::get('users', [UserController::class, 'massive'])->name('user.import');
        Route::post('users', [UserController::class, 'import']);
    });
});
