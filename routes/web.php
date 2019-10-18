<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// admin logout
Route::get('/logout','LogoutController@displayLogout');


//Route::get('/','FlowerController@displayWelcome');
Route::get('/','HomeController@displayWelcome');
Route::post('cart/save','CartController@saveCart');
Route::get('cart/delete','CartController@deleteCart');
Route::get('cart/display','CartController@displayCart');
Route::get('payment/display','PaymentController@displayPayment');
Route::post('payment/save','PaymentController@savePayment');
Route::get('order','PaymentController@displayOrder');
Route::post('search','SearchController@search');
Route::get('search','SearchController@search');




Route::group(['middleware' => 'customAuth'], function(){



    //display all flower list
    Route::get('allFlower/display','FlowerController@displayAllFlowerList');



// Flowers data show edit add

    Route::get('adminIndex','FlowerController@displayIndex');
    Route::get('flower/display','FlowerController@displayList');
    Route::get('flower/add','FlowerController@addFlower');
    Route::post('flower/save','FlowerController@saveFlower');
    Route::get('flower/delete','FlowerController@deleteFlower');
    Route::get('flower/edit','FlowerController@editFlower');


    // admin details

        Route::get('users','UserController@listUser');
        // Route::get('users/add','UserController@addUser');
        Route::get('users/edit','UserController@editUser');
        Route::get('users/delete','UserController@deleteUser');
        Route::post('users/save','UserController@saveUser');


});





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
