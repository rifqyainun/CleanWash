<?php
namespace App\Http\Controllers;
use App\Models\Transaksi; use Illuminate\Http\Request;
class StatusLaundryController extends Controller { public function index(){return view('status.index',['transaksis'=>Transaksi::with('pelanggan')->latest()->paginate(15)]);} public function update(Request $r,Transaksi $transaksi){$r->validate(['status'=>'required|in:Menunggu,Diproses,Dikeringkan,Disetrika,Siap Diambil,Selesai/Sudah Diambil']);$transaksi->update(['status'=>$r->status,'tanggal_selesai'=>in_array($r->status,['Siap Diambil','Selesai/Sudah Diambil'])?now():$transaksi->tanggal_selesai]);return back()->with('success','Status diperbarui.');}}
