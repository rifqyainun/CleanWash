<?php
namespace App\Http\Controllers;
use App\Models\Pelanggan; use App\Models\Produk; use App\Models\Transaksi; use App\Models\Pengaduan;
class DashboardController extends Controller { public function index(){return view('dashboard.index',['pelanggan'=>Pelanggan::count(),'produk'=>Produk::count(),'transaksi'=>Transaksi::count(),'pengaduan'=>Pengaduan::where('status','!=','Selesai')->count(),'pendapatan'=>Transaksi::where('status','Selesai/Sudah Diambil')->sum('total')]);}}
