<?php

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

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Home page
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Home page
Route::get('/home', function () {
    return view('home');
})->name('home');

// Login and sign up pages
Route::view('/login', 'login')->name('login');
Route::view('/sign', 'sign')->name('sign');

// Payement page
Route::get('/payement', function () {
    return view('auth/payement');
})->name('payement');

// Authentication routes
Auth::routes();

// Home page after login
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Contact form
use App\Http\Controllers\ContactController;

Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.form');
Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.submit');

// Product search
use App\Http\Controllers\ProductController;

Route::get('/search', [ProductController::class, 'search'])->name('product.search');

// View Products page
Route::get('/view_products', function () {
    return view('view_products');
})->name('view_products');

// View create product page
Route::get('/create_product', function () {
    return view('create_product');
})->name('create_product');

// View profile page
Route::get('/profile', function () {
    return view('profile');
})->name('profile');


