<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function gallery(){
        return view('pages.gallery');
    }


    public function photoGalleries(){
//        return Gallery::all();
        return Gallery::take(12)->get();
    }

    public function photosLoadById($id){
        $firstId = $id;
        $lastId = $firstId + 12;
        return Gallery::where('id','>=',$firstId)->where('id','<',$lastId)->get();
    }


    public function photoUpload(Request $request){
        $imgPath = $request->file('photo')->store('public/gallery');
        $imgNameOne = explode('/',$imgPath)[1];
        $imgNameTwo = explode('/',$imgPath)[2];

        $host = $_SERVER['HTTP_HOST'];

        $location = "http://".$host."/storage/".$imgNameOne."/".$imgNameTwo;

        Gallery::create([
            'location' => $location,
        ]);

    }
}
