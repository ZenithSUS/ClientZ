<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function loginview(){
        if(Auth::check()){
            return redirect('/dashboard');
        }
        return redirect('/');
    }
    public function dashboard(){
        return view('/dashboard');
    }
}
