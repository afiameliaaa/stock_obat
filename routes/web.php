<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::redirect('/', '/login');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/obat-masuk', [App\Http\Controllers\ObatMasukController::class, 'index'])->name('obat_masuk.index');
Route::get('/obat-keluar', [App\Http\Controllers\ObatKeluarController::class, 'index'])->name('obat_keluar.index');
Route::get('/laporan', [App\Http\Controllers\LaporanController::class, 'index'])->name('laporan');
Route::get('/print-pdf', [App\Http\Controllers\LaporanController::class, 'printPdf']);

Route::get('/data_obat', [App\Http\Controllers\DataObatController::class, 'index'])->name('data_obat.index');
Route::get('/data_obat/create', [App\Http\Controllers\DataObatController::class, 'create'])->name('data_obat.create');
Route::post('/data_obat', [App\Http\Controllers\DataObatController::class, 'store'])->name('data_obat.store');
Route::get('/data_obat/edit/{kode_obat}', [App\Http\Controllers\DataObatController::class, 'edit'])->name('data_obat.edit');
Route::put('/data_obat/{kode_obat}', [App\Http\Controllers\DataObatController::class, 'update'])->name('data_obat.update');
Route::delete('/data_obat/{kode_obat}', [App\Http\Controllers\DataObatController::class, 'destroy'])->name('data_obat.destroy');

Route::get('/kategori', [App\Http\Controllers\KategoriController::class, 'index'])->name('kategori.index');
Route::get('/kategori/create', [App\Http\Controllers\KategoriController::class, 'create'])->name('kategori.create');
Route::post('/kategori', [App\Http\Controllers\KategoriController::class, 'store'])->name('kategori.store');
Route::get('/kategori/edit/{id}', [App\Http\Controllers\KategoriController::class, 'edit'])->name('kategori.edit');
Route::put('/kategori/{id}', [App\Http\Controllers\KategoriController::class, 'update'])->name('kategori.update');
Route::delete('/kategori/{id}', [App\Http\Controllers\KategoriController::class, 'destroy'])->name('kategori.destroy');

Route::get('/satuan', [App\Http\Controllers\SatuanController::class, 'index'])->name('satuan.index');
Route::get('/satuan/create', [App\Http\Controllers\SatuanController::class, 'create'])->name('satuan.create');
Route::post('/satuan', [App\Http\Controllers\SatuanController::class, 'store'])->name('satuan.store');
Route::get('/satuan/edit/{id}', [App\Http\Controllers\SatuanController::class, 'edit'])->name('satuan.edit');
Route::put('/satuan/{id}', [App\Http\Controllers\SatuanController::class, 'update'])->name('satuan.update');
Route::delete('/satuan/{id}', [App\Http\Controllers\SatuanController::class, 'destroy'])->name('satuan.destroy');

Route::get('/obat_keluar/create', [App\Http\Controllers\ObatKeluarController::class, 'create'])->name('obat_keluar.create');
Route::post('/obat_keluar', [App\Http\Controllers\ObatKeluarController::class, 'store'])->name('obat_keluar.store');

Route::get('/obat_masuk/create', [App\Http\Controllers\ObatMasukController::class, 'create'])->name('obat_masuk.create');
Route::post('/obat_masuk', [App\Http\Controllers\ObatMasukController::class, 'store'])->name('obat_masuk.store');