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
route::get('/specificpost/{address}',[HomeController::class,'specificpost'])->name('specificpost');


Route::get('/add_post',[Homecontroller::class,'add_post'])->name('add_post');
route::get('/single/{id}',[HomeController::class,'single'])->name('single');
route::get('/history/{username}',[HomeController::class,'history'])->name('history');
route::get('/user_history',[HomeController::class,'userhistory'])->name('user_history');
Route::get('/reject_post1/{id}', [Homecontroller::class, 'reject_post'])->name('reject_post1');
Route::get('/crime', [Homecontroller::class, 'crime'])->name('crime');
Route::post('/poster',[HomeController::class,'poster'])->name('poster');
route::get('/properties',[AdminController::class,'properties'])->name('properties');
route::get('/nearby',[AdminController::class,'nearby'])->name('nearby');
Route::post('/postnearby',[AdminController::class,'postnearby'])->name('postnearby');
Route::get('/places', [Homecontroller::class, 'places'])->name('places');
route::get('/singleplace/{id}',[HomeController::class,'singleplace'])->name('singleplace');
route::get('/index',[HomeController::class,'index']);
route::get('/adoption',[HomeController::class,'adoption']);
route::get('/adoptpost',[HomeController::class,'adoptpost'])-> middleware('auth');
route::post('/add_adoption2',[HomeController::class,'add_adoption2']);
route::get('/blog',[HomeController::class,'blog']);

Route::get('/verify_post/{id}', [AdminController::class, 'verify_post'])->name('verify_post');
Route::get('/verify_post/{id}', [AdminController::class, 'verify_post'])->name('verify_post');
Route::get('/reject_post/{id}', [AdminController::class, 'reject_post'])->name('reject_post');
Route::get('/status_post/{id}', [AdminController::class, 'status_post'])->name('status_post');


//AYAN
route::get('/nearby_facilities/{address}',[HomeController::class,'nearby_facilities'])->name('near');
//Search in home.blog.php
// Route::get('/home_search_blog',[HomeController::class,'home_search_blog']);

// //Search in admin.show_post.php
// Route::get('/admin_search_post', [AdminController::class, 'admin_search_post']);

//Auction

route::get('/post_auction',[HomeController::class,'post_auction'])->name('post_auction');
Route::post('/added_auction',[HomeController::class,'added_auction'])->name('added_auction');
route::get('/monitor',[AdminController::class,'monitor'])->name('monitor');
route::get('/panel',[HomeController::class,'panel'])->name('panel');
route::get('/ads',[HomeController::class,'ads'])->name('ads');
Route::post('/added_ads',[HomeController::class,'added_ads'])->name('added_ads');
route::get('/monitor_ads',[AdminController::class,'monitor_ads'])->name('monitor_ads');
route::get('/advert',[HomeController::class,'advert'])->name('advert');
Route::post('/acceptPost/{id}', [AdminController::class, 'acceptPost'])->name('acceptPost');
Route::post('/rejectPost/{id}', [AdminController::class, 'rejectPost'])->name('rejectPost');
Route::post('/comment_add',[HomeController::class,'comment_add'])->name('comment_add');


Route::post('/posts/{post}/rate', [HomeController::class,'rate'])->name('store_rating');


Route::post('/comment_add',[HomeController::class,'comment_add'])->name('comment_add');
Route::post('/reply/add', [HomeController::class, 'store'])->name('reply_add');

//module4-nus
Route::post('/comment/{id}/like', [HomeController::class, 'like'])->name('like_add');
Route::post('/comment/{id}/dislike', [HomeController::class, 'dislike'])->name('dislike_add');
Route::post('/comment/{id}/like-or-dislike', [HomeController::class, 'likeOrDislike'])->name('like_or_dislike');