<?php
namespace App\Http\Controllers;
use App\Models\Transaksi; use Illuminate\Http\Request;
class LaporanController extends Controller { public function index(Request $r){$from=$r->from;$to=$r->to;$transaksis=Transaksi::with('pelanggan')->when($from,fn($q)=>$q->whereDate('tanggal_masuk','>=',$from))->when($to,fn($q)=>$q->whereDate('tanggal_masuk','<=',$to))->latest()->paginate(20)->withQueryString();$total=Transaksi::when($from,fn($q)=>$q->whereDate('tanggal_masuk','>=',$from))->when($to,fn($q)=>$q->whereDate('tanggal_masuk','<=',$to))->sum('total');return view('laporan.index',compact('transaksis','total','from','to'));}}
