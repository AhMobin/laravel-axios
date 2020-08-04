<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function services(){
        return view('pages.services');
    }

    public function getServiceData(){
        $services = Service::all();
        return $services;
    }


    public function addNewService(Request $request){
        $name = $request->input('name');
        $slug = Str::slug($request->input('name'));
        $desc = $request->input('desc');
        $img = $request->input('img');

        $insert = Service::create([
            'service_name' => $name,
            'service_slug' => $slug,
            'service_desc' => $desc,
            'service_img' => $img,
        ]);

        if($insert==true){
            return 1;
        }else{
            return 0;
        }
    }


    public function ServiceDetails(Request $request){
        $id = $request->id;
        $details = Service::where('id',$id)->first();
        return $details;
    }



    public function ServiceUpdate(Request $request){
        $id = $request->input('id');
        $name = $request->input('service_name');
        $slug = Str::slug($request->input('service_name'));
        $desc = $request->input('service_desc');
        $img = $request->input('service_img');

        $update = Service::where('id',$id)->update(['service_name'=>$name,'service_slug'=>$slug,'service_desc'=>$desc,'service_img'=>$img]);

        if($update==true){
            return 1;
        }else{
            return 0;
        }
    }


    public function ServiceDelete(Request $request){
        $id = $request->id;
        $delete = Service::where('id',$id)->delete();
        if($delete==true){
            return 1;
        }else{
            return 0;
        }
    }
}
