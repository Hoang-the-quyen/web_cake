<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;
use App\Models\Product;
use DB;

class Paratials extends Controller
{

    public function index()
    {
        return view("dashboard.paratials.main");
    }


    public function sidebar()
    {
        return view('dashboard.paratials.sidebar');
    }

    public function show_new_pro()
    {
        $show_new_pro = Product::orderBy('product_id', 'desc')->paginate(8);
        return view('pages.paratials.home_pages', ['show_new_pro' => $show_new_pro]);
    }

    public function shop()
    {
        $cate = DB::table('categories')->get();
        $shop = Product::orderBy('product_id', 'desc')->paginate(40);
        return view("pages.product.product", ['shop' => $shop], ['cate' => $cate]);
    }

    public function product_detail($id)
    {
        $product = Product::where('product_id', $id)->get();
        $cate = DB::table('categories')->get();
        $sup = DB::table('suppliers')->get();

        return view('pages.product.product_detail')->with('product', $product)->with('cate', $cate)->with('sup', $sup);

    }

    // public function search_order(Request $request)
    // {
    //     $keyword = $request->timkiem;
    //     $search_orders = DB::table('orders')
    //         ->join('purchases', 'orders.order_id', '=', 'purchases.order_id')
    //         ->join('products','products.product_id','=','purchases.product_id')
    //         ->where('orders.order_id', 'like', '%' . $keyword . '%')
    //         ->select('orders.*', 'purchases.*') // Select columns you need from both tables
    //         ->get();

    //     return view('pages.cart.show_order_history')->with('search_orders', $search_orders);
    // }


    public function search_order(Request $request)
{
    $keyword = $request->timkiem;
    
    $search_orders = DB::table('orders')
        ->join('purchases', 'orders.order_id', '=', 'purchases.order_id')
        ->join('products', 'products.product_id', '=', 'purchases.product_id')
        ->where('orders.order_id', 'like', '%' . $keyword . '%')
        ->select('products.images', 'products.name', 'products.price') // Select specific columns from the 'products' table
        ->get();

    return view('pages.cart.show_order_history')->with('search_orders', $search_orders);
}



}
