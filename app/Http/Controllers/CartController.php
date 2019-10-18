<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Flower;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function displayCart(){


        $userId = Auth::id();
        $data['users'] = DB::table('users')
            ->where('users.id', '=', $userId)
            ->first();
    /*    $data2=DB::table('personal_info_models')
            ->join('users','users.id','personal_info_models.userId')
            ->where('users.id',$user_id)
            ->select('personal_info_models.userId')->get();*/
        $data1['total_carts']=DB::table('carts')
            ->count('carts.id');



       $data['carts']=DB::table('flowers')
           ->join('carts','carts.flowerId','flowers.id')
           ->where('carts.userId', '=', $userId)
           ->select('flowers.id','flowers.title','flowers.image','flowers.price')
            ->get();


        return view('cart',$data,$data1);
        //return view('admin.flowerList', $data);
    }

    public function deleteCart(Request $request){
        Flower::find($request->id)->delete();
        return redirect()->back();
    }

    public function saveCart(Request $request){


        $data = new Cart();

       /* if(isset($request->id) && !empty($request->id))
            $data=Flower::find($request->id);  */


        $data->userId=Auth::id();
        $data->flowerId=$request->id;
        //dd($data->flowerId);
        $data->save();


        return redirect('/');
    }
}
