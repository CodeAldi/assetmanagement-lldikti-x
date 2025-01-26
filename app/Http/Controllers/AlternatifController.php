<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Aset;
use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    function index() {
        $alternatif = Alternatif::all();
        if (count($alternatif)==0) {
            $aset = Aset::all();
            $asetCount = count($aset);
            return view('dashboard.prediksiKondisiAset.alternatif.index')->with('asetCount',$asetCount)->with('aset',$aset)->with('alternatif', $alternatif);
        }
        $asetDoesntHaveAlternatif = Aset::doesntHave('alternatif')->get();
        $asetCount = count($asetDoesntHaveAlternatif);
        return view('dashboard.prediksiKondisiAset.alternatif.index')->with('asetCount', $asetCount)->with('aset', $asetDoesntHaveAlternatif)->with('alternatif', $alternatif);

    }
    function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'aset_id' => 'required',
        ]);
        $alternatif = new Alternatif();
        $alternatif->nama_alternatif = $request->nama;
        $alternatif->aset_id = $request->aset_id;
        $alternatif->save();
        return back();
    }
}
