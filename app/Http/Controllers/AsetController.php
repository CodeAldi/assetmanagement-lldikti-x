<?php

namespace App\Http\Controllers;

use App\Models\Aset;
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
        $request->validate([

            'fotoaset' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        if ($request->hasFile('fotoaset')) {
            $aset = new Aset();
            $aset->nama = $request->namaAset;
            $aset->jumlah = $request->jumlahAset;
            $path = Storage::putFile('fotoawal',$request->file('fotoaset'),'public');
            $aset->foto = $path;
            $aset->save();
        }
        return back();
    }
}