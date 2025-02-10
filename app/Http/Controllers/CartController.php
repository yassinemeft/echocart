<?php

namespace App\Http\Controllers;

use WeArePixel\LaravelCart\Facades\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    /**
     * Adds a product to the cart.
     *
     * @param \Illuminate\Http\Request $request The request containing the product ID and quantity.
     * @return \Illuminate\Http\RedirectResponse Redirects to the current route after adding the product to the cart.
     */
    public function add(Request $request)
    {
        $product = Product::find($request->input('id'));

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found');
        }

        \Cart::add([
            'id' => $product->id,
            'name' => $product->title, // Ensure 'title' is stored in the database
            'quantity' => $request->quantity,
            'price' => $product->price,
            'attributes' => [
                'image' => $product->imgUrl,
            ],
        ]);

        return redirect()->back()->with('success', 'Product added to cart successfully');
    }

    /**
     * Remove an item from the cart based on its ID.
     *
     * @param int $id The ID of the item to be removed from the cart.
     * @return \Illuminate\Http\RedirectResponse Redirects to the cart show route after removal.
     */

    public function remove($id)
    {
        \Cart::remove($id); // Pass the item ID to remove
        return redirect()->route('cart.show');
    }

    /**
     * Update the quantity of a product in the cart.
     *
     * @param int $id The ID of the item to be updated in the cart.
     * @return \Illuminate\Http\RedirectResponse Redirects to the cart show route after updating the quantity.
     */
    public function update($id)
    {
        $newQuantity = request('quantity');
        \Cart::update($id, [
            'quantity' => [
                'relative' => false, // Set to true to add instead of replace
                'value' => $newQuantity,
            ],
        ]);

        return redirect()->route('cart.show');
    }


    public function clearCart()
    {
        \Cart::clear(); // This clears all items in the cart
        return redirect()->route('cart.show')->with('success', 'Cart cleared successfully.');
    }

    public function getTotal()
    {
        $totalPrice = Cart::getTotal();
        return view('cart.view', compact('totalPrice'));
    }

    public function show()
    {
        $cartItems = \Cart::getContent();
        return view('cart.cart', compact('cartItems'));
    }

    public function testCart()
    {
        Cart::add('123', 'Produit Test', 1, 100);
        return response()->json(Cart::content());
    }
}

