<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Nearby;
use Illuminate\Support\Facades\Auth;
use App\Models\Auction;
use App\Models\Ads;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminCOntroller extends Controller
{
    public function properties(){
        $post=Post::all();
        return view('admin.properties',compact('post'));
    }

    public function nearby(){
        $post=Nearby::all();
        return view('admin.nearby',compact('post'));
    }

    public function postnearby(Request $request)

    {
        $post = new Nearby;
        $post-> name = $request-> title;
        $post -> address = $request -> address;
        $post-> region = $request-> region;
        $post -> type =$request -> type;
        $post -> description =$request -> description;
        $image = $request-> image;
        if($image)
        {

        $imagename =time().'.'.$image -> getClientOriginalExtension();
        $request -> image ->move('nearbyimage',$imagename);
        $post -> image = $imagename;


        }
        $post -> save();

         return redirect()->back()->with('message','Post Added Successfully');
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
           $post=DB::table('posts')->where('Post_status','!=','verified')->get();
        }

        else if ($request->active != "")
        {
           $post=DB::table('posts')->where('Post_status','!=','verified')->get();
        }
		
		else
        {
            $post = Post::all();

            return view('admin.properties',compact('post'));
        }

        if (count($post) == 0)
        {
            $message = "NO MATCHES FOUND";
        }

        return view('admin.properties',compact('post','message'));
    }
    public function monitor(){
        $auction=Auction::all();
        return view('admin.monitor',compact('auction'));
    }


public function monitor_ads(){
    $ads=Ads::all();
    return view('admin.monitor_ads',compact('ads'));
}

public function acceptPost(Request $request, $id)
    {
        // Logic to accept the post
        $ad = Ads::findOrFail($id);
        $ad->status = 'accepted';
        $ad->save();

        return redirect()->back()->with('success', 'Post accepted successfully.');
    }

    public function rejectPost(Request $request, $id)
    {
        // Logic to reject the post
        $ad = Ads::findOrFail($id);
        $ad->status = 'rejected';
        $ad->save();

        return redirect()->back()->with('success', 'Post rejected successfully.');
    }
    public function delete_post($id)
{
    $post = Post::find($id);
    if (!$post) {
        return redirect()->back()->with('error', 'Post not found');
    }

    $post->delete();

    return redirect()->back()->with('success', 'Post deleted successfully');
}
}
