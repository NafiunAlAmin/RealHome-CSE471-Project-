<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Hash;
use Session;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class Authcontroller extends Controller
{
    function login(){
        return view('login');
    }

    function registration(){
        return view('registration');
    }

    function loginUser(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = $request->only('email','password');
        if (Auth:: attempt($user)){
            return redirect()->intended(route('home'));
        }
        return redirect(route('login'))->with("error",'Login Error');
    }

    function registrationUser(Request $request){
        $request-> validate([
            'email' => 'required',
            'name' => 'required',
            'number'=> 'required',
            'password' => 'required'
        ]);

        $data['email'] = $request-> email;
        $data['name'] = $request-> name;
        $data['number'] = $request->number;
        $data['password'] = Hash::make($request->password);        

        $user= User::create($data);

        if (!$user){
            return redirect(route('registration'))->with("error",'Registration Error!!');
        }
        return redirect(route('login'))->with("success",'Registration Complete!!');
    }

    function logout(){
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }
}
