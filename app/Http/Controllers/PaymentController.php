<?php

namespace App\Http\Controllers;

use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function displayPayment(){


        $userId = Auth::id();
        $data['users'] = DB::table('users')
            ->where('users.id', '=', $userId)
            ->first();
        $data['total_carts']=DB::table('carts')
            ->count('carts.id');





        return view('payment',$data);
    }


    public function savePayment(Request $request){


        $data = new Payment();

        /* if(isset($request->id) && !empty($request->id))
             $data=Flower::find($request->id);  */


        $data->userId=Auth::id();
        $data->name=$request->name;
        $data->location=$request->location;
        $data->contact=$request->contact;
        $data->transaction=$request->transaction;


        $data->save();


        return redirect('order');
    }

    public function displayOrder(){


        $userId = Auth::id();
        $data['users'] = DB::table('users')
            ->where('users.id', '=', $userId)
            ->first();
        $data['total_carts']=DB::table('carts')
            ->count('carts.id');




        return view('order',$data);
    }

}
