<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class MyPageController extends Controller
{
    public function index($id){
        return view('mypage', compact('id'));
    }

    public function redirect(){
        if(Auth::check()){
            $user = Auth::user();
            return redirect()->route('mypage', ['name' => $user->name]);
        }
        else{
            return redirect()->route('login');
        }
    }
}
