<?php

use App\Http\Controllers\JenisTabunganController;
use App\Http\Controllers\NasabahController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\SetoranNasabahController;
use App\Http\Controllers\TransaksiController;
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

Route::view('/', 'home.index');
Route::get('komisi', [NasabahController::class, 'index']);
Route::get('jenis', [JenisTabunganController::class, 'index']);
Route::get('setoran', [SetoranNasabahController::class, 'index']);
Route::get('admin', [ProfilController::class, 'index']);

Route::get('komisi/tambahdata', [NasabahController::class, 'create']);
Route::get('komisi/{nasabah}', [NasabahController::class, 'edit']);
Route::post('komisi/store', [NasabahController::class, 'store']);
Route::put('komisi/{nasabah}', [NasabahController::class, 'update']);
Route::delete('komisi/{nasabah}', [NasabahController::class, 'destroy']);


Route::get('jenis/inputtabu', [JenisTabunganController::class, 'create']);
Route::post('jenis/store', [JenisTabunganController::class, 'store']);
Route::get('jenis/{jenis_tabungan}', [JenisTabunganController::class, 'edit']);
Route::put('jenis/{jenis_tabungan}', [JenisTabunganController::class, 'update']);
Route::delete('jenis/{jenis_tabungan}', [JenisTabunganController::class, 'destroy']);

Route::get('setoran/inputseto', [SetoranNasabahController::class, 'create']);
Route::post('setoran/store', [SetoranNasabahController::class, 'store']);
Route::get('setoran/{setoran_nasabah}', [SetoranNasabahController::class, 'edit']);
Route::put('setoran/{setoran_nasabah}', [SetoranNasabahController::class, 'update']);
Route::delete('setoran/{setoran_nasabah}', [SetoranNasabahController::class, 'destroy']);
// Route::get('setoran/tarik', [SetoranNasabahController::class, 'tarikt']);
// Route::post('setoran/withdraw', [SetoranNasabahController::class, 'withdraw']);


Route::get('transaksi', [TransaksiController::class, 'index']);
Route::get('transaksi/tambahtransaksi', [TransaksiController::class, 'create']);
Route::post('transaksi/store', [TransaksiController::class, 'store']);

Route::get('admin/inputuser', [UserController::class, 'create']);
Route::post('admin/store', [UserController::class, 'store']);

Route::get('admin/inputprofil', [ProfilController::class, 'create']);
Route::post('admin/input', [ProfilController::class, 'store']);
