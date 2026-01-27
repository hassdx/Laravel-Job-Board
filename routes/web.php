<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;


// Public Routes
Route::get('/', IndexController::class); 
Route::get('/contact', ContactController::class);
 
Route::get('/job', [JobController::class, 'index']);

Route::resource('comments', CommentController::class);
Route::resource('tags', TagController::class);

Route::get('/login', [App\Http\Controllers\AuthController::class, 'showloginForm'])->name('login');
Route::get('/signup', [App\Http\Controllers\AuthController::class, 'showSignupForm'])->name('signup');

route::post('/signup', [App\Http\Controllers\AuthController::class, 'signup']);
route::post('/login', [App\Http\Controllers\AuthController::class, 'login']);
route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');


// Protected Routes
Route::middleware('auth')->group(function(){
    Route::resource('blog', PostController::class);
    Route::resource('comments', CommentController::class);


});

Route::middleware('onlyMe')->group(function(){
    Route::get('/about', AboutController::class );
});