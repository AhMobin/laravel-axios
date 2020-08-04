<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Visitor;

class VisitorsController extends Controller
{
    public function visitors(){
        return view('pages.visitors');
    }

    public function getVisitorData(){
        $visitorData = Visitor::all();
        return $visitorData;
    }
}
