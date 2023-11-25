<?php

namespace App\Http\Controllers;

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

    public function show_new_pro(){
        $show_new_pro = Product::orderBy('product_id', 'desc')->paginate(8);
        return view('pages.paratials.home_pages', ['show_new_pro' => $show_new_pro]);
    }
    
    public function shop(){
        $cate = DB::table('categories')->get();
        $shop = Product::orderBy('product_id', 'desc')->paginate(12);
        return view("pages.product.product", ['shop' => $shop],['cate' => $cate]);
    }


}
