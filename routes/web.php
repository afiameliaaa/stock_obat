<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/obat-masuk', [App\Http\Controllers\ObatMasukController::class, 'index'])->name('obat-masuk');
Route::get('/obat-keluar', [App\Http\Controllers\ObatKeluarController::class, 'index'])->name('obat_keluar.index');
Route::get('/laporan', [App\Http\Controllers\LaporanController::class, 'index'])->name('laporan');

Route::get('/data_obat', [App\Http\Controllers\DataObatController::class, 'index'])->name('data_obat.index');
Route::get('/data_obat/create', [App\Http\Controllers\DataObatController::class, 'create'])->name('data_obat.create');
Route::post('/data_obat', [App\Http\Controllers\DataObatController::class, 'store'])->name('data_obat.store');
Route::get('/data_obat/edit/{kode_obat}', [App\Http\Controllers\DataObatController::class, 'edit'])->name('data_obat.edit');
Route::put('/data_obat/{kode_obat}', [App\Http\Controllers\DataObatController::class, 'update'])->name('data_obat.update');
Route::delete('/data_obat/{kode_obat}', [App\Http\Controllers\DataObatController::class, 'destroy'])->name('data_obat.destroy');

Route::get('/obat_keluar/create', [App\Http\Controllers\ObatKeluarController::class, 'create'])->name('obat_keluar.create');
Route::post('/obat_keluar', [App\Http\Controllers\ObatKeluarController::class, 'store'])->name('obat_keluar.store');