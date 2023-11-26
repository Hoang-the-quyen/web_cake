<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Purchase; // Import your Purchase model
use Illuminate\Support\Facades\DB;
// CartController.php
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{


    public function checkout(Request $request)
    {
        $cart = $request->session()->get('cart');

        // Validate the request
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
            'address' => 'required|string',
            'email' => 'required|email',
            'order_id' => 'required|string',
        ]);

        $customerInfo = [
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'email' => $request->input('email'),
        ];

        try {
            // Start a database transaction
            DB::beginTransaction();

            // Step 1: Insert data into the 'orders' table
            $order = DB::table('orders')->insertGetId([
                'order_id' => $request->input('order_id'),
                'status' => 1,
                'date' => now(),
            ]);

            // Step 2: Insert data into the 'purchases' table for each item in the cart
            foreach ($cart as $item) {
                DB::table('purchases')->insert([
                    'product_id' => $item['id'],
                    'quantity' => $item['quantity'],
                    'order_id' => $request->input('order_id'),
                    'name' => $customerInfo['name'],
                    'phone' => $customerInfo['phone'],
                    'address' => $customerInfo['address'],
                    'email' => $customerInfo['email'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            // Commit the transaction if all queries succeed
            DB::commit();

            // Clear the cart from the session
            $request->session()->forget('cart');

            // Additional logic can be added here.

            return 'ok';
        } catch (\Exception $e) {
            // An error occurred, rollback the database transaction
            DB::rollback();
            return $e->getMessage(); // You might want to handle the error more gracefully
        }
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


    public function getCartCount(Request $request)
    {
        $cart = $request->session()->get('cart', []);

        $cartCount = count($cart);

        return response()->json(['count' => $cartCount]);
    }

    public function send_order($id) {
        DB::table('orders')->where('order_id', $id)->update(['status' => 2]);
    
        return redirect()->route('home-manager-order');
    }
    

}

