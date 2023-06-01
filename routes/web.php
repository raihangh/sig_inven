<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Dashboard\BarangController;
use App\Http\Controllers\Dashboard\DashboardController;


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
    return "user";
});

Route::middleware('auth')->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'dashboard');
        Route::get('/dashboard-kategori', 'kategori');
        Route::get('/dashboard-barang', 'barang');
        Route::get('/dashboard-input-barang', 'pageInputBarang');
        Route::get('/dashboard-laporan', 'pageLaporan');
        Route::get('/dashboard-users', 'pageUsers');
        Route::post('/dashboard-logout', 'logout')->name('logout');
    });

    Route::controller(BarangController::class)->group(function(){
        Route::post("/dashboard-kategori",'postKodeBarang');
        Route::post("/dashboard-input-barang",'postBarang');
        Route::get("/dashboard-barang-edit/{id}",'editBarang');
        Route::delete("/dashboard-barang-delete/{id}",'deleteBarang');
        Route::put("/dashboard-barang-edit/{id}",'aksiEditBarang');
        Route::put("/dashboard-barang-keluar/{id}",'barang_keluar');
    });
});

Route::middleware('guest')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/login', 'login')->name('login');
        Route::get('/register', 'register');
        Route::post('/login', 'aksiLogin');
        Route::post('/register', 'aksiRegister')->name('aksiLogin');
    });
});
