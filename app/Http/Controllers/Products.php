<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

session_start();

class Products extends Controller
{

    public function index()
    {
        $table_pro = Product::paginate(10);
        return view('dashboard.group_products.products.index', ['table_pro' => $table_pro]);

    }


    public function create()
    {
        $cate = DB::table('categories')->get();
        $sup = DB::table('suppliers')->get();
        return view('dashboard.group_products.products.add-product')->with('cate', $cate)->with('sup', $sup);
    }


    public function store(Request $request)
    {
        $data = array();
        $data['name'] = $request->name;
        $data['des'] = $request->des;
        $data['price'] = $request->price;
        $data['status'] = $request->status;
        $data['size'] = $request->size;
        $data['category_id'] = $request->category_id;
        $data['supplier_id'] = $request->supplier_id;


        $get_image = $request->file('images');

        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_name_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();

            // upload vào folder
            $get_image->move('uploads', $get_name_image);
            $data['images'] = $get_name_image;

            Product::insert($data);
            return Redirect::to('dashboards/products/home-product');
        }
        $data['images'] = '';
        Product::insert($data);
        return Redirect::to('dashboards/products/home-product');

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $product = Product::where('product_id', $id)->get();
        $cate = DB::table('categories')->get();
        $sup = DB::table('suppliers')->get();

        return view('dashboard.group_products.products.edit-product')->with('product', $product)->with('cate', $cate)->with('sup', $sup);

    }

    public function update(Request $request, $id)
    {
        $data = array();
        $data['name'] = $request->name;
        $data['des'] = $request->des;
        $data['price'] = $request->price;
        $data['status'] = $request->status;
        $data['size'] = $request->size;
        $data['category_id'] = $request->category_id;
        $data['supplier_id'] = $request->supplier_id;

        $get_image = $request->file('images');

        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_name_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();

            // Upload ảnh mới vào folder
            $get_image->move('uploads', $new_name_image);

            // Xóa ảnh cũ (nếu có)
            $old_image_path = public_path('uploads/' . $request->old_image);

            if (file_exists($old_image_path) && is_file($old_image_path)) {
                // Kiểm tra và xóa nếu là tệp tin
                unlink($old_image_path);
            }

            $data['images'] = $new_name_image;
        } elseif ($request->has('old_image')) {
            // Nếu không chọn ảnh mới và có ảnh cũ, giữ nguyên ảnh cũ
            $data['images'] = $request->old_image;
        }

        // Cập nhật thông tin sản phẩm
        Product::where('product_id', $id)->update($data);

        return Redirect::to('dashboards/products/home-product');

    }



    public function destroy($id)
    {
        try {
            // Tìm sản phẩm cần xóa
            $product = Product::findOrFail($id);

            // Thực hiện xóa sản phẩm
            $product->delete();

            // Chuyển hướng về trang danh sách sản phẩm hoặc trang khác tùy ý
            return redirect()->route('home-product')->with('success', 'Sản phẩm đã được xóa thành công.');
        } catch (\Exception $e) {
            // Xử lý lỗi nếu có
            return redirect()->route('home-product')->with('error', 'Đã xảy ra lỗi khi xóa sản phẩm.');
        }
    }
}
