<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Post;

class PredictController extends Controller
{
    public function predict_price($id){
        $post = Post::where('id' , '=' , $id)->get();

        $data = [
            'No. Beds' => $post[0]->bedroom,
            'No. Baths' => $post[0]->bathroom,
            'Area' => $post[0]->area,
            'Region' => $post[0]->region

        ];

//         echo($post[0]->address);

        $prediction =  Http::post('http://127.0.0.1:5000/predictprice', $data);
        $post = Post::find($id);

        if($prediction->successful())
        {
            return view('single', compact('post','prediction'));
        }
        else
        {
            $prediction = "Sorry, we don't have enough data to make a prediction";
            return view('single', compact('post','prediction'));
        }

    }
}
