<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\adopt;
use App\Models\Post;
use App\Models\Vet;
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

    public function description($id){
        $data=adopt::find($id);
        return view('home.description', compact('data'));
    }
    public function blog()
    {
        $post = Post::all();
        return view('home.blog',compact('post'));
    }
    public function vethome()
    {
        $post = Vet::all();
        return view('home.vethome',compact('post'));
    }
    public function post_details($id)
    {
        $post = Post::find($id);

        return view('home.post_details',compact('post'));
    }
    
    //new
    public function adoptpost(){
        $user =Auth::user();
        $id=$user->id;
        $data=adopt:: where('user_id','=',$id)->get();
        return view('home.adoptpost', compact('data'));
    } 

    public function add_adoption2(Request $request)
    {
        $user =Auth::user();
        $id=$user->id;
        $name=$user->name;
        $number=$user->phone;
        $adoption= new adopt;
        $adoption-> title=$request-> title;
        $adoption-> type=$request-> type;
        $adoption-> breed=$request->breed;
        $adoption-> color=$request->color;
        $adoption-> age=$request->age;
        $adoption-> gender=$request->gender;
        $adoption-> personality=$request->personality;
        $adoption-> number=$number;
        $adoption-> user=$name ;
        $adoption-> user_id=$id ;
        $adoption-> description=$request->description;
        $image=$request-> image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('adoptpic',$imagename);
        $adoption-> image=$imagename;

        $adoption->save();
        return redirect()-> back()->with('message','Adoption post Added'); 
    }
}
