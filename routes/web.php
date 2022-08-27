<?php

use App\Http\Controllers\Productcontroller;
use App\Http\Controllers\Usercontroller;
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

Route::get('/login', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});
Route::get('/logout', function () {
    session()->forget('user');
    return redirect('login');
});
Route::post('/login',[Usercontroller::class,'login']);
Route::post('/register',[Usercontroller::class,'register']);
Route::get('/',[Productcontroller::class,'index']);
Route::get('detail/{id}',[Productcontroller::class,'detail']);
Route::post('/add_to_cart',[Productcontroller::class,'add_to_cart']);
Route::get("search",[ProductController::class,'search']);
Route::get("cartlist",[ProductController::class,'cartlist']);
Route::get('deletecart/{id}',[Productcontroller::class,'deletecart']);
Route::get('ordernow',[Productcontroller::class,'ordernow']);
Route::post('orderplace',[Productcontroller::class,'orderplace']);
Route::get('myorders',[Productcontroller::class,'myorders']);

