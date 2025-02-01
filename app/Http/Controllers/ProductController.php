<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;



class ProductController extends Controller
{
    public function search(Request $request) {
    $query = Product::query();

    // Keyword Search
    if ($request->filled('query')) {
        $query->where('title', 'LIKE', "%{$request->input('query')}%")
              ->orWhere('asin', 'LIKE', "%{$request->input('query')}%")
              ->whereRaw('LENGTH(title) > 5');
    }

    // Price Range Filter
    if ($request->filled('min_price')) {
        $query->where('price', '>=', $request->input('min_price'));
    }
    if ($request->filled('max_price')) {
        $query->where('price', '<=', $request->input('max_price'));
    }

    // Star Rating Filter
    if ($request->filled('stars')) {
        $query->where('stars', '>=', $request->input('stars'));
    }

    

    // Sorting Options
    if ($request->filled('sort')) {
        switch ($request->input('sort')) {
            case 'price-low':
                $query->orderBy('price', 'asc');
                break;
            case 'price-high':
                $query->orderBy('price', 'desc');
                break;
            case 'best-rating':
                $query->orderBy('stars', 'desc');
                break;
        }
    }

    // Get Filtered Products with Pagination
    $products = $query->paginate(210);

    return view('products', compact('products'));


    
}

// View Product Details
    public function show($id)
    {
        $product = Product::findOrFail($id); // Fetch product by ID
        $relatedProducts = Product::where('category_id', $product->category_id)
                                ->limit(21)
                                ->get();

        $randomProducts = Product::inRandomOrder()->limit(14)->get();

        $reviews = Review::inRandomOrder()->limit(20)->get();
                      
        return view('view_product', compact('product', 'relatedProducts', 'randomProducts', 'reviews'));
    }


}
