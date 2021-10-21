<?php

//get class
use App\Http\Livewire\Login;
use App\Http\Livewire\Home;
use App\Http\Livewire\Signup;
use Illuminate\Support\Facades\Route;

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

//group middleware for authentication
Route::middleware(['auth'])->group(function () {
    Route::get("/", Home::class)->name('home');
});
//group middleware for logged in users
Route::middleware(['checkLoginUser'])->group(function () {
    Route::get("/login", Login::class)->name('login');
Route::get("/signup", Signup::class)->name('signup');
});


