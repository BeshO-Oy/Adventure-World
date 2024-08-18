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

