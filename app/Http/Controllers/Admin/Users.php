<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use Illuminate\Http\Request;

class Users extends Controller
{
    public function login(){
        if(auth()->user()){
            return redirect()->route('admin.home');
        }else{
            return view('admin.login');
        }
    }

    public function logaction(UserLoginRequest $request){
        $input = ['email'=>$request->email,'password'=>$request->password];
        if(auth()->attempt($input)){
            return redirect()->route('admin.home');
        }else{
            return redirect()->route('admin.login')->with('msg','Invalid Username or Password');
        }
    }

    public function home(){
        return view('admin.home');
    }

    public function profile(){
        return view('admin.profile');
    }

    public function logout(){
        auth()->logout();
        return redirect()->route('admin.login');
    }
}
