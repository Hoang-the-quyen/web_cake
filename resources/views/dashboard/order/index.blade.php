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

                                    <h4 class="card-title">Quản lý đơn hàng</h4>
                                    <p style="display: flex" class="card-description">
                                        <input id="product-search" class="form-control"
                                            style="border: solid 1px;width:40%; margin-right:20px" type="text"
                                            placeholder="Tìm kiếm">
                                        <a class="btn btn-primary" href="#">Xuất excel</a>
                                    </p>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        #
                                                    </th>
                                                    <th>
                                                        Mã đơn
                                                    </th>
                                                    <th>
                                                        Tổng giá trị đơn hàng
                                                    </th>
                                                    <th>
                                                        Ngày đặt hàng
                                                    </th>
                                                    <th>
                                                        Trạng thái
                                                    </th>
                                                    <th style="text-align: center">
                                                        Sự kiện
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($order as $index => $show)
                                                    <tr>
                                                        <td>
                                                            {{ $loop->iteration }}
                                                        </td>
                                                        <td>
                                                            {{ $show->order_id }}
                                                        </td>
                                                        <td>
                                                            {{ number_format($totalAmount) }} vnđ
                                                        </td>
                                                        <td>
                                                            {{ $show->date }}
                                                        </td>
                                                        <td width="14%">
                                                                @if ($show->status == 1)
                                                                    Đơn hàng mới
                                                                @elseif($show->status == 2)
                                                                   Đã giao cho đơn vị vận chuyển
                                                                @elseif($show->status == 3)
                                                                    Đơn hàng hoàn thành
                                                                @endif
                                                        </td>
                                                        <td width="24%">
                                                            <a class="btn btn-success" href="{{route('order-detail',['id' => $show->order_id])}}">Chi tiết đơn hàng</a>
                                                            <a class="btn btn-danger" href="">Hủy đơn</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-end">
                                            {{-- {{ $table_order->links() }} --}}
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
