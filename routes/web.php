<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
Route::resource('products', ProductController::class);
Route::resource('products', ProductController::class);


Route::get('/', function () {
    return view('welcome');
});


Route::get('/', function () {
    return view('home');
})->name('home');


Route::get('/sign', function () {
    return view('sign');
})->name('sign');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::view('/login', 'login')->name('login');
Route::view('/sign-up', 'sign')->name('register');
