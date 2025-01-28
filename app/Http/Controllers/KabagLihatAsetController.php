<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use Illuminate\Http\Request;

class KabagLihatAsetController extends Controller
{
    function index() {
        $aset = Aset::all();
        return view('dashboard.kabag.aset.index')->with('aset',$aset);
    }
}
