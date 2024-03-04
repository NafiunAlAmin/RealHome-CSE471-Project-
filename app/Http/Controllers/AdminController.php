<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Models\Auction;


class AdminCOntroller extends Controller
{
    public function properties(){
        $post=Post::all();
        return view('admin.properties',compact('post'));
    }
    public function verify_post($id)
{
    $post = Post::find($id);
    if (!$post) {
        return redirect()->back()->with('error', 'Post not found');
    }

    $post->post_status = 'verified';
    $post->save();

    return redirect()->back()->with('success', 'Post verified successfully');
}
    public function status_post($id)
{
    $post = Post::find($id);
    if (!$post) {
        return redirect()->back()->with('error', 'Post not found');
    }
    if ($post->status=='Active')
    {
        $post->status = 'Inactive';
        $post->save();

        return redirect()->back()->with('success', 'Post inactive');
    } else{
        $post->status = 'Active';
        $post->save();

        return redirect()->back()->with('success', 'Post active');
    }
}

public function reject_post($id)
{
    $post = Post::find($id);
    if (!$post) {
        return redirect()->back()->with('error', 'Post not found');
    }

    $post->Post_status = 'Unverified';
    $post->save();

    return redirect()->back()->with('success', 'Post unverified successfully');

}


    public function admin_search_post(Request $request)
    {
        $message="";

        if ($request->verified != "")
        {
           $post=DB::table('posts')->where('Post_status','=','verified')->get();
        }

        else if ($request->unverified != "")
        {
           $post=DB::table('posts')->where('Post_status','=','Unverified')->get();
        }

        else
        {
            $post = Post::all();

            return view('admin.show_post',compact('post'));
        }

        if (count($post) == 0)
        {
            $message = "NO MATCHES FOUND";
        }

        return view('admin.show_post',compact('post','message'));
    }
    public function monitor(){
        $auction=Auction::all();
        return view('admin.monitor',compact('auction'));
    }
}
