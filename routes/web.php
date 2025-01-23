<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


Route::get('/', function () {
    return view('welcome');
});


Route::resource('products', ProductController::class);

Route::get('/', function () {
    return view('home');
})->name('home');


Route::resource('products', ProductController::class);

Route::get('/sign', function () {
    return view('sign');
})->name('sign');
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::view('/login', 'login')->name('login');
Route::view('/sign-up', 'sign')->name('register');
