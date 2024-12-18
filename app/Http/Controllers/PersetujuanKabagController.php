<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AjukanPeminjamanAset;

class PersetujuanKabagController extends Controller
{
    public function index() {
        $menungguPersetujuanKabag = AjukanPeminjamanAset::where('status', "menunggu konfirmasi kabag")->get();
        
        return view('dashboard.kabag.index')->with('menungguKabag',$menungguPersetujuanKabag);
    }
    public function setujui($id)
    {
        $pengajuan = AjukanPeminjamanAset::find($id);
        $pengajuan->status = 'Disetujui';
        $pengajuan->save();
        return back();
    }
    function tolak($id)
    {
        $pengajuan = AjukanPeminjamanAset::find($id);
        $pengajuan->status = 'ditolak Kabag';
        $pengajuan->save();
        return back();
    }
}
