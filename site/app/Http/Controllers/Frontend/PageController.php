<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Visitor;
use App\Model\Service;
use App\Model\Course;
use App\Model\Project;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        $userIP = $_SERVER['REMOTE_ADDR'];
        $getTime = date("Y-m-d h:i:sa");

        Visitor::create([
            'ip_address' => $userIP,
            'visit_time' => $getTime,
        ]);

        $services = Service::orderBy('id','desc')->take(4)->get();

        $courses = Course::orderBy('id','desc')->take(6)->get();

        $projects = Project::orderBy('id','desc')->take(10)->get();


        return view('index',compact('services','courses','projects'));
    }


}
