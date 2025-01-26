<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\asetElektronik;
use App\Models\asetKendaraan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AsetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aset = Aset::all();
        return view('dashboard.manajemenAset.index')->with('aset',$aset);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'fotoaset' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        if ($request->hasFile('fotoaset')) {
            if ($request->kategori == '1') {
                $aset = new Aset();
                $aset->nama = $request->namaAset;
                $aset->jumlah = $request->jumlahAset;
                $aset->deskripsi = $request->deskripsi;
                $aset->kategori = 'elektronik';
                $path = Storage::putFile('fotoawal',$request->file('fotoaset'),'public');
                $aset->foto = $path;
                $aset->save();

                $asetElektronik = new asetElektronik();
                $asetElektronik->aset_id = $aset->id;
                $asetElektronik->kerusakan = $request->kerusakan;
                $asetElektronik->usia = $request->usia;
                $asetElektronik->freakuensiPemakaian = $request->freakuensiPemakaian;
                $asetElektronik->biaya_service = $request->biaya_service;
            }elseif ($request->kategori == '2'){
                $aset = new Aset();
                $aset->nama = $request->namaAset;
                $aset->jumlah = $request->jumlahAset;
                $aset->deskripsi = $request->deskripsi;
                $aset->kategori = 'kendaraan';
                $path = Storage::putFile('fotoawal', $request->file('fotoaset'), 'public');
                $aset->foto = $path;
                $aset->save();
                $asetKendaraan = new asetKendaraan();
            }
        }
        return back();
    }
    function destroy(Aset $aset){
        if ($aset->kategori == 'elektronik') {
            $asetElektronik = asetElektronik::where('aset_id',$aset->id)->get();
            $asetElektronik->destroy();
        }else{
            $asetKendaraan = asetKendaraan::where('aset_id',$aset->id)->get();
            $asetKendaraan->destroy();
        }
        $path = $aset->foto;
        Storage::delete($path);
        $aset->destroy();
        return back();
    }
}