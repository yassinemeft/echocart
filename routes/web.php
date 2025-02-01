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
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController;

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
Route::get('/payment', function () {
    return view('auth/payment');
})->name('payment');

// Authentication routes
Auth::routes();

// Home page after login
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Contact form

Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.form');
Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.submit');

// Product search
use App\Http\Controllers\ProfileController;

Route::get('/search', [ProductController::class, 'search'])->name('product.search');


// View Products page
Route::get('/view_product', function () {
    return view('view_product');
})->name('view_product');


// Product search
Route::get('/products', [ProductController::class, 'search'])->name('product.search');


// View create product page
Route::get('/create_product', function () {
    return view('create_product');
})->name('create_product');

// View profile page
Route::get('/profile', function () {
    return view('profile');
})->name('profile');



// View product page
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');




// delete account
Route::delete('/account/delete', [ProfileController::class, 'deleteAccount'])->name('account.delete');

// show profile
Route::get('/profile', [ProfileController::class, 'show'])->middleware('auth')->name('profile.show');

