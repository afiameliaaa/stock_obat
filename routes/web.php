<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataObatController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ObatKeluarController;
use App\Http\Controllers\ObatMasukController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\UserController;
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

Route::middleware('guest')->group(function() {
    Route::controller(AuthController::class)->group(function() {
        Route::match(['GET', 'POST'], '/', 'index')->name('login');
    });
});

Route::middleware('auth')->group(function() {
    Route::prefix('dashboard')->group(function() {
        Route::controller(DashboardController::class)->group(function() {
            Route::match(['GET'], '/', 'index')->name('dashboard');
            Route::match(['POST', 'POST'], 'logout', 'logout')->name('logout');
        });
        Route::middleware('role:apoteker')->group(function() {
            Route::prefix('obat')->group(function() {
                Route::controller(DataObatController::class)->group(function() {
                    Route::match(['GET'], '/', 'index')->name('obat.index');
                    Route::match(['GET', 'POST'], 'create', 'create')->name('obat.create');
                    Route::match(['GET', 'POST'], 'update/{id}', 'update')->name('obat.update');
                    Route::match(['GET', 'POST'], 'delete/{id}', 'delete')->name('obat.delete');
                });
                Route::prefix('masuk')->group(function() {
                    Route::controller(ObatMasukController::class)->group(function() {
                        Route::match(['GET'], '/', 'index')->name('obat.masuk.index');
                        Route::match(['GET', 'POST'], 'create', 'create')->name('obat.masuk.create');
                    });
                });
                Route::prefix('keluar')->group(function() {
                    Route::controller(ObatKeluarController::class)->group(function() {
                        Route::match(['GET'], '/', 'index')->name('obat.keluar.index');
                        Route::match(['GET', 'POST'], 'create', 'create')->name('obat.keluar.create');
                    });
                });
            });
            Route::prefix('kategori')->group(function() {
                Route::controller(KategoriController::class)->group(function() {
                    Route::match(['GET'], '/', 'index')->name('kategori.index');
                    Route::match(['GET', 'POST'], 'create', 'create')->name('kategori.create');
                    Route::match(['GET', 'POST'], 'update/{id}', 'update')->name('kategori.update');
                    Route::match(['GET', 'POST'], 'delete/{id}', 'delete')->name('kategori.delete');
                });
            });
            Route::prefix('satuan')->group(function() {
                Route::controller(SatuanController::class)->group(function() {
                    Route::match(['GET'], '/', 'index')->name('satuan.index');
                    Route::match(['GET', 'POST'], 'create', 'create')->name('satuan.create');
                    Route::match(['GET', 'POST'], 'update/{id}', 'update')->name('satuan.update');
                    Route::match(['GET', 'POST'], 'delete/{id}', 'delete')->name('satuan.delete');
                });
            });
        });
        Route::middleware('role:kabag')->group(function() {
            Route::prefix('user')->group(function() {
                Route::controller(UserController::class)->group(function() {
                    Route::match(['GET'], '/', 'index')->name('user.index');
                    Route::match(['GET', 'POST'], 'create', 'create')->name('user.create');
                    Route::match(['GET', 'POST'], 'update/{id}', 'update')->name('user.update');
                    Route::match(['GET', 'POST'], 'delete/{id}', 'delete')->name('user.delete');
                });
            });
            Route::prefix('laporan')->group(function() {
                Route::controller(LaporanController::class)->group(function() {
                    Route::match(['GET'], '/', 'index')->name('laporan.index');
                    Route::prefix('print')->group(function() {
                        //incase of adding more print like xlsx, and etc
                        Route::match(['GET'], 'pdf', 'print')->name('laporan.print');
                    });
                });
            });
        });

    });
});
