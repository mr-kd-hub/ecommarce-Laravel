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

Route::post('/login' ,'UserController@login');
Route::get('/','UserController@index');
Route::get('/detail/{id}','UserController@detail');
Route::get('/logout','UserController@logout');
Route::post('/search','UserController@search');
Route::get('/cartlist','UserController@cartlist');
Route::post('/addtocart' ,'UserController@addtocart');

