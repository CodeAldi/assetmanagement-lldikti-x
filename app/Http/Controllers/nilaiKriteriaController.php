<?php

namespace App\Http\Controllers;

use App\Models\kriteria;
use App\Models\Alternatif;
use Illuminate\Http\Request;
use App\Models\NilaiKriteria;
use Illuminate\Support\Facades\DB;

class nilaiKriteriaController extends Controller
{
    function index() {
        $alternatif = Alternatif::all();
        $nilaiKriteria = NilaiKriteria::has('alternatif')->get();
        return view('dashboard.prediksiKondisiAset.nilaiKriteria.index')->with('alternatif', $alternatif)->with('nilaiKriteria',$nilaiKriteria);
    }
    function store() {
        $kriteriaElektronik = kriteria::where('kriteria_kategori_aset','e')->get();
        $kriteriaKendaraan = kriteria::where('kriteria_kategori_aset','k')->get();
        $alternatif = Alternatif::all();
        DB::table('nilai_kriteria')->truncate();
        // ! elektronik
        foreach ($alternatif as $key => $value) {
            if ($value->aset->kategori == 'elektronik') {
                foreach ($kriteriaElektronik as $keyElektronik => $valueElektronik) {
                    $nilaiKriteria = new NilaiKriteria();
                    $nilaiKriteria->alternatif_id = $value->id;
                    switch ($valueElektronik->simbol_kriteria) {
                        case 'c1': // tingkat kerusakan
                            $nilaiKriteria->kriteria_id = $valueElektronik->id;
                            $nilaiKriteria->bobot_kriteria = $value->aset->elektronik->kerusakan; 
                            break;
                        
                        case 'c2':
                            $nilaiKriteria->kriteria_id = $valueElektronik->id;
                            $nilaiKriteria->bobot_kriteria = $value->aset->elektronik->usia; 
    
                            break;
                        
                        case 'c3':
                            $nilaiKriteria->kriteria_id = $valueElektronik->id;
                            $nilaiKriteria->bobot_kriteria = $value->aset->elektronik->freakuensiPemakaian; 
    
                            break;
                        
                        case 'c4':
                            $nilaiKriteria->kriteria_id = $valueElektronik->id;
                            $nilaiKriteria->bobot_kriteria = $value->aset->elektronik->biaya_service; 
    
                            break;
                        
                        case 'c5':
                            $nilaiKriteria->kriteria_id = $valueElektronik->id;
                            $nilaiKriteria->bobot_kriteria = 5; 
    
                            break;
                        
                        default:
                            # code...
                            break;
                    }
                    $nilaiKriteria->save();
                }
            } else {
                foreach ($kriteriaKendaraan as $keyKendaraan => $valueKendaraan) {
                    $nilaiKriteria = new NilaiKriteria();
                    $nilaiKriteria->alternatif_id = $value->id;
                    switch ($valueKendaraan->simbol_kriteria) {
                        case 'c1': // tingkat kerusakan
                            $nilaiKriteria->kriteria_id = $valueKendaraan->id;
                            $nilaiKriteria->bobot_kriteria = $value->aset->kendaraan->kerusakan; 
                            break;
                        
                        case 'c2':
                            $nilaiKriteria->kriteria_id = $valueKendaraan->id;
                            $nilaiKriteria->bobot_kriteria = $value->aset->kendaraan->usia; 
        
                            break;
                        
                        case 'c3':
                            $nilaiKriteria->kriteria_id = $valueKendaraan->id;
                            $nilaiKriteria->bobot_kriteria = $value->aset->kendaraan->jarak_tempuh; 
        
                            break;
                        
                        case 'c4':
                            $nilaiKriteria->kriteria_id = $valueKendaraan->id;
                            $nilaiKriteria->bobot_kriteria = $value->aset->kendaraan->biaya_perawatan; 
        
                            break;
                        
                        case 'c5':
                            $nilaiKriteria->kriteria_id = $valueKendaraan->id;
                            $nilaiKriteria->bobot_kriteria = 5; 
        
                            break;
                        
                        default:
                            # code...
                            break;
                    }
                    $nilaiKriteria->save();
                }
            }
            
        }
        // ! kendaraan
        return back();
    }
}
