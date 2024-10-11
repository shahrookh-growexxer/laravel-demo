<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

Route::get('/', function () {
    return view('welcome');
});


//Route::resource('posts', PostController::class)->middleware('auth');

//Route::get('/comments/{postId}', [CommentsController::class, 'index'])->name('comments.index');

Route::resource('users', UserController::class);
Route::resource('posts', PostController::class);
Route::resource('comments', CommentController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
