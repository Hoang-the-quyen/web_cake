@extends('index')
@section('main')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__text">
                        <h2>Shop</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__links">
                        <a href="./index.html">Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="shop__option">
                <div class="row">
                    <div class="col-lg-7 col-md-7">
                        <div class="shop__option__search">
                            <form action="#">
                                <select>
                                    @foreach ($cate as $cate)
                                        <option value="{{ $cate->category_id }}">{{ $cate->category_name }}</option>
                                    @endforeach
                                </select>
                                <input id="searchInput" type="text" placeholder="Search">
                                <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

                                <script>
                                    $(document).ready(function() {
                                        // Lắng nghe sự kiện khi người dùng nhập liệu
                                        $('#searchInput').on('input', function() {
                                            // Lấy giá trị từ input
                                            var searchTerm = $(this).val().toLowerCase();

                                            // Lặp qua từng sản phẩm để ẩn/hiện tùy thuộc vào kết quả tìm kiếm
                                            $('.product__item').each(function() {
                                                var productName = $(this).find('h6 a').text().toLowerCase();

                                                if (productName.includes(searchTerm)) {
                                                    $(this).show();
                                                } else {
                                                    $(this).hide();
                                                }
                                            });
                                        });
                                    });
                                </script>

                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5">
                        <div class="shop__option__right">
                            <select>
                                <option value="">Default sorting</option>
                                <option value="">A to Z</option>
                                <option value="">1 - 8</option>
                                <option value="">Name</option>
                            </select>
                            <a href="#"><i class="fa fa-list"></i></a>
                            <a href="#"><i class="fa fa-reorder"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

                @foreach ($shop as $index => $pro)
                    <a href="{{route('product_detail',['id' => $pro->product_id])}}">
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="{{ asset('uploads/' . $pro->images) }}">
                                    <div class="product__label">
                                        <span>Cupcake</span>
                                    </div>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="#">{{ $pro->name }}</a></h6>
                                    <div class="product__item__price">{{ number_format($pro->price) }} vnđ</div>
                                    <div class="cart_add">
                                        <a href="{{ route('product_detail', ['id' => $pro->product_id]) }}">Add to cart</a>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach

            </div>
            <div class="shop__last__option">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-end">
                        <div class="shop__last__text">
                            {{ $shop->links() }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->
    <!-- Đảm bảo bạn đã bao gồm thư viện jQuery -->
@endsection
