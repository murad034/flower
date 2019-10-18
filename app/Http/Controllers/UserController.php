<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function listUser(){

        $data1['total_carts']=DB::table('carts')
            ->count('carts.id');

        $data['userss']=User::all();
        $userId = Auth::id();
        $data1['users'] = DB::table('users')
            ->where('users.id', '=', $userId)
            ->first();
        return view('admin.set.userList', $data,$data1);
    }

  /*  public function addUser(){
        return view('admin.set.userAddEdit');
    } */

  public function saveUser(Request $request){
      $data = new User();
//dd($request);
      if(isset($request->id) &&!empty($request->id))
          $data = User::find($request->id);

      $data->name=$request->name;
      $data->email=$request->email;
      $data->userType= $request->userType;
      $data->save();
      return redirect('users');
  }

    public function deleteUser(Request $request){
        User::find($request->id)->delete();
        return redirect()->back();
    }

    public function editUser(Request $request){
        $data1['total_carts']=DB::table('carts')
            ->count('carts.id');

        $data['userss'] = User::find($request->id);
        $userId = Auth::id();
        $data1['users'] = DB::table('users')
            ->where('users.id', '=', $userId)
            ->first();
        return view('admin.set.userEdit', $data,$data1);
    }



}
