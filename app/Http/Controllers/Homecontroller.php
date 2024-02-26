<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Homecontroller extends Controller
{
    public function redirect(){
        $usertype=Auth::user()->type;
        dd($usertype);
        if ($usertype=='0'){
            // dd('success');
            return view('welcome');
        }
        return view('admin.welcome');
    }

}
