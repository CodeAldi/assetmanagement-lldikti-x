<?php

namespace App\Http\Controllers;

use App\Models\AjukanPeminjamanAset;
use App\Models\Aset;
use Illuminate\Http\Request;

class AjukanPeminjamanAsetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aset = Aset::all();
        $datauser = auth()->user()->id;
        $datapeminjaman = AjukanPeminjamanAset::where('id_user',$datauser)->get();
        return view('dashboard.ajukanPeminjamanAset.index')->with('aset',$aset)->with('datapeminjaman',$datapeminjaman);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $peminjam = auth()->user()->id;
        $aset = $request->pilihaset;
        $jumlah = $request->jumlah;
        $alasan = $request->alasanpinjam;
        $tanggal_mulai = $request->tanggal_mulai;
        $lamapinjam = $request->lamapinjam;
        $ajukanPeminjamanAset = new AjukanPeminjamanAset();
        $ajukanPeminjamanAset->id_user = $peminjam;
        $ajukanPeminjamanAset->id_aset = $aset;
        $ajukanPeminjamanAset->jumlah = $jumlah;
        $ajukanPeminjamanAset->alasan = $alasan;
        $ajukanPeminjamanAset->tanggal_mulai_pinjam = $tanggal_mulai;
        $ajukanPeminjamanAset->lama_pinjam = $lamapinjam;
        $ajukanPeminjamanAset->status = 'mengajukan';
        $ajukanPeminjamanAset->save();
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(AjukanPeminjamanAset $ajukanPeminjamanAset)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AjukanPeminjamanAset $ajukanPeminjamanAset)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AjukanPeminjamanAset $ajukanPeminjamanAset)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AjukanPeminjamanAset $ajukanPeminjamanAset)
    {
        //
    }
}
