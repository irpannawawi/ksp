<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NasabahController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\PinjamanController;
use App\Http\Controllers\PencairanController;
use App\Http\Controllers\AngsuranController;
use App\Http\Controllers\SimpananController;
use App\Http\Controllers\TransaksiController;
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

Route::get('/', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'act_login']);

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // NASABAH
    Route::get('nasabah', [NasabahController::class, 'index'])->name('nasabah');
    Route::get('tambah_nasabah', [NasabahController::class, 'tambah_nasabah']);
    Route::post('add_nasabah', [NasabahController::class, 'add_nasabah']);
    Route::get('edit_nasabah/{no_nasabah}', [NasabahController::class, 'edit_nasabah']);
    Route::post('edit_nasabah', [NasabahController::class, 'act_edit_nasabah']);
    Route::get('delete_nasabah/{no_nasabah}', [NasabahController::class, 'delete_nasabah']);


    // PETUGAS
    Route::get('petugas', [PetugasController::class, 'index'])->name('petugas');
    Route::get('tambah_petugas', [PetugasController::class, 'tambah_petugas']);
    Route::post('add_petugas', [PetugasController::class, 'add_petugas']);
    Route::get('edit_petugas/{id_petugas}', [PetugasController::class, 'edit_petugas']);
    Route::post('edit_petugas', [PetugasController::class, 'act_edit_petugas']);
    Route::get('delete_petugas/{id_petugas}', [PetugasController::class, 'delete_petugas']);

    // SIMPANAN
    Route::get('simpanan', [SimpananController::class, 'index'])->name('simpanan');
    Route::get('tambah_simpanan', [SimpananController::class, 'tambah_simpanan']);
    Route::post('act_tambah_simpanan', [SimpananController::class, 'act_tambah_simpanan']);
    Route::get('hapus_simpanan/{no_simpanan}', [SimpananController::class, 'hapus_simpanan']);


    // PENARIKAN
    Route::get('transaksi', [TransaksiController::class, 'index'])->name('transaksi');
    Route::get('tambah_transaksi', [TransaksiController::class, 'tambah_transaksi']);
    Route::post('act_tambah_transaksi', [TransaksiController::class, 'act_tambah_transaksi']);
    Route::get('hapus_transaksi/{no_transaksi}', [TransaksiController::class, 'hapus_transaksi']);
    
    // PINJAMAN
    Route::get('pinjaman', [PinjamanController::class, 'index'])->name('pinjaman');
    Route::get('delete_pinjaman/{no_pinjaman}', [PinjamanController::class, 'delete_pinjaman']);
    
    // add PINJAMAN
    Route::get('/tambah_pinjaman', [PinjamanController::class, 'tambah_pinjaman']);
    Route::post('/tambah_pinjaman_2', [PinjamanController::class, 'tambah_pinjaman_2']);
    Route::post('/tambah_pinjaman_3', [PinjamanController::class, 'tambah_pinjaman_3']);
    
    // PENCAIRAN
    Route::get('/pencairan', [PencairanController::class, 'index'])->name('pencairan');
    Route::get('/cairkan_pinjaman/{no_pinjaman}', [PencairanController::class, 'cairkan_pinjaman']);
    Route::post('/act_pencairan', [PencairanController::class, 'act_pencairan']);
    
    // ANGSURAN
    Route::get('/angsuran', [AngsuranController::class, 'index'])->name('angsuran');
    Route::get('/riwayat_angsuran/{no_pencairan}', [AngsuranController::class, 'riwayat_angsuran']);
    Route::get('/bayar_angsuran/{no_pencairan}', [AngsuranController::class, 'bayar_angsuran']);
    Route::post('/act_bayar_angsuran', [AngsuranController::class, 'act_bayar_angsuran']);
});
