<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LogoutController extends Controller
{
    public function displayLogout(){

        Auth::logout();
        return redirect(url('/'));


    }


}
