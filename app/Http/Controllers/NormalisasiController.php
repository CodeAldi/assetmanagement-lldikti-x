<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\NilaiKriteria;
use App\Models\Normalisasi;
use Illuminate\Http\Request;

class NormalisasiController extends Controller
{
    function index() {
        $alternatif = Alternatif::all();
        $normalisasi = Normalisasi::has('alternatif')->get();
        return view('dashboard.prediksiKondisiAset.normalisasi.index')->with('alternatif',$alternatif)->with('normalisasi',$normalisasi);
    }
    function store() {
        $nilaiKriteria = NilaiKriteria::all();
        foreach ($nilaiKriteria as $key => $value) {
            if ($value->kriteria->kriteria_kategori_aset == 'e') {
                $nilaiKriteriaElektronik[] = $value;
            } else {
                $nilaiKriteriaKendaraan[] = $value;
            }
            
        }
        $elektronikCollection = collect($nilaiKriteriaElektronik);
        $kendaraanCollection = collect($nilaiKriteriaKendaraan);
        $kriteriaElektronik = $elektronikCollection->groupBy('kriteria_id');
        $kriteriaKendaraan = $kendaraanCollection->groupBy('kriteria_id');
        // mencari nilai max & min masing2 kriteria
        foreach ($kriteriaElektronik as $key => $value) {
            $max[$key] = ($value->pluck('bobot_kriteria')->max());
            $min[$key] = ($value->pluck('bobot_kriteria')->min());
            foreach ($value as $valueIsi) {
                if($valueIsi->kriteria->jenis_kriteria == 'c'){
                    // Cost
                    $normalisasi = new Normalisasi();
                    $normalisasi->alternatif_id = $valueIsi->alternatif_id;
                    $normalisasi->kriteria_id = $valueIsi->kriteria_id;
                    $normalisasi->nilai_normalisasi = $min[$valueIsi->kriteria_id] / $valueIsi->bobot_kriteria;
                    $normalisasi->save();
                }else{
                    // benefit
                    $normalisasi = new Normalisasi();
                    $normalisasi->alternatif_id = $valueIsi->alternatif_id;
                    $normalisasi->kriteria_id = $valueIsi->kriteria_id;
                    $normalisasi->nilai_normalisasi = $valueIsi->bobot_kriteria / $max[$valueIsi->kriteria_id];
                    $normalisasi->save();
                }
            }

        }
        //!kendaraan
        foreach ($kriteriaKendaraan as $key => $value) {
            $max[$key] = ($value->pluck('bobot_kriteria')->max());
            $min[$key] = ($value->pluck('bobot_kriteria')->min());
            foreach ($value as $valueIsi) {
                if ($valueIsi->kriteria->jenis_kriteria == 'c') {
                    // Cost
                    $normalisasi = new Normalisasi();
                    $normalisasi->alternatif_id = $valueIsi->alternatif_id;
                    $normalisasi->kriteria_id = $valueIsi->kriteria_id;
                    $normalisasi->nilai_normalisasi = $min[$valueIsi->kriteria_id] / $valueIsi->bobot_kriteria;
                    $normalisasi->save();
                } else {
                    // benefit
                    $normalisasi = new Normalisasi();
                    $normalisasi->alternatif_id = $valueIsi->alternatif_id;
                    $normalisasi->kriteria_id = $valueIsi->kriteria_id;
                    $normalisasi->nilai_normalisasi = $valueIsi->bobot_kriteria / $max[$valueIsi->kriteria_id];
                    $normalisasi->save();
                }
            }
        }
        return back();
    }
}
