<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\AdminController;
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


Route::get('/',[Homecontroller::class,'welcome'])->name('welcome');
Route::get('/redirect',[Homecontroller::class,'redirect'])->name('home');
Route::get('/login',[Authcontroller::class,'login'])->name('login');
Route::post('/login',[Authcontroller::class,'loginUser'])->name('loginUser');
Route::get('/registration',[Authcontroller::class,'registration'])->name('registration');
Route::post('/registration',[Authcontroller::class,'registrationUser'])->name('registrationUser');
Route::get('/logout',[Authcontroller::class,'logout'])->name('logout');
route::get('/post',[HomeController::class,'post'])->name('post');
Route::get('/add_post',[Homecontroller::class,'add_post'])->name('add_post');
route::get('/single',[HomeController::class,'single'])->name('single');
Route::post('/poster',[HomeController::class,'poster'])->name('poster');
route::get('/properties',[AdminController::class,'properties'])->name('properties');



route::get('/index',[HomeController::class,'index']);
route::get('/adoption',[HomeController::class,'adoption']);
route::get('/adoptpost',[HomeController::class,'adoptpost'])-> middleware('auth');
route::post('/add_adoption2',[HomeController::class,'add_adoption2']);
route::get('/blog',[HomeController::class,'blog']);

Route::get('/verify_post/{id}', [AdminController::class, 'verify_post'])->name('verify_post');
Route::get('/verify_post/{id}', [AdminController::class, 'verify_post'])->name('verify_post');
Route::get('/reject_post/{id}', [AdminController::class, 'reject_post'])->name('reject_post');


//AYAN
//Search in home.blog.php
// Route::get('/home_search_blog',[HomeController::class,'home_search_blog']);

// //Search in admin.show_post.php
// Route::get('/admin_search_post', [AdminController::class, 'admin_search_post']);

//Auction

route::get('/post_auction',[HomeController::class,'post_auction'])->name('post_auction');
Route::post('/added_auction',[HomeController::class,'added_auction'])->name('added_auction');
route::get('/monitor',[AdminController::class,'monitor'])->name('monitor');