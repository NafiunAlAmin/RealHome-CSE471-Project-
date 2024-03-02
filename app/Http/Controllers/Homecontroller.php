<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Models\Auction;

class Homecontroller extends Controller
{
    public function welcome(){
        return view('welcome');
    }
    public function redirect(){
        $usertype=Auth::user()->type;
        if ($usertype=='0'){
            // dd('success');
            return view('welcome');
        }
        return view('admin.welcome');
    }

    public function post(){
        $post=Post::all();
        return view('post', compact('post'));
    }

    public function add_post(){
        return view('add_post');
    }

    public function poster(Request $request)

    {

        $name = Auth::user()-> name;
        $user_type = Auth::user()->type;
        $user_ID = Auth::user()-> id;
        //dd($user_ID);
        $post = new Post;
        $post-> name = $request-> title;
        $post -> address = $request -> address;
        $post-> bedroom = $request-> bedroom;
        $post -> bathroom = $request -> bathroom;
        $post-> garage = $request-> garage;
        $post -> stories = $request -> stories;
        $post -> area=$request->area;
        $post -> description=$request-> description;
        $post -> price=$request-> price;
        $post -> number=Auth::user()->number;
        $post -> Post_status = 'active';
        $post -> user_ID = $user_ID;
        $post -> user_type = $user_type;

        $image = $request-> image;


        #public
        if($image)
        {

        $imagename =time().'.'.$image -> getClientOriginalExtension();
        $request -> image ->move('postimage',$imagename);
        $post -> image = $imagename;


        }


        $post -> save();

         return redirect()->back()->with('message','Post Added Successfully');
    }

    public function single(){
        return view('single');
    }



    public function home_search_blog(Request $request)

    {
        $message="";

        $loca=$request->loca;
        if($loca == "") {$loca='nothing';}

        if ($request->exact != "")
        {
           $post=DB::table('posts');

            if($loca != 'nothing')
            {
                $post->where('title','=',$loca);    //Change title to location after adding location column to table
            }

           $post= $post->get();
        }


        else
        {
            $post = Post::all();

            return view('home.blog',compact('post'));
        }

        if (count($post) == 0)
        {
            $message = "NO MATCHES FOUND";
        }


        return view('home.blog',compact('post','message'));
    }


    public function blog()
    {
        $post = post::all();
        return view('home.blog',compact('post'));
    }


    public function post_auction(){
        return view('home.post_auc');
    }


    public function added_auction(Request $request)

    {

        $name = Auth::user()-> name;
        $user_type = Auth::user()->type;
        $user_ID = Auth::user()-> id;
        //dd($user_ID);
        $auction = new Auction;
        $auction-> name = $request-> title;
        $auction -> address = $request -> address;
        $auction-> bedroom = $request-> bedroom;
        $auction -> bathroom = $request -> bathroom;
        $auction-> garage = $request-> garage;
        $auction -> stories = $request -> stories;
        $auction -> area=$request->area;
        $auction -> description=$request-> description;
        $auction -> price=$request-> price;
        $auction -> number=Auth::user()->number;
        $auction -> base=$request-> base;
        $auction -> Post_status = 'active';
        $auction -> user_ID = $user_ID;
        $auction -> user_type = $user_type;

        $image = $request-> image;


        #public
        if($image)
        {

        $imagename =time().'.'.$image -> getClientOriginalExtension();
        $request -> image ->move('imager',$imagename);
        $auction -> image = $imagename;


        }


        $auction -> save();

         return redirect()->back()->with('message','Post Added Successfully');
    }
    public function panel()
    {
        $auction = Auction::all();
        return view('home.panel',compact('auction'));
    }






}
