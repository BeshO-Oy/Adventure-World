<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Models\User;
use Illuminate\Support\Facades\Auth;
use Middleware\Admin;
use App\Models\Post;
use App\Models\Teams;
use App\Models\Job_Category;
use App\Models\Job_Position;



Route::get('/',[ HomeController::class,'dashboard']);


Route::get('/dashboard',[HomeController::class, 'index'])->middleware('auth')->name('dashboard');



Route::get('/home',[HomeController::class, 'index'])->middleware('auth')->name('home');

Route::get('post',[HomeController::class, 'post'])->middleware(['auth'])->name('post');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/post_page',[ AdminController::class,'post_page'])->middleware('auth','admin');

Route::post('/add_post',[ AdminController::class,'add_post'])->middleware('auth','admin');

Route::get('/show_post',[ AdminController::class,'show_post'])->middleware('auth','admin');

Route::get('/delete_post/{id}',[ AdminController::class,'delete_post'])->middleware('auth','admin');

Route::get('/edit_post/{id}',[ AdminController::class,'edit_post'])->middleware('auth','admin');

Route::post('/update_post/{id}',[ AdminController::class,'update_post'])->middleware('auth','admin');

Route::get('/approve_post/{id}',[ AdminController::class,'approve_post'])->middleware('auth','admin');

Route::get('/admin_teams',[ AdminController::class,'admin_teams'])->middleware('auth','admin');

Route::get('/delete_user/{id}',[ AdminController::class,'delete_user'])->middleware('auth','admin');

Route::get('/edit_user/{id}',[ AdminController::class,'edit_user'])->middleware('auth','admin');

Route::post('/update_user/{id}',[ AdminController::class,'update_user'])->middleware('auth','admin');

Route::get('/add_teams',[ AdminController::class,'add_teams'])->middleware('auth','admin');

Route::post('/create_team',[ AdminController::class,'create_team'])->middleware('auth','admin');

Route::get('/delete_teams/{id}',[ AdminController::class,'delete_teams'])->middleware('auth','admin');

Route::get('/edit_teams/{id}',[ AdminController::class,'edit_teams'])->middleware('auth','admin');

Route::post('/update_teams/{id}',[ AdminController::class,'update_teams'])->middleware('auth','admin');

Route::get('/job_category',[ AdminController::class,'job_category'])->middleware('auth','admin');

Route::get('/job_position',[ AdminController::class,'job_position'])->middleware('auth','admin');

Route::get('/delete_category/{id}',[ AdminController::class,'delete_category'])->middleware('auth','admin');

Route::get('/edit_category/{id}',[ AdminController::class,'edit_category'])->middleware('auth','admin');

Route::get('/add_category',[ AdminController::class,'add_category'])->middleware('auth','admin');

Route::post('/create_category',[ AdminController::class,'create_category'])->middleware('auth','admin');

Route::get('/add_position',[ AdminController::class,'add_position'])->middleware('auth','admin');

Route::get('/delete_position/{id}',[ AdminController::class,'delete_position'])->middleware('auth','admin');

Route::get('/edit_position/{id}',[ AdminController::class,'edit_position'])->middleware('auth','admin');

Route::post('/update_position/{id}',[ AdminController::class,'update_position'])->middleware('auth','admin');

Route::post('/create_position',[ AdminController::class,'create_position'])->middleware('auth','admin');

Route::get('/service_category',[ AdminController::class,'service_category'])->middleware('auth','admin');

Route::get('/add_service_category',[ AdminController::class,'add_service_category'])->middleware('auth','admin');

Route::post('/create_service_category',[ AdminController::class,'create_service_category'])->middleware('auth','admin');

Route::get('/delete_service_category/{id}',[ AdminController::class,'delete_service_category'])->middleware('auth','admin');

Route::get('/edit_service_category/{id}',[ AdminController::class,'edit_service_category'])->middleware('auth','admin');

Route::post('/update_service_category/{id}',[ AdminController::class,'update_service_category'])->middleware('auth','admin');

Route::get('/service',[ AdminController::class,'service'])->middleware('auth','admin');

Route::get('/add_service',[ AdminController::class,'add_service'])->middleware('auth','admin');

Route::post('/create_service',[ AdminController::class,'create_service'])->middleware('auth','admin');

Route::get('/delete_service/{id}',[ AdminController::class,'delete_service'])->middleware('auth','admin');

Route::get('/edit_service/{id}',[ AdminController::class,'edit_service'])->middleware('auth','admin');

Route::post('/update_service/{id}',[ AdminController::class,'update_service'])->middleware('auth','admin');








//-----------------------------------User Routes----------------------------------------------

Route::get('/post_details/{id}',[ HomeController::class,'post_details'])->middleware('auth');

Route::get('/add_post',[ UserController::class,'add_post'])->middleware('auth','user');

Route::post('/user_post',[ UserController::class,'user_post'])->middleware('auth','user');

Route::get('/myposts_user',[ UserController::class,'myposts_user'])->middleware('auth','user');

Route::get('/delete_post_user/{id}',[ UserController::class,'delete_post_user'])->middleware('auth','user');

Route::get('/edit_post_user/{id}',[ UserController::class,'edit_post_user'])->middleware('auth','user');

Route::post('/update_post_user/{id}',[ UserController::class,'update_post_user'])->middleware('auth','user');

Route::get('/aboutpage',[ UserController::class,'aboutpage'])->middleware('auth','user');

Route::get('/goto_about',[ UserController::class,'goto_about'])->middleware('auth','user');

Route::get('/subscribe',[ UserController::class,'subscribe'])->middleware('auth','user');

