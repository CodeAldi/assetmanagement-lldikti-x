<?php

namespace App\Http\Controllers;

use App\Models\kriteria;
use App\Models\Alternatif;
use App\Models\NilaiKriteria;
use Illuminate\Http\Request;

class nilaiKriteriaController extends Controller
{
    function index() {
        $alternatif = Alternatif::all();
        return view('dashboard.prediksiKondisiAset.nilaiKriteria.index')->with('alternatif', $alternatif);
    }
    // function store() {
    //     $kriteriaElektronik = kriteria::where('kriteria_kategori_aset','e')->get();
    //     $kriteriaKendaraan = kriteria::where('kriteria_kategori_aset','k')->get();
    //     $alternatif = Alternatif::all();
    //     // ! elektronik
    //     foreach ($alternatif as $key => $value) {
    //         foreach ($kriteriaElektronik as $keyElektronik => $valueElektronik) {
    //             $nilaiKriteria = new NilaiKriteria();
    //             $nilaiKriteria->alternatif_id = $value->id;
    //             $nilaiKriteria->kriteria_id = $valueElektronik->id;
    //             $nilaiKriteria->bobot_kriteria =    
    //         }
    //     }
    // }
}
