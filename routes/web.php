<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::resource('products', ProductController::class);

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::view('/login', 'login')->name('login');
Route::view('/sign', 'sign')->name('sign');



Route::get('/payement', function () {
    return view('auth/payement');
})->name('payement');
=======
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

