<?php

use App\Http\Controllers\AgentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ReceiverController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\LabelController;
use App\Http\Controllers\MawbController;
use App\Models\Role;

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

Auth::routes();
Route::get('/register',function () {
    return redirect('login');
})->name('register');
Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade'); 
	Route::get('map', function () {return view('pages.maps');})->name('map');
	Route::get('icons', function () {return view('pages.icons');})->name('icons'); 
	Route::get('table-list', function () {return view('pages.tables');})->name('table');
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
	//roles and permission
	Route::resource('roles', RoleController::class);
	Route::resource('users', UserController::class);
	Route::resource('orders',OrderController::class);


	// thông tin cargo
	Route::resource('infor', InfoController::class);
	//thông tin customer & receiver
	Route::resource('customers', CustomerController::class);
	Route::resource('receivers', ReceiverController::class);
	Route::get('orders/{id}',[InvoiceController::class,'print']);
	route::get('list_customer',[CustomerController::class,'get_all'])->name('listcustomer');
	route::get('list_receiver',[ReceiverController::class,'get_all'])->name('listreceiver');
	//Invoice and label.
	Route::get('invoice/{id}',[InvoiceController::class,'print']);
	Route::get('labels',[LabelController::class,'label']);
	//shipment
	Route::resource('mawb',MawbController::class);
	//agents
	Route::resource('agents',AgentController::class);
	
});
Route::post('receiver',[ReceiverController::class,'store'])->name('postre');
Route::get('tests', function () {
    return view('test');
})->name('test');
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
	\UniSharp\LaravelFilemanager\Lfm::routes();
	});
