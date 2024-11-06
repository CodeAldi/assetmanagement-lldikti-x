<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index() {
        $aset = Aset::all();
        return view('dashboard.home')->with('aset',$aset);
    }
}
