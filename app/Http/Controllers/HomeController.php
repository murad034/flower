<?php

namespace App\Http\Controllers;

use App\Flower;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void

    public function __construct()
    {
        $this->middleware('auth');
    }
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function displayWelcome(){

        $userId = Auth::id();

        $data1['total_carts']=DB::table('carts')
            ->count('carts.id');
        $data['users'] = DB::table('users')
            ->where('users.id', '=', $userId)
            ->first();

        $data['usersss'] = User::all();

        $data['flowers']=DB::table('flowers')
            ->where('flowers.userId','=',1)
            ->get();

        $data['flowerTwo']= Flower::all();

        $data['userID'] = DB::table('flowers')
            ->max('flowers.userId');

       // dd($data2);

        return view('welcome',$data,$data1);
    }

    public function index()
    {
        return view('home');
    }


}
