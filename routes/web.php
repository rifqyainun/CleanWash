<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\StatusLaundryController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\LaporanController;

Route::get('/', fn()=>redirect()->route('login'));
Route::get('/login',[AuthController::class,'showLogin'])->name('login');
Route::post('/login',[AuthController::class,'login'])->name('login.process');
Route::post('/logout',[AuthController::class,'logout'])->name('logout');
Route::get('/pengaduan',[PengaduanController::class,'publicForm'])->name('pengaduan.public');
Route::post('/pengaduan',[PengaduanController::class,'publicStore'])->name('pengaduan.public.store');

Route::middleware('auth')->group(function(){
 Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
 Route::resource('pelanggan',PelangganController::class)->except(['show']);
 Route::resource('produk',ProdukController::class)->except(['show']);
 Route::resource('transaksi',TransaksiController::class)->only(['index','create','store','show']);
 Route::get('/status',[StatusLaundryController::class,'index'])->name('status.index');
 Route::patch('/status/{transaksi}',[StatusLaundryController::class,'update'])->name('status.update');
 Route::resource('pengaduan',PengaduanController::class)->only(['index','show','update']);
 Route::get('/laporan',[LaporanController::class,'index'])->name('laporan.index');
});
