<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Project;
use Illuminate\Support\Str;


class ProjectController extends Controller
{
    public function projects(){
        return view('pages.projects');
    }

    public function getProjectData(){
        return Project::all();
    }

    public function addProject(Request $request){
        $name = $request->input('projectName');
        $slug = Str::slug($request->input('projectName'));
        $desc = $request->input('projectDesc');
        $thumb = $request->input('projectThumb');
        $link = $request->input('projectLink');

        $new = Project::create([
            'project_name' => $name,
            'project_slug' => $slug,
            'project_desc' => $desc,
            'project_thumb' => $thumb,
            'project_link' => $link,
        ]);

        if($new == true){
            return 1;
        }else{
            return 0;
        }
    }

    public function removeProject(Request $request){
        $id = $request->id;
        $delete = Project::where('id',$id)->delete();

        if($delete==true){
            return 1;
        }else{
            return 0;
        }
    }


    public function detailsProject(Request $request){
        $id =$request->id;
        $details = Project::where('id',$id)->first();
        return $details;
    }


    public function updateProject(Request $request){
        $id = $request->id;
        $title = $request->Title;
        $desc = $request->Desc;
        $thumb = $request->Thumb;
        $link = $request->Link;

        $update = Project::where('id',$id)->update([
            'project_name' => $title,
            'project_slug' => Str::slug($title),
            'project_desc' => $desc,
            'project_thumb' => $thumb,
            'project_link' => $link,
        ]);

        if($update == true){
            return 1;
        }else{
            return 0;
        }
    }
}
