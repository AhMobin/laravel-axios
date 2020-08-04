<?php

namespace App\Http\Controllers\Backend;

use App\Model\Course;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    public function courses(){
        return view('pages.courses');
    }

    public function getCourseData(){
        return Course::all();
    }


    public function courseDetails(Request $request){
        $id = $request->id;
        $details = Course::where('id',$id)->first();
        return $details;
    }

    public function courseUpdate(Request $request){
        $id = $request->id;
        $title = $request->input('courseTitle');
        $slug = Str::slug($request->input('courseTitle'));
        $desc = $request->input('courseDesc');
        $fee = $request->input('courseFee');
        $enroll = $request->input('studentEnroll');
        $thumb = $request->input('courseThumb');
        $link = $request->input('courseLink');
        $class = $request->input('courseClass');

        $update = Course::where('id',$id)->update([
            'course_title' => $title,
            'course_slug' => $slug,
            'course_desc' => $desc,
            'course_fee' => $fee,
            'total_class' => $class,
            'total_enroll' => $enroll,
            'course_link' => $link,
            'course_thumb' => $thumb,
        ]);

        if($update == true){
            return 1;
        }else{
            return 0;
        }
    }


    public function courseDelete(Request $request){

        $id = $request->id;
        $delete = Course::where('id',$id)->delete();

        if($delete == true){
            return 1;
        }else{
            return 0;
        }
    }


    public function courseInsert(Request $request){
        $title = $request->input('courseTitle');
        $slug = Str::slug($request->input('courseTitle'));
        $desc = $request->input('courseDesc');
        $fee = $request->input('courseFee');
        $enroll = $request->input('studentEnroll');
        $thumb = $request->input('courseThumb');
        $link = $request->input('courseLink');
        $class = $request->input('courseClass');

        $insert = Course::create([
            'course_title' => $title,
            'course_slug' => $slug,
            'course_desc' => $desc,
            'course_fee' => $fee,
            'total_class' => $class,
            'total_enroll' => $enroll,
            'course_link' => $link,
            'course_thumb' => $thumb,
        ]);

        if($insert == true){
            return 1;
        }else{
            return 0;
        }

    }



}
