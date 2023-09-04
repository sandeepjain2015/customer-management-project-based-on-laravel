<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mycontroller;
use App\Http\Controllers\productcontroller;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\SingleActionController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\CustomerController;

use App\Models\Customer;
use Illuminate\Http\Request;
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

// Route::get('/', function () {
//     return view('home');
// });


Route::get('/',[DemoController::class,'index']);
Route::get('/cource', SingleActionController::class);

Route::resource('photo', PhotoController::class);

Route::get('/about', function () {
    return view('about');
});

Route::get('/registration',[RegistrationController::class,'index']);

Route::post('/registration',[RegistrationController::class,'registration']);


Route::get('/customer',[CustomerController::class,'create'])->name('customer-create');

Route::post('/customer',[CustomerController::class,'store']);

Route::get('/customer/view',[CustomerController::class,'view']);
Route::get('/customer/trash',[CustomerController::class,'trash'])->name('customer-trash');
Route::get('/customer/delete/{id}',[CustomerController::class,'destroy'])->name('customer-delete');
Route::get('/customer/force-delete/{id}',[CustomerController::class,'forceDelete'])->name('customer-force-delete');
Route::get('/customer/restore/{id}',[CustomerController::class,'restore'])->name('customer-restore');
Route::get('/customer/edit/{id}',[CustomerController::class,'edit'])->name('customer-edit');

Route::post('/customer/update/{id}',[CustomerController::class,'update'])->name('customer-update');

Route::get('/contact', function () {
    return view('contact');
});

Route::get('helloworld', 'App\Http\Controllers\mycontroller@index');
Route::get('product', 'App\Http\Controllers\productcontroller@index');
// Route::get('product/create', 'App\Http\Controllers\productcontroller@create')->name('map');
// Route::get('/create', 'NavigationController@map')->name('map'); // note the name() method.
Route::get('/demo/{name}/{id?}',function($name,$id=null){
    $html= "<h3>Static here</h3>";
   $data = compact( 'name', 'id', 'html' );
//    print_r($data);
   return view('demo')->with($data);
});
Route::get('get-all-session', function(){
    $session = session()->all();
    p($session);
});
Route::get('set-session',function(Request $request ){
    $request->session()->put('user_name','sandeep');
    $request->session()->put('user_id','123');
    $request->session()->flash('status','active');
    // return redirect('/get-all-session');
});
Route::get('destroy-session',function(){
session()->forget(['user_name','user_id']);
});
