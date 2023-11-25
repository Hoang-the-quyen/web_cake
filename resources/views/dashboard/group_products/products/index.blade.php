@extends('dashboard.dashboard')
@section('contents')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 col-xl-12 grid-margin stretch-card">
                    <div class="row w-100 flex-grow">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title">Products</h4>
                                    <p style="display: flex" class="card-description">
                                        <input id="product-search" class="form-control"
                                            style="border: solid 1px;width:40%; margin-right:20px" type="text"
                                            placeholder="Tìm kiếm">
                                        <a class="btn btn-primary" href="{{ route('create-product') }}">Add product</a>
                                    </p>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        #
                                                    </th>
                                                    <th>
                                                        Name
                                                    </th>
                                                    <th>
                                                        Price
                                                    </th>
                                                    <th>
                                                        size
                                                    </th>
                                                    <th>
                                                        Images
                                                    </th>
                                                    {{-- <th>
                                                        Status
                                                    </th> --}}
                                                    <th>
                                                        Action
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($table_pro as $show)
                                                    <tr>
                                                        <td>
                                                            {{ $loop->iteration }}
                                                        </td>
                                                        <td>
                                                            {{ $show->name }}
                                                        </td>
                                                        <td>
                                                            {{ $show->price }}
                                                        </td>
                                                        <td>
                                                            {{ $show->size }}
                                                        </td>
                                                        <td class="py-1">
                                                            <img style="width:40px;height:40px"
                                                                src="{{ URL::to('/uploads/' . $show->images) }}"
                                                                alt="image" />
                                                        </td>
                                                        {{-- <td>
                                                            {{$show->status}}
                                                        </td> --}}
                                                        <td width="24%">
                                                            <a class="btn btn-info" href="#" data-toggle="modal"
                                                                data-target="#productModal{{ $show->product_id }}">Detail</a>
                                                            <a class="btn btn-success"
                                                                href="{{ route('edit-product', ['id' => $show->product_id]) }}">update</a>
                                                            <a class="btn btn-danger"
                                                                href="{{ route('delete-product', ['id' => $show->product_id]) }}">delete</a>
                                                        </td>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="productModal{{ $show->product_id }}"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="productModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="productModalLabel">
                                                                            Product Information
                                                                        </h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <!-- Điền thông tin sản phẩm vào đây -->
                                                                        <!-- Ví dụ: -->
                                                                        <p>Product id: {{ $show->product_id }}</p>
                                                                        <p>Product Name: {{ $show->name }}</p>
                                                                        <p>Product price: {{ $show->price }}</p>
                                                                        <p>Description: {{ $show->des }}</p>
                                                                        <p>Price: {{ $show->price }}</p>
                                                                        <p>category: {{ $show->category_id }}</p>
                                                                        <p>supplier: {{ $show->supplier_id }}</p>
                                                                        <img width="200px" height="200px"
                                                                            src="{{ asset('uploads/' . $show->images) }}"
                                                                            alt="">
                                                                        <!-- Thêm thông tin sản phẩm cần hiển thị -->
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-end">
                                            {{ $table_pro->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Đảm bảo bạn đã bao gồm thư viện jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        $(document).ready(function() {
            // Bắt sự kiện khi người dùng nhập vào ô tìm kiếm
            $("#product-search").on("keyup", function() {
                var value = $(this).val()
                    .toLowerCase(); // Lấy giá trị của ô tìm kiếm và chuyển về chữ thường

                // Lọc dữ liệu trong bảng
                $("tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });
        });
    </script>
@endsection
