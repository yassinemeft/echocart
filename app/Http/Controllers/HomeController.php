<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Fetch 4 random product images
        $products = Product::select('imgUrl')->inRandomOrder()->limit(4)->get();

        // Pass data to the view
        return view('home', compact('products'));
    }
}


/*class HomeController extends Controller
{
    public function index()
    {
        // Fetch 4 random product images
        $products = Product::select('imgUrl')->inRandomOrder()->limit(4)->get();

        // Pass data to the view
        return view('home', compact('products'));
    }
}
*/



