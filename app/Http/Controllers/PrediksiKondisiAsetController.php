<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\kriteria;
use Illuminate\Http\Request;

class PrediksiKondisiAsetController extends Controller
{
    function index() {
        $alternatif = Alternatif::all();
        $kriteria = kriteria::where('kriteria_kategori_aset','LIKE','k')->get();
        return view('dashboard.prediksiKondisiAset.hasilAkhir.index')->with('alternatif',$alternatif)->with('kriteria',$kriteria);
    }
    function indexNilaiKriteria() {
        $alternatif = Alternatif::all();
        $kriteria = kriteria::where('kriteria_kategori_aset', 'LIKE', 'k')->get();
        return view('dashboard.prediksiKondisiAset.nilaiKriteria.index')->with('alternatif', $alternatif)->with('kriteria', $kriteria);
    }
    function indexNormalisasi() {
        $alternatif = Alternatif::all();
    }
}
