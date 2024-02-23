<?php


namespace App\Http\Controllers;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function view_add_client()
    {
        return view('/modify_action/add_client');
    }

    public function add_client_action(Request $request)
    {
        $incomingFields = $request->validate([
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'email' => ['required', 'unique:clients'],
            'phone' => ['required', 'unique:clients']
        ]);
        Client::create($incomingFields);
        return redirect('/dashboard')->with('success', 'Client Added');
    }

    public function view_edit_client($id){
        $client = Client::find($id);
        return view('/modify_action/edit_client', ['client' => $client]);
    }

    public function edit_client_action(Request $request, $id){
        $incomingFields = $request->validate([
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'email' => ['required', 'unique:clients,email,'.$id],
            'phone' => ['required', 'unique:clients,phone,'.$id]
        ]);
        $client = Client::find($id);
        $client->update($incomingFields);
        return redirect('/dashboard')->with('success', 'Client Updated');
    }

    public function view_inactive_clients(){
        $clients = Client::where('status', 'inactive')->get();
        return view('/modify_action/view_inactive_clients', ['clients' => $clients]);
    }

    public function admin_view_inactive_action($id){
        $client = Client::find($id);
        $client->status = 'active';
        $client->save();
        return redirect('/dashboard')->with('success', 'Client Restored');
    }
    

    public function delete_client_action($id){
        $client = Client::find($id);
        if(auth()->user()){
            $client->status = 'inactive';
            $client->save();
            return redirect('/dashboard')->with('success', 'Client Deleted');
        }
        else{
            return redirect('/loginview')->with('error', 'Unauthorized');
        }
    }

    public function view_client($id){
        $client = Client::find($id);
        return view('/modify_action/view_client', ['client' => $client]);
    }

    public function sort(){
        return view('/dashboard', ['clients' => Client::all()->sortBy('last_name')->where('status', 'active'), 
        'total_clients' => Client::count(),
        'active_clients' => Client::where('status', 'active')->count(),
        'inactive_clients' => Client::where('status', 'inactive')->count()]);
    }

    public function sort_email(){
        return view('/dashboard', ['clients' => Client::all()->sortBy('email')->where('status', 'active'), 
        'total_clients' => Client::count(),
        'active_clients' => Client::where('status', 'active')->count(),
        'inactive_clients' => Client::where('status', 'inactive')->count()]);
    }

    public function profile(){
        return view('/actions/profile');
    }
    public function profile_action(){
        
    }

    public function change_password(){
        return view('/actions/change_password');
    }
    public function change_password_action(Request $request){
        $incomingFields = $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
        ]);

        $user = auth()->user();
        if(Hash::check($incomingFields['old_password'], $user->password)){
            $user->password = Hash::make($incomingFields['new_password']);
            $user->save();
        }
        return redirect('/')->with('success', 'Password Changed');
    }

    public function delete_account(){
        return view('/actions/delete_account');
    }
    public function delete_account_action(Request $request){
        $user = auth()->user();
        if($user){
            $user->delete();
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/')->with('success', 'Account Deleted!');
        }
    }


}
