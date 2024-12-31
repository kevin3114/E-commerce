<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register_form()
    {
        return view('register');
    }
    public function store_register(Request $request)
    {
        $data = $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|confirmed',
        ]);

        $user = User::create($data);

        if($user){
            return redirect('/login_form');
        }
    }

    public function login_form()
    {
        return view('login');
    }
    public function login(request $request)
    {
        $userData = $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);
        if(Auth::attempt($userData))
        {
            return redirect('/home');
        }
    }

    public function checklogin_user(){
        if(Auth::check()){
            return view('home');
        }else{
            return redirect('/login_form');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login_form');
    }

    public function wishlist()
    {
        $user = User::all();
        return $user->product;
    }
}
