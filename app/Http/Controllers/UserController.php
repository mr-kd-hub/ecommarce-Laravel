<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//hash
use Illuminate\Support\Facades\Hash;
//to use join
use Illuminate\Support\Facades\DB;
//models
use App\tbl_user;
use App\product;
use App\cart;


class UserController extends Controller
{
    function login(Request $req)
    {             
            //retrive from model
            $req->validate([            
                'email'=>'required|email',
                'password'=>'required'           
            ]); 
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
            //insertion in database 
            $cart=new cart;
            $cart->uid=$req->session()->get('email');
            $cart->pid=$req->pid;
            $cart->save();
            return redirect("/");
        }
        else
        {
            $req->session()->flash("error","login first");
            return redirect('login');
        }
    }
    static function cartItem()
    {
        //to get total number of items in cart
        $uid=session()->get('email');
        return cart::where('uid',$uid)->count();
    }
    function cartlist()
    {
        $uid=session()->get('email');
        $product=DB::table('cart')
        ->join('products','cart.pid','=',"products.id")
        ->where('cart.uid',$uid)
        ->select('products.*')
        ->get();
        return view('cartlist',['products'=>$product]);
    }
    function reg(Request $req)
    {
        $req->validate([
            "name"=>"require",
            "email"=>"require|email",
            "password"=>"required"
        ]);
        $user = new tbl_user;
        $user->name=$req->input('name');
        $user->email=$req->input('email');
        $user->password=Hash::make($req->input('password'));
        $user->save();
        return redirect('/login');

    }
}