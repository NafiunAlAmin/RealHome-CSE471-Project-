<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\adopt;
use App\Models\Post;

class HomeController extends Controller
{
    public function index(){
        return view('home.userpage');
    }

    public function logout(){
        return view('home.home');
    }
    public function register(){
        return view('auth.register');
    }

    public function redirect(){
        $usertype=Auth::user()->usertype;
        if($usertype=='1'){
            return view('admin.home');
        }
        else{
            return view('home.userpage');
        }
    }

    public function adoption(){
        $data=adopt:: all();
        return view('home.adoption', compact('data'));
    }

    public function description(){
        return view('home.description');
    }
    public function blog()
    {
        $post = Post::all();
        return view('home.blog',compact('post'));
    }
    public function post_details($id)
    {
        $post = Post::find($id);

        return view('home.post_details',compact('post'));
    }
    
}
