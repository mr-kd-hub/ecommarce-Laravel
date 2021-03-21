<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\UserController;

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

Route::get('/login', function () {
    return view('login');
});
Route::post('/login' ,'UserController@login');

Route::get('/reg', function () {
    return view('reg');
});
Route::post('/reg' ,'UserController@reg');

Route::get('/addP',function() {
    return view('addProduct');
});
Route::post('/addP','UserController@addP');



Route::get('/','UserController@index');
Route::get('/detail/{id}','UserController@detail');
Route::get('/deleteP/{id}','UserController@deleteP');
Route::get('/logout','UserController@logout');
Route::get('/cartlist','UserController@cartlist');
Route::get('/updateP/{id}','UserController@updateP');//get product

Route::post('/update','UserController@update');//set product
Route::post('/addtocart' ,'UserController@addtocart');
Route::post('/search','UserController@search');

