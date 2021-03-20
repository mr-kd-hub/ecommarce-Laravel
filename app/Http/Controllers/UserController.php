<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//hash
use Illuminate\Support\Facades\Hash;
//models
use App\tbl_user;
use App\product;
use App\cart;


class UserController extends Controller
{
    function login(Request $req)
    {     
        
            //retrive from model
            $user = tbl_user::where(['email'=>$req->email])->first();

            if(!$user || !Hash::check($req->password,$user->password))
            {
                $req->session()->flash('error',"please enter valid detail");
                return redirect('login');
            }   
            else
            {
                $req->session()->put('email',$req->email);
                return redirect('/');
                //return view('welcome');
            }            
    }
    function logout(Request $req)
    {
        $req->session()->forget('email');
        return redirect('login');
    }
    function index(Request $req)
    {
        if($req->session()->has('email'))
        {
            $data=product::all();
            return view('welcome',['products'=>$data]);
           //return product::all();
        }
        else
        {
            $req->session()->flash("error","login first");
            return redirect('login');
        }
    }
    function detail($id='',Request $req)
    {
        if($req->session()->has('email'))
        {
            $data = product::find($id);
            return view('detail',['product'=>$data]);
        }
        else
        {
            $req->session()->flash("error","login first");
            return redirect('login');
        }
    }
    function search(Request $req)
    {
       $data=product::where('name','like','%'.$req->input('query').'%')->get();
        return view('search',['searchProduct'=>$data]);
    }
    function addtocart(Request $req)
    {
        if($req->session()->has('email'))
        {
            // $cart=new cart;
            // $cart->uid=$req->session()->get('email')['id'];
            // $cart->pid=$req->pid;
            // $cart->save();
            return view("/");
        }
        else
        {
            $req->session()->flash("error","login first");
            return redirect('login');
        }
    }
}