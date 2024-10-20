<?php

use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('user.login');
});

Route::resource('members', MemberController::class);

Route::get('/login', [UserController::class, 'showLoginForm'])->name('user.login.form');
Route::post('/login', [UserController::class, 'login'])->name('user.login');
Route::get('/card/{id}', [UserController::class, 'showCard'])->name('user.card');

Route::middleware('auth:member')->group(function () {
    Route::get('/home', [UserController::class, 'home'])->name('user.home');
});

