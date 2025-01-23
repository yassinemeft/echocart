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
    return view('auth/sign');
})->name('sign');

Route::get('/login', function () {
    return view('auth/login');
})->name('login');
