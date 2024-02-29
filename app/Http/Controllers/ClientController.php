<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function user_login(){
        return view('login');
    }
    public function user_login_action(Request $request){
        $incomingFields = $request->validate([
            'email' => ['required'],
            'password' => ['required']
        ]);
        if(auth()->attempt($incomingFields)){
            return redirect('/dashboard');
        }
        else{
            return redirect('/loginview')->with('error', 'Invalid Credentials');
        }
    }
}
