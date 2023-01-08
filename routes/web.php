<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

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

Route::get('/', function () {
    return view('login');
});

Route::get('login', 'App\Http\Controllers\AuthController@index')->name('login');
Route::post('proses_login', 'App\Http\Controllers\AuthController@proses_login')->name('proses_login');
Route::get('/admin/dashboard/', [DashboardController::class, 'index']);
Route::get('/siswa/dashboard/', [DashboardController::class, 'siswa']);
Route::get('logout', 'App\Http\Controllers\AuthController@logout')->name('logout');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['cek_login:admin']], function () {
        // Route::resource('admin', AdminController::class);
    });
    // Route::group(['middleware' => ['cek_login:editor']], function () {
    //     Route::resource('editor', AdminController::class);
    // });
});
Route::resource('/user', '\App\Http\Controllers\UserController');
Route::resource('/petugas', '\App\Http\Controllers\PetugasController');
Route::resource('/siswa', '\App\Http\Controllers\SiswaController');
Route::resource('/kelas', '\App\Http\Controllers\KelasController');
Route::resource('/spp', '\App\Http\Controllers\SppController');
Route::resource('/pay', '\App\Http\Controllers\PayController');
Route::resource('/history', '\App\Http\Controllers\HistoryController');
Route::resource('/kartu', '\App\Http\Controllers\KartuController');
