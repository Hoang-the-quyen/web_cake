<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;
use DB;
use Illuminate\Support\Facades\Redirect;

class Users extends Controller
{
    public function view_login()
    {
        return view('pages.user.login');
    }

    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $result = DB::table('customers')->where('email', $email)->where('password', $password)->first();

        if ($result) {
            // Đúng thông tin đăng nhập, thực hiện các thao tác cần thiết
            Session::put('customer_id', $result->customer_id);
            return redirect()->route('home-page'); // Chuyển hướng đến trang home sau khi đăng nhập thành công
        }else if($email === "admin@gmail.com" && $password === "123"){
            return redirect()->route('home-product');
        }else {
            // Thông tin đăng nhập không chính xác
            return view('pages.user.login');
        }
    }


    public function logout()
    {
        // Xử lý các thao tác cần thiết cho việc đăng xuất

        // Xóa session customer_id
        session()->forget('customer_id');

        // Chuyển hướng về trang đăng nhập hoặc trang chính của bạn
        return redirect()->route('view_login');
    }


}
