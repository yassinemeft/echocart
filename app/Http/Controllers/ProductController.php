<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function search(Request $request)
    {
    // Get search query from request
    $searchQuery = $request->input('query');

    // Perform search on the 'title' and 'asin' columns (or any other relevant columns)
    $products = Product::whereRaw("MATCH(title, asin) AGAINST (? IN NATURAL LANGUAGE MODE)", [$searchQuery])
                       ->whereRaw("MATCH(title, asin) AGAINST (? IN BOOLEAN MODE)", [$searchQuery])
                       ->whereRaw('CHAR_LENGTH(title) > 5')
                       ->orderByRaw('CHAR_LENGTH(title) ASC')
                       ->paginate(10);

    return view('products', compact('products'));
    }
}
