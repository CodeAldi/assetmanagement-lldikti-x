<?php

namespace App\Http\Controllers;

use App\Models\AjukanPeminjamanAset;
use App\Models\ManajemenPeminjamanAset;
use Illuminate\Http\Request;

class ManajemenPeminjamanAsetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataPeminjamanAset = AjukanPeminjamanAset::where('status','mengajukan')->get();
        // dd($dataPeminjamanAset[0]->user->name);
        return view('dashboard.manajemenPeminjamanAset.index')->with('dataPeminjamanAset',$dataPeminjamanAset);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ManajemenPeminjamanAset $manajemenPeminjamanAset)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ManajemenPeminjamanAset $manajemenPeminjamanAset)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ManajemenPeminjamanAset $manajemenPeminjamanAset)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ManajemenPeminjamanAset $manajemenPeminjamanAset)
    {
        //
    }
}
