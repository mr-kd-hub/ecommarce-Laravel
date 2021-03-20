<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
use App\tbl_user;
use Illuminate\Support\Facades\Hash;

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
            return redirect('/');
        }
        else
        {
            $req->session()->flash("error","login first");
            return redirect('login');
        }
        
    }
    
}
