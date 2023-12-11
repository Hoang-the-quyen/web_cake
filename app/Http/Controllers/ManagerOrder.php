<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Purchase;
use DB;
class ManagerOrder extends Controller
{
    public function index() {
        $order = DB::table('orders')->orderBy('order_id','desc')->get();
        $totalAmount = Purchase::join('products', 'purchases.product_id', '=', 'products.product_id')
            ->selectRaw('SUM(purchases.quantity * products.price) as total_amount')
            ->first()->total_amount;
        return view('dashboard.order.index')->with('order',$order)->with('totalAmount',$totalAmount);
    }

    public function order_detail($id) {
        // Lấy thông tin đơn hàng từ bảng orders
        $order = DB::table('orders')
            ->where('order_id', $id)
            ->first();
    
        // Nếu đơn hàng không tồn tại, xử lý tương ứng (ví dụ: hiển thị thông báo lỗi)
    
        // Lấy thông tin sản phẩm từ bảng purchase và kết nối với bảng product và categories
        $products = DB::table('purchases')
            ->join('products', 'purchases.product_id', '=', 'products.product_id')
            ->join('categories', 'products.category_id', '=', 'categories.category_id')
            ->select('purchases.*', 'products.name as product_name','products.images as product_images', 'products.price as product_price', 'categories.category_name')
            ->where('purchases.order_id', $id)
            ->get();
    
        // Truyền thông tin đơn hàng và sản phẩm vào view
        return view('dashboard.order.order_detail', compact('order', 'products'));
    }

    public function destroy($id){
        try {
            $order = DB::table('orders')->findOrFail($id);

            $order->delete();

            // Chuyển hướng về trang danh sách sản phẩm hoặc trang khác tùy ý
            return redirect()->route('home-manager-order')->with('success', 'hủy đơn hàng thành công');
        } catch (\Exception $e) {
            // Xử lý lỗi nếu có
            return redirect()->route('home-manager-order')->with('error', 'Đã xảy ra lỗi khi xóa khi hủy đơn hàng.');
        }
    }
    
}
