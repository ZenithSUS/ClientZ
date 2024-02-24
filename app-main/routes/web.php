<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Authentication routes
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register_action', [AuthController::class, 'register_action']);
Route::get('/logout', function(){
    Auth::logout();
    return redirect('/loginview');
});
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AuthController::class, 'view_dashboard']);
});
Route::get('/register', [AuthController::class, 'register']);

//Page routes
Route::get('/loginview', [PageController::class, 'loginview']);
Route::get('/loginview', [PageController::class, 'loginview'])->name('loginview');
Route::get('/login_not_auth', [PageController::class, 'login_not_auth'])->name('login_not_auth');

//Admin routes
Route::middleware('auth')->group(function () {
    Route::get('/admin_add', [AdminController::class, 'view_add_client']);
    Route::post('/add_client_action', [AdminController::class, 'add_client_action']);
    Route::get('/admin_edit/{id}', [AdminController::class, 'view_edit_client']);
    Route::post('/edit_client_action/{id}', [AdminController::class, 'edit_client_action']);
    Route::get('/admin_delete/{id}', [AdminController::class, 'delete_client_action']);
    Route::get('/dashboard_sort', [AdminController::class, 'sort'])->name('admin_sort');
    Route::get('/dashboard_email', [AdminController::class, 'sort_email'])->name('admin_sort_email');
    Route::get('/admin_profile', [AdminController::class, 'profile']);
    Route::get('/admin_view/{id}', [AdminController::class, 'view_client']);
    Route::get('/admin_view_inactive', [AdminController::class, 'view_inactive_clients'])->name('admin_view_inactive');
    Route::post('admin_view_inactive_action/{id}', [AdminController::class, 'admin_view_inactive_action']);
    Route::get('/delete_account', [AdminController::class, 'delete_account']);
    Route::post('/delete_account_action', [AdminController::class, 'delete_account_action']);
    Route::get('/changepassword', [AdminController::class, 'change_password']);
    Route::post('/change_password_action', [AdminController::class, 'change_password_action']);
    Route::get('/reports', [AdminController::class, 'view_reports']);
    Route::get('clients', [AdminController::class, 'view_clients']);
});



//Client routes
Route::get('/user_login', function (){
    return view('/user_login');
});
Route::post('/user_login_action', [ClientController::class, 'user_login_action']);