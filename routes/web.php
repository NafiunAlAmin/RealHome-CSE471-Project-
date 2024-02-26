<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\Homecontroller;
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



Route::get('/redirect',[Homecontroller::class,'redirect'])->name('home');
Route::get('/login',[Authcontroller::class,'login'])->name('login');
Route::post('/login',[Authcontroller::class,'loginUser'])->name('loginUser');
Route::get('/registration',[Authcontroller::class,'registration'])->name('registration');
Route::post('/registration',[Authcontroller::class,'registrationUser'])->name('registrationUser');
Route::get('/logout',[Authcontroller::class,'logout'])->name('logout');
