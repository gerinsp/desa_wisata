<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\guest\HomeController::class, 'index']);
Route::get('/desa', function () {
    return redirect('/');
});
Route::get('desa/we', [\App\Http\Controllers\guest\HomeController::class, 'list_desa']);

Auth::routes();

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/home', [\App\Http\Controllers\admin\HomeController::class, 'index'])->name('home');
    Route::resource('desa', \App\Http\Controllers\admin\DesaController::class);
    Route::resource('fasilitas', \App\Http\Controllers\admin\FasilitasController::class);
    Route::resource('kegiatan', \App\Http\Controllers\admin\KegiatanController::class);
});
