<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Purchase; // Import your Purchase model
// CartController.php
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{



    public function checkout(Request $request)
    {
        $cart = $request->session()->get('cart');

        foreach ($cart as $item) {
            Purchase::create([
                'product_id' => $item['id'],
                'quantity' => $item['quantity'],
            ]);
        }

        $request->session()->forget('cart');


        return 'ok' ;
    }
    public function addToCart(Request $request)
    {
        $productId = $request->input('product_id');
        $product = Product::find($productId);

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
        } else {
            $cart[$productId] = [
                'id' => $product->product_id,
                'name' => $product->name,
                'des' => $product->des,
                'size' => $product->size,
                'price' => $product->price,
                'images' => $product->images,
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);

        return response()->json(['success' => true, 'cart' => $cart]);
    }

    public function showCart()
    {
        $cart = session()->get('cart', []);
        return response()->json(['cart' => $cart]);
    }

    public function show_cart()
    {
        $cart = session()->get('cart', []);
        return view('pages.cart.giohang')->with('cart', $cart);
    }

    public function removeFromCart(Request $request)
    {
        $productId = $request->input('product_id');
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session()->put('cart', $cart);

            return response()->json(['success' => true, 'cart' => $cart]);
        }

        return response()->json(['error' => 'Product not found in cart'], 404);
    }

}

