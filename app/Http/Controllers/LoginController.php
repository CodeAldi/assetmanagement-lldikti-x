<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    function LoginView() {
        return view('auth.login');
    }
}
