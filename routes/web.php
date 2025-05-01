<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterUserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/register', [RegisterUserController::class, 'create'])->name('register');
Route::post('/register', [RegisterUserController::class, 'store']);

Route::get('/login', [LoginUserController::class, 'create'])->name('login');
Route::post('/login', [LoginUserController::class, 'store']);

Route::get('/category/{category:slug}', [CategoryController::class, 'show'])->name('category.show');

require_once ('auth.php');

Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');
