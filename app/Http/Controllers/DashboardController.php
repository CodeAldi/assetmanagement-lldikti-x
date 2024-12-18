<?php

namespace App\Http\Controllers;

use App\Models\AjukanPeminjamanAset;
use App\Models\Aset;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index() {
        $totalaset = Aset::all();
        $menungguPersetujuanKabag = AjukanPeminjamanAset::where('status',"menunggu konfirmasi kabag")->get();
        $menungguValidasiTU = AjukanPeminjamanAset::where('status',"diajukan")->get();
        $kabagsetuju = AjukanPeminjamanAset::where('status',"disetujui")->get();
        $ditolak = AjukanPeminjamanAset::where('status','like','%ditolak%')->get();
        return view('dashboard.home')->with('totalaset',$totalaset)->with('menungguKabag',$menungguPersetujuanKabag)->with('menungguTu',$menungguValidasiTU)->with('kabagsetuju',$kabagsetuju)->with('ditolak',$ditolak);
    }
}
