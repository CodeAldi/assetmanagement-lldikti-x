<?php

namespace App\Http\Controllers;

use App\Models\kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    function index() {
        $kriteria = kriteria::all();
        return view('dashboard.prediksiKondisiAset.kriteria.index')->with('kriteria',$kriteria);
    }
}
