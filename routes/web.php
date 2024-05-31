<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CalonController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Pemilih;
use App\Http\Middleware\WaktuPemilihan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'login'])->name('ayopilih.login');
Route::post('/auth', [HomeController::class, 'auth'])->name('ayopilih.auth');
Route::get('/waktu-pemilihan', [HomeController::class, 'waktuPemilihan'])->name('ayopilih.time');

Route::middleware([Pemilih::class, WaktuPemilihan::class])->group(function () {
    Route::get('/home', [HomeController::class, 'ayopilih'])->name('ayopilih');
    Route::get('/detail/calon/{calon}', [HomeController::class, 'detail'])->name('detailcalon');
    Route::post('/pilih', [HomeController::class, 'pilih'])->name('pilih');

    Route::post('/logout', [HomeController::class, 'logout'])->name('ayopilih.logout');
});


Route::prefix('panel')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/auth', [AuthController::class, 'auth'])->name('auth');

    Route::middleware('auth')->group(function () {
        Route::get('/', [dashboardController::class, 'index'])->name('dashboard');

        Route::resource('mahasiswa', MahasiswaController::class);
        Route::resource('users', UserController::class);
        Route::resource('calon', CalonController::class);

        Route::get('setting', [SettingController::class, 'index'])->name('setting.index');
        Route::put('setting/waktu-pemilihan', [SettingController::class, 'waktuPemilihan'])->name('setting.waktuPemilihan');
        Route::post('setting/reset-pemilihan', [SettingController::class, 'resetPemilihan'])->name('setting.resetPemilihan');

        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    });
});