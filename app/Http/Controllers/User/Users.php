<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use Illuminate\Http\Request;

class Users extends Controller
{
    public function login(){
        if(auth()->user()){
            return redirect()->route('user.home');
        }else{
            return view('user.login');
        }
    }

    public function logaction(UserLoginRequest $request){
        $input = ['email'=>$request->email,'password'=>$request->password];
        if(auth()->attempt($input)){
            return redirect()->route('user.home');
        }else{
            return redirect()->route('user.login')->with('msg','Invalid Username or Password');
        }
    }

    public function home(){
        return view('user.home');
    }

    public function profile(){
        return view('user.profile');
    }

    public function logout(){
        auth()->logout();
        return redirect()->route('user.login');
    }
}
