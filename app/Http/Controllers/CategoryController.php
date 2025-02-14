<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
        public function showCategory()
    {
        $categories = Category::all();
        $randomProducts = Product::inRandomOrder()->limit(14)->get();
        $reviews = Review::inRandomOrder()->limit(20)->get();
        return view('add_product', compact('categories', 'randomProducts', 'reviews'));
    }
}
