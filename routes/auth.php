<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function () {
    Route::post('/logout', [LoginUserController::class, 'destroy'])->name('logout');

    Route::get('/account', [AccountController::class, 'show'])->name('account');
    Route::put('/account', [AccountController::class, 'update'])->name('account');

    Route::get('/post', [PostController::class, 'create'])->name('post.create');
});
