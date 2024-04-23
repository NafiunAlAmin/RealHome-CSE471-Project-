<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Nearby;
use Illuminate\Support\Facades\Auth;
use App\Models\Auction;
use App\Models\Ads;
use App\Models\comments;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homecontroller extends Controller
{
    public function welcome(){
        $post=Post::all();
        return view('welcome', compact('post'));
    }

    public function redirect(){
        $usertype=Auth::user()->type;
        if ($usertype=='1'){
            return view('admin.welcome');
        }
        $post=Post::all();
        return view('welcome', compact('post'));
    }

    public function post(){
        $post=Post::all();
        return view('post', compact('post'));
    }

    public function specificpost($address){
        $post=Post::where('address', 'LIKE', '%' . $address . '%')->get();
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
        $post -> region = $request -> region;
        $post-> bedroom = $request-> bedroom;
        $post -> bathroom = $request -> bathroom;
        $post-> garage = $request-> garage;
        $post -> stories = $request -> stories;
        $post -> area=$request->area;
        $post -> description=$request-> description;
        $post -> price=$request-> price;
        $post -> number=Auth::user()->number;
        $post -> Post_status = 'active';
        $post -> username = $name;
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

    public function single($id){
        $post = Post::find($id);
        $prediction= null;
        $user =Auth::User();
        $comments = comments::all();
        return view('single', compact('post','prediction','comments','user'));
    }

    public function single2($id){
        $post = Auction::find($id);
        $prediction= null;
        $user =Auth::User();
        $comments = comments::all();
        return view('include.single_2', compact('post','prediction','comments','user'));
    }

    public function singleplace($id){
        $post = Nearby::find($id);
        return view('singleplace', compact('post'));
    }

    public function userhistory(){
        $user =Auth::User();
        $name=$user->name;
        $post = Post::where('username','=',$name)->get();
        return view('userhistory', compact('post'));
    }
    public function reject_post($id)
{
    $post = Post::find($id);
    if (!$post) {
        return redirect()->back()->with('error', 'Post not found');
    }

    $post->status = 'Inactive';
    $post->save();

    return redirect()->back()->with('success', 'Post unverified successfully');

}

    public function history($username){
        $post = Post::where('username','=',$username)->get();
        return view('history', compact('post'));
    }

    public function crime(){
        $output = shell_exec('Python D:\Laravel\reales\public\predictors\crime.py');
        return view('crime', ['output' => $output]);
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

    public function places(){
        $post = Nearby::all();
        return view('places',compact('post'));
    }

    public function ads(){
        return view('home.ads');
    }


    public function added_ads(Request $request)

    {



        $user_type = Auth::user()->type;
        $user_ID = Auth::user()-> id;
        //dd($user_ID);
        $ads = new Ads;
        $ads-> name = $request-> title;


        $ads -> description=$request-> description;

        $ads -> Post_status = 'inactive';
        $ads -> user_ID = $user_ID;
        $ads -> user_type = $user_type;

        $image = $request-> image;


        #public
        if($image)
        {

        $imagename =time().'.'.$image -> getClientOriginalExtension();
        $request -> image ->move('imager',$imagename);
        $ads -> image = $imagename;


        }


        $ads -> save();

         return redirect()->back()->with('message','Post Added Successfully');
    }
	
    public function nearby_facilities($address){
        $nearby=Nearby::where('address', 'LIKE', '%' . $address . '%')
        ->where('type','!=','industry')
        ->get();

        $types=Nearby::distinct()
            ->where('address', 'LIKE', '%' . $address . '%')
            ->where('type','!=','industry')->get('type');


        return view('nearby', compact('nearby','types'));
    }
    

    public function advert()
    {
        $user =Auth::User();
        $ads = Ads::all();
        $comments = comments::all();
        return view('home.advert',compact('ads','comments','user'));
    }


    public function comment_add($id,Request $request)
    {
        $request->validate([
            'content' => 'required|string',
        ]);
   
     
        $comment = new comments();
        $comment->name = Auth::user()->name;
        $comment->content = $request->content;
        $comment->post_id=$id;
        $comment->user_id = Auth::id();
       
        $comment->save();
   
        return redirect()->back()->with('success', 'Comment added successfully.');
    }
   




 
public function rate(Request $request, Post $post)
    {
      
        $validatedData = $request->validate([
            'rating' => 'required|integer|between:1,5',
        ]);

       
        $currentRating = $post->rating ?? 0;
        $numberOfRatings = $post->number_of_ratings ?? 0;

       
        $newNumberOfRatings = $numberOfRatings + 1;
        $newRating = ($currentRating * $numberOfRatings + $validatedData['rating']) / $newNumberOfRatings;

        
        $post->rating = $newRating;
        $post->number_of_ratings = $newNumberOfRatings;
        $post->save();

        
        return redirect()->back()->with('success', 'Rating submitted successfully.');
    }

    public function leaderboard()
    
    {
        
        $topRatedPosts = Post::where('status', 'Active')
            ->orderByDesc('rating')
            ->limit(3) 
            ->get();

        
        return view('leaderboard', ['topRatedPosts' => $topRatedPosts]);
    }

//module4nus
    public function like($id)
    {
        $comment = comments::findOrFail($id);
        $comment->increment('likes');
        return redirect()->back()->with('success', 'Comment liked successfully');
    }

    public function dislike($id)
    {
        $comment = comments::findOrFail($id);
        $comment->increment('dislikes');
        return redirect()->back()->with('success', 'Comment disliked successfully');
    }

    public function likeOrDislike(Request $request, $id)
{
    $action = $request->input('action');
    $comment = comments::find($id);

   
    if ($action == 'like' && $request->session()->get("disliked_$id")) {
        $comment->dislikes--;
        $request->session()->forget("disliked_$id");
    } elseif ($action == 'dislike' && $request->session()->get("liked_$id")) {
        $comment->likes--;
        $request->session()->forget("liked_$id");
    }

    if ($action == 'like') {
        $comment->likes++;
        $request->session()->put("liked_$id", true);
    } elseif ($action == 'dislike') {
        $comment->dislikes++;
        $request->session()->put("disliked_$id", true);
    }

    $comment->save();

    return redirect()->back();
}
    public function singleplacebuy($id)
    {
        $post = Post::find($id);
        if (!$post) {
            return redirect()->back()->with('error', 'Post not found');
        }

        $post->Status = 'Sold';
        $post->token = '0';
        $user_ID = Auth::user()-> id;
        $post->owner = '100-'.$user_ID;
        $post->save();
        $user =Auth::User();
        $user->owned=$user->owned.','."100-".$id;
        $user-> save();
        return redirect()->back()->with('success', 'Property Bought Successfully');
    }
    public function share($id,Request $request)
    {
        //dd($request->percent);

        $post = Post::find($id);
        if (!$post) {
            return redirect()->back()->with('error', 'Post not found');
        }
        $token =(int)($post->token)-(int)($request->percent);
        if ($token<0){
            return redirect()->back()->with('failure', 'percentage out of index');
        } else {
            $post->token = $token;
            $user_ID = Auth::user()-> id;
            $post->owner = $post->owner.','.($request->percent).'-'.$user_ID;
            if ($post->token==0){
                $post->Status = 'Sold';
            }
            $post->save();
            $user =Auth::User();
            $user->owned=$user->owned.','.($request->percent)."-".$id.',';
            $user-> save();
        }
        return redirect()->back()->with('success', 'Share Bought Successfully');
    }


    public function req_ads($id)
    {
        $post = Post::find($id);
        if (!$post) {
            return redirect()->back()->with('error', 'Post not found');
        }
        if ($post->ads!='Pending')
        {
            $post->ads = 'Pending';
            $post->save();

            return redirect()->back()->with('success', 'Ads inactive');
        }
        return redirect()->back();
    }
    }






