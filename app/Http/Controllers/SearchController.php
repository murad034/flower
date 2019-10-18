<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search(Request $request)
    {


        $userId = Auth::id();
        $data['users'] = DB::table('users')
            ->where('users.id', '=', $userId)
            ->first();
        $data['userID'] = DB::table('flowers')
            ->max('flowers.userId');

        $data['total_carts']=DB::table('carts')
            ->count('carts.id');

        //dd($request);
        $search = $request->search;
        // $date = $request->input('date');

//dd($search);
        if (isset($search) && !empty($search)) {
            $data1['searches'] = DB::table('flowers')
                ->where('title', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%')
                ->orWhere('price', 'like', '%' . $search . '%')
                ->get();
        }
//dd($data1);

        return view('search', $data1,$data);
    }
}
