<?php

namespace App\Http\Controllers;
use App\Models\Client;
use App\Models\Companies;
use App\Models\Departments;
use App\Models\Users;;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function view_add_client()
    {
        return view('/modify_action/add_client', 
        ['companies' => Companies::all(),
         'departments' => Departments::all()]);
    }

    public function add_client_action(Request $request)
    {
        $incomingFields = $request->validate([
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'email' => ['required', 'unique:clients'],
            'phone' => ['required', 'unique:clients'],
            'company_id' => 'required',
            'department_id' => 'required'
        ]);
        Client::create($incomingFields);
        return redirect('/clients')->with('success', 'Client Added');
    }

    public function view_edit_client($id){
        $client = Client::find($id);
        return view('/modify_action/edit_client', 
        ['client' => $client,
         'companies' => Companies::all(),
         'departments' => Departments::all()]);
    }

    public function edit_client_action(Request $request, $id){
        $incomingFields = $request->validate([
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'email' => ['required', 'unique:clients,email,'.$id],
            'phone' => ['required', 'unique:clients,phone,'.$id],
            'company_id' => 'required',
            'department_id' => 'required'
        ]);
        $client = Client::find($id);
        $client->update($incomingFields);
        return redirect('/clients')->with('success', 'Client Updated');
    }

    public function view_inactive_clients(){
        $clients = Client::where('status', 'inactive')->get();
        return view('/modify_action/view_inactive_clients', ['clients' => $clients]);
    }

    public function admin_view_inactive_action($id){
        $client = Client::find($id);
        $client->status = 'active';
        $client->save();
        return redirect('/feature_action/clients')->with('success', 'Client Restored');
    }
    

    public function delete_client_action($id){
        $client = Client::find($id);
        if(auth()->user()){
            $client->status = 'inactive';
            $client->save();
            return redirect('/feature_action/clients')->with('success', 'Client Deleted');
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
        $result = DB::table('clients')
        ->join('companies', 'clients.company_id', '=', 'companies.id')
        ->join('departments', 'clients.department_id', '=', 'departments.id')
        ->select('clients.*', 'companies.name as company_name', 'departments.name as department_name')
        ->where('status', 'active')
        ->orderBy('first_name')
        ->get();
        return view('/actions/feature_action/clients', ['clients' => $result]);
    }

    public function sort_email(){
        $result = DB::table('clients')
        ->join('companies', 'clients.company_id', '=', 'companies.id')
        ->join('departments', 'clients.department_id', '=', 'departments.id')
        ->select('clients.*', 'companies.name as company_name', 'departments.name as department_name')
        ->where('status', 'active')
        ->orderBy('email')
        ->get();
        return view('/actions/feature_action/clients', ['clients' => $result]);
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

    public function view_clients(){
        $result = DB::table('clients')
            ->join('companies', 'clients.company_id', '=', 'companies.id')
            ->join('departments', 'clients.department_id', '=', 'departments.id')
            ->select('clients.*', 'companies.name as company_name', 'departments.name as department_name')
            ->where('clients.status', 'active')
            ->get();
    
        return view('/actions/feature_action/clients', ['clients' => $result]);
    }

    public function view_general(){
        return view('/actions/feature_action/general', 
        ['departments' => Departments::all(), 
        'companies' => Companies::all(),
        'data' => [
            'department' => Departments::all()->count(),
            'companies' => Companies::all()->count()
        ]]);
    }

    public function view_all_departments(){
        return view('/actions/feature_action/departments', ['departments' => Departments::all()]);
    }
    public function view_departments(){
        return view('/actions/feature_action/create_department', ['companies' => Companies::all()]);
    }

    public function create_department_action(Request $request){
        $incomingFields = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'company_id' => 'required'
        ]);
        Departments::create($incomingFields);
        return redirect('/feature_action/departments')->with('success', 'Department Added');
    }

    public function view_companies(){
        return view('/actions/feature_action/create_company');
    }

    public function view_all_companies(){
        return view('/actions/feature_action/companies', ['companies' => Companies::all()]);
    }

    public function create_company_action(Request $request){
        $incomingFields = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'email' => ['required', 'unique:companies,email'],
            'website' => ['required', 'unique:companies,website']
        ]);
        Companies::create($incomingFields);
        return redirect('/feature_action/companies')->with('success', 'Company Added');
    }
    
    public function delete_company_action($id){
        $company = Companies::find($id);
        $company->delete();
        return redirect('/feature_action/companies')->with('success', 'Company Deleted');
    }
}
