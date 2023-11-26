<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class Categorys extends Controller
{
    public function index()
    {
        $table_cate = Category::paginate(10);
        return view('dashboard.group_products.category.index', ['table_cate' => $table_cate]);
    }

    public function create()
    {
        return view('dashboard.group_products.category.add-cate');
    }

    public function store(Request $request)
    {
        $data = array();
        $data['category_name'] = $request->name;

        $get_image = $request->file('icon');

        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_name_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();

            // upload vào folder
            $get_image->move('uploads', $get_name_image);
            $data['icon'] = $get_name_image;

            Category::insert($data);
            return Redirect::to('dashboards/categories/home-cate');
        }
        $data['icon'] = '';
        Category::insert($data);
        return Redirect::to('dashboards/categories/home-cate');

    }

    public function edit($id)
    {
        $cate = Category::where('category_id', $id)->get();

        return view('dashboard.group_products.category.edit-cate')->with('cate', $cate);

    }

    public function update(Request $request, $id)
    {
        $data = array();
        $data['category_name'] = $request->name;


        $get_image = $request->file('icon');

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

            $data['icon'] = $new_name_image;
        } elseif ($request->has('old_image')) {
            // Nếu không chọn ảnh mới và có ảnh cũ, giữ nguyên ảnh cũ
            $data['icon'] = $request->old_image;
        }

        // Cập nhật thông tin sản phẩm
        Category::where('category_id', $id)->update($data);

        return Redirect::to('dashboards/categories/home-cate');

    }

    public function destroy($id)
    {
        $cate = Category::where('category_id', $id);
        $cate->delete();

        // Chuyển hướng về trang danh sách sản phẩm hoặc trang khác tùy ý
        return redirect()->route('home-cate')->with('success', 'Danh mục đã được xóa thành công.');
    }

}
