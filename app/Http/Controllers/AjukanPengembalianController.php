<?php

namespace App\Http\Controllers;

use App\Models\AjukanPeminjamanAset;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AjukanPengembalianController extends Controller
{
    public function index() {
        $datapinjam = AjukanPeminjamanAset::where('id_user', Auth()->user()->id)->get();
        if ($datapinjam) {
            foreach ($datapinjam as $key => $value) {
                $phpdate = strtotime($value->tanggal_mulai_pinjam);
                $mysqldate2 = time();
                $datediff[$key] = round(($mysqldate2 - $phpdate) / (60 * 60 * 24));
            }
        } else {
            # code...
        }
        
        // $phpdate =strtotime($datapinjam[0]->tanggal_mulai_pinjam);
        // $mysqldate = date('Y-m-d H:i:s', $phpdate);
        // $mysqldate2 = time();
        // $datediff = round(($mysqldate2 - $phpdate) / (60 * 60 * 24));
        // dd(now());
        return view('dashboard.ajukanPengembalianAset.index')->with('datapinjam',$datapinjam)->with('sisawaktu',$datediff);
    }
    public function kembalikan($id) {
        $peminjaman = AjukanPeminjamanAset::find($id);
        $peminjaman->status = 'Pengajuan Pengembalian';
        $peminjaman->save();
        return back();
    }
}
