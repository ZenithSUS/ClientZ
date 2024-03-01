<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client;
use App\Models\Departments;
use App\Models\Companies;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request){
        $incomingFields = $request->validate([
            'loginemail' => 'required',
            'loginpassword' => 'required'
        ]);
        if(auth()->attempt(['email' => $incomingFields['loginemail'], 'password' => $incomingFields['loginpassword']])){
            $request->session()->regenerate();
            return redirect('/dashboard');
        }
        else{
            return redirect('/')->with('failed', 'Invalid username or password');
        }
    }

    public function view_dashboard(){
        return view('/dashboard', ['clients' => Client::all()->where('status', 'active'), 
        'total_clients' => Client::count(),
        'active_clients' => Client::where('status', 'active')->count(),
        'inactive_clients' => Client::where('status', 'inactive')->count(),
        'total_departments' => Departments::count(),
        'total_companies' => Companies::count()]
    );
    }
    public function register(){
        return view('register');
    }

    public function register_action(Request $request){
        $incomingFields = $request->validate([
            'name' => 'required',
            'email' => ['required', 'unique:users'],
            'password' => ['required', 'min:8'],
            'password_confirmation' => 'required'
        ]);

        if($request->password == $request->password_confirmation){
            $incomingFields['password'] = bcrypt($incomingFields['password']);
            User::create($incomingFields);
            return redirect('/')->with('success', 'Your account has been created!');
        }
        else{
            return redirect('/register')->with('password_not_match', 'Passwords do not match');
        }
    }
}
