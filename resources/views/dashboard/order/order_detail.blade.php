@extends('dashboard.dashboard')
@section('contents')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h5>Tên sản phẩm: {{ $product->product_name }}</h5>
                                <h5>Thuộc danh mục: {{ $product->category_name }}</h5>
                                <h5>Giá sản phẩm: {{ number_format($product->product_price) }} vnđ</h5>
                                <h5>Số lượng đặt: {{ $product->quantity }}</h5>
                                <h5>Hình ảnh: <img width="100px" height="100px"
                                        src="{{ asset('uploads/' . $product->product_images) }}" alt="Product Image"></h5>
                                <h5>Tổng: {{ number_format($product->quantity * $product->product_price) }} vnđ</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
                
            </div>
            <div class="row">
                <div class="col-md-3 grid-margin stretch-card">
                    <div class="card">
                        <a href="{{route('send-order',['id' => $product->order_id])}}" style="color: white" class="btn btn-success">Xác nhận gửi đơn</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
