<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class PDFController extends Controller
{
    public function generatePDF($id){
        $post = Post::where('id' , '=' , $id)->get();


        $img = QrCode::size(255)->generate("http://127.0.0.1:8000/single/" . $id);



        $data = [
            'post' => $post,
            'date' => date('m/d/Y'),
            'site' => "REAL INVEST",
            'img' => $img
        ];

        $pdf = PDF::loadView('pdf.generatePoster', $data);
        return $pdf->download('property_qr.pdf');
    }
}
