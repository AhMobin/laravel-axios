<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Admin;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(){
        return view('master.login');
    }

    public function loginSubmit(Request $request){
        $username = $request->UserName;
        $password = $request->UserPass;

        $count = Admin::where('username',$username)->where('password',$password)->count();

        if($count==1){
            $request->session()->put('user',$username);
            return 1;
        }else{
            return 0;
        }
    }



    public function logout(Request $request){
        $request->session()->flush();
        return redirect('login');
    }
}
