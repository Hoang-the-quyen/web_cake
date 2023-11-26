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

                                    <h4 class="card-title">Category</h4>
                                    <p style="display: flex" class="card-description">
                                        <input id="product-search" class="form-control"
                                            style="border: solid 1px;width:40%; margin-right:20px" type="text"
                                            placeholder="Tìm kiếm">
                                        <a class="btn btn-primary" href="{{ route('create-cate') }}">Add Category</a>
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
                                                        icon
                                                    </th>
                                                    <th>
                                                        Action
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($table_cate as $show)
                                                    <tr>
                                                        <td>
                                                            {{ $loop->iteration }}
                                                        </td>
                                                        <td>
                                                            {{$show->category_name}}
                                                        </td>
                                                        <td class="py-1">
                                                            <img style="width:40px;height:40px"
                                                                src="{{ URL::to('/uploads/' . $show->icon) }}"
                                                                alt="image" />
                                                        </td>
                                                        <td width="24%">
                                                            <a class="btn btn-success"
                                                                href="{{route('edit-cate',['id' => $show->category_id])}}">update</a>
                                                            <a class="btn btn-danger"
                                                                href="{{route('delete-cate',['id' => $show->category_id])}}">delete</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-end">
                                            {{ $table_cate->links() }}
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
