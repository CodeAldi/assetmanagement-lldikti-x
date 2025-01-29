<?php

namespace App\Http\Controllers;

use App\Models\AjukanPeminjamanAset;
use App\Models\FeedbackPengembalian;
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
        
        return view('dashboard.ajukanPengembalianAset.index')->with('datapinjam',$datapinjam)->with('sisawaktu',$datediff);
    }
    public function kembalikan(Request $request,$id) {
        $peminjaman = AjukanPeminjamanAset::find($id);
        $peminjaman->status = 'Pengajuan Pengembalian';
        $peminjaman->save();
        
        $feedbackPengembalian = new FeedbackPengembalian();
        $feedbackPengembalian->aset_id = $peminjaman->id_aset;
        $feedbackPengembalian->feedback = $request->feedback;
        $feedbackPengembalian->nilai = $request->kepuasan;
        $feedbackPengembalian->save();
        return back();
    }
}
