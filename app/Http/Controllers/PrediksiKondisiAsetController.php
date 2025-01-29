<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\HasilAkhir;
use App\Models\Normalisasi;
use Illuminate\Support\Facades\DB;

class PrediksiKondisiAsetController extends Controller
{
    function index() {
        $alternatif = Alternatif::all();
        $hasilAkhir = HasilAkhir::all();
        return view('dashboard.prediksiKondisiAset.hasilAkhir.index')->with('alternatif',$alternatif)->with('hasilAkhir',$hasilAkhir);
    }
    function store() {
        if (HasilAkhir::count() > 0) {
            DB::table('hasil_akhir')->truncate();
        }
        $normalisasi = Normalisasi::all()->groupBy('alternatif_id');
        foreach ($normalisasi as $key => $value) {
            $temp[$key] = 0;
            foreach ($value as $keyIsi => $valueIsi) {
                $temp[$key] += $valueIsi->nilai_normalisasi * $valueIsi->kriteria->bobot_kriteria;
                # code...
            }
        }
        foreach ($temp as $key => $value) {
            $hasilAkhir = new HasilAkhir();
            $hasilAkhir->alternatif_id = $key;
            $hasilAkhir->skor_akhir = $value;
            if ($value <= 1.0 && $value >= 0.8) {
                $hasilAkhir->keterangan = 'sangat baik';
            }elseif ($value >= 0.6 && $value < 0.8) {
                $hasilAkhir->keterangan = 'baik';
            }elseif ($value >= 0.4 && $value < 0.6) {
                $hasilAkhir->keterangan = 'cukup baik';
            }elseif ($value >= 0.2 && $value < 0.4) {
                $hasilAkhir->keterangan = 'kurang baik';
            }else{
                $hasilAkhir->keterangan = 'buruk';
            }
            $hasilAkhir->save();
        }
        return back();
    }
}
