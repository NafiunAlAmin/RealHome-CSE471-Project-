<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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
route::get('/',[HomeController::class,'index']);

route::get('/redirect',[HomeController::class,'logout']);
route::get('/redirect',[HomeController::class,'register']);

route::get('/view_category',[AdminController::class,'view_category']);
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

route::get('/redirect',[HomeController::class,'redirect']);
route::get('/adoption',[HomeController::class,'adoption']);
route::get('/description/{id}',[HomeController::class,'description']);
route::post('/add_catagory',[AdminController::class,'add_catagory']);
route::get('/delete_catagory/{id}',[AdminController::class,'delete_catagory']);
route::get('/view_adoption',[AdminController::class,'view_adoption']);
route::post('/add_adoption',[AdminController::class,'add_adoption']);
route::get('/delete_adoption/{id}',[AdminController::class,'delete_adoption']);
Route::get('/post_page',[AdminController::class,'post_page']);
Route::post('/add_post',[AdminController::class,'add_post']);
Route::get('/show_post',[AdminController::class,'show_post']);
Route::get('/delete_post/{id}',[AdminController::class,'delete_post']);
route::get('/blog',[HomeController::class,'blog']);
route::get('/add_vet',[AdminController::class,'add_vet']);
route::get('/view_vet',[AdminController::class,'view_vet']);
route::post('/add_vet_info',[AdminController::class,'add_vet_info']);
Route::get('/delete_vet/{id}',[AdminController::class,'delete_vet']);
route::get('/vetpage',[HomeController::class,'vetpage']);
route::get('/vethome',[HomeController::class,'vethome']);
Route::get('/post_details/{id}',[HomeController::class,'post_details']);

//new changes
route::get('/index',[HomeController::class,'index']);
route::get('/adoption',[HomeController::class,'adoption']);
route::get('/adoptpost',[HomeController::class,'adoptpost'])-> middleware('auth');
route::post('/add_adoption2',[HomeController::class,'add_adoption2']);

Route::get('/create_post',[HomeController::class,'create_post']);
Route::post('/poster',[HomeController::class,'poster']);
Route::get('/verify_post/{id}', [AdminController::class, 'verify_post'])->name('verify_post');
Route::get('/verify_post/{id}', [AdminController::class, 'verify_post'])->name('verify_post');
Route::get('/reject_post/{id}', [AdminController::class, 'reject_post'])->name('reject_post');


//AYAN
//Search in home.blog.php
Route::get('/home_search_blog',[HomeController::class,'home_search_blog']);

//Search in admin.show_post.php
Route::get('/admin_search_post', [AdminController::class, 'admin_search_post']);


