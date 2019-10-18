<?php

namespace App\Http\Controllers;

use App\Flower;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FlowerController extends Controller
{
     public function __construct()
      {
          $this->middleware('auth');
      }




   /*   public function displayWelcome(){
          $userId = Auth::id();
          $data1['users'] = DB::table('users')
              ->where('users.id', '=', $userId)
              ->first();
          return view('welcome',$data1);
      }
*/
    public function displayIndex(){

        $data1['total_carts']=DB::table('carts')
            ->count('carts.id');
      $userId = Auth::id();

        $data1['users'] = DB::table('users')
            ->where('users.id', '=', $userId)
            ->first();

        return view('admin.index',$data1);
        //return view('admin.index');
    }

// display all flower list

    public function displayAllFlowerList(){

        $data1['total_carts']=DB::table('carts')
            ->count('carts.id');

        $userId = Auth::id();
        $data1['users'] = DB::table('users')
            ->where('users.id', '=', $userId)
            ->first();

        $data['flowers']= Flower::all();

        return view('admin.flowerList', $data,$data1);
        //return view('admin.flowerList', $data);
    }



    public function displayList(){


        $userId = Auth::id();
       $data1['users'] = DB::table('users')
            ->where('users.id', '=', $userId)
            ->first();

        $data1['total_carts']=DB::table('carts')
            ->count('carts.id');

        $data['flowers']=DB::table('flowers')
            ->where('flowers.userId','=',$userId)
            ->get();

        return view('admin.flowerList', $data,$data1);
        //return view('admin.flowerList', $data);
    }

    public function addFlower(){
        $userId = Auth::id();
        $data1['users'] = DB::table('users')
            ->where('users.id', '=', $userId)
            ->first();
        return view('admin.flowerAddEdit',$data1);
    }


    public function editFlower(Request $request){
        $data1['total_carts']=DB::table('carts')
            ->count('carts.id');

        $userId = Auth::id();
        $data1['users'] = DB::table('users')
            ->where('users.id', '=', $userId)
            ->first();


        $data['flower']= Flower::find($request->id);
        return view('admin.flowerAddEdit',$data,$data1);
    }

    public function deleteFlower(Request $request){
        Flower::find($request->id)->delete();
        return redirect()->back();
    }


    public function saveFlower(Request $request){


        $data= new Flower();

        if(isset($request->id) && !empty($request->id))
            $data=Flower::find($request->id);

        $data->userId=Auth::id();
        $data->title = $request->title;

        if(!empty($request->file('image')))
        $data->image= $this->uploadimage($request->file('image'),'admin/uploads/','','','');

        $data->price= $request->price;
        $data->description= $request->description;
        $data->save();


        return redirect('flower/display');
    }


    //image upload function

    function uploadimage($img, $path, $user_file_name = null, $width =null , $height = null)
    {
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        if (isset($user_file_name) && $user_file_name != "" && file_exists($path . $user_file_name)) {
            unlink($path . $user_file_name);
        }
        if (isset($user_file_name) && $user_file_name != "" && file_exists(path_image_thumb() . $user_file_name)) {
            unlink(path_image_thumb() . $user_file_name);
        }
// saving image in target path
        $imgName = uniqid() . '.' . $img->getClientOriginalExtension();
        $imgPath = public_path($path . $imgName);


        $img_main = \Intervention\Image\Facades\Image::make($img);
        $img_main->orientate();
        $img_main->save($path.$imgName);


        if ( file_exists($path. $imgName)) {

            /*   $newNme = public_path(path_image_thumb() . $imgName);

               if (!file_exists(path_image_thumb())) {
                  mkdir(path_image_thumb(), 0777, true);
               }
              $img = \Intervention\Image\Facades\Image::make($imgPath);
              $img->fit(200);
               $img->orientate();
               $img->save(path_image_thumb().$imgName);
   */
            return $imgName;
        }
        return false;
    }




}
