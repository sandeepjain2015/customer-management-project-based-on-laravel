<?php

use Illuminate\Support\Facades\Route;
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
Route::get('/',[CustomerController::class,'view']);
Route::get('/customer',[CustomerController::class,'create'])->name('customer-create');

Route::post('/customer',[CustomerController::class,'store']);

Route::get('/customer/view',[CustomerController::class,'view']);
Route::get('/customer/trash',[CustomerController::class,'trash'])->name('customer-trash');
Route::get('/customer/delete/{id}',[CustomerController::class,'destroy'])->name('customer-delete');
Route::get('/customer/force-delete/{id}',[CustomerController::class,'forceDelete'])->name('customer-force-delete');
Route::get('/customer/restore/{id}',[CustomerController::class,'restore'])->name('customer-restore');
Route::get('/customer/edit/{id}',[CustomerController::class,'edit'])->name('customer-edit');

Route::post('/customer/update/{id}',[CustomerController::class,'update'])->name('customer-update');
