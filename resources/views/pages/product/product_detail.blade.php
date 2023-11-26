@extends('index')
@section('main')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__text">
                        <h2>Product detail</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__links">
                        <a href="./index.html">Home</a>
                        <a href="./shop.html">Shop</a>
                        <span>Sweet autumn leaves</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product__details__img">
                        @foreach ($product as $show)
                            <div class="product__details__big__img">
                                <img class="big_img" src="{{ asset('uploads/' . $show->images) }}" alt="">
                            </div>
                        @endforeach
                        {{-- ảnh phụ --}}
                        <div class="product__details__thumb">
                            <div class="pt__item active">
                                <img data-imgbigurl="{{ asset('frontend/img/shop/details/product-big-2.jpg') }}"
                                    src="{{ asset('frontend/img/shop/details/product-big-2.jpg') }}" alt="">
                            </div>
                            <div class="pt__item">
                                <img data-imgbigurl="{{ asset('frontend/img/shop/details/product-big-1.jpg') }}"
                                    src="{{ asset('frontend/img/shop/details/product-big-1.jpg') }}" alt="">
                            </div>
                            <div class="pt__item">
                                <img data-imgbigurl="{{ asset('frontend/img/shop/details/product-big-4.jpg') }}"
                                    src="{{ asset('frontend/img/shop/details/product-big-4.jpg') }}" alt="">
                            </div>
                            <div class="pt__item">
                                <img data-imgbigurl="{{ asset('frontend/img/shop/details/product-big-3.jpg') }}"
                                    src="{{ asset('frontend/img/shop/details/product-big-3.jpg') }}" alt="">
                            </div>
                            <div class="pt__item">
                                <img data-imgbigurl="{{ asset('frontend/img/shop/details/product-big-5.jpg') }}"
                                    src="{{ asset('frontend/img/shop/details/product-big-5.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    @foreach ($product as $show)
                        <div class="product__details__text">
                            <div class="product__label">Cupcake</div>
                            <h4>{{ $show->name }}</h4>
                            <h5>{{ number_format($show->price) }} vnđ</h5>
                            <p>{{ $show->des }}</p>
                            <ul>
                                <li>SKU: <span>{{ $show->product_id }}</span></li>
                                <li>
                                    Category:
                                    @foreach ($cate as $category)
                                        @if ($show->category_id === $category->category_id)
                                            <span>{{ $category->category_name }}</span>
                                        @endif
                                    @endforeach
                                </li>
                                <li>
                                    Supplier:
                                    @foreach ($sup as $supplier)
                                        @if ($show->supplier_id === $supplier->supplier_id)
                                            <span>{{ $supplier->supplier_name }}</span>
                                        @endif
                                    @endforeach
                                </li>
                            </ul>
                            <!-- Cập nhật mã nguồn bạn đã có -->
                            <div class="product__details__option">
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="text" value="1">
                                    </div>
                                </div>
                                <button class="add-to-cart btn btn-primary primary-btn"
                                    data-product-id="{{ $show->product_id }}">Thêm vào giỏ hàng</button>
                                <a href="#" class="heart__btn"><span class="icon_heart_alt"></span></a>
                                <!-- Button to remove product from cart -->

                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
            <div class="product__details__tab">
                <div class="col-lg-12">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Additional information</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Previews(1)</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="row d-flex justify-content-center">
                                <div class="col-lg-8">
                                    <p>This delectable Strawberry Pie is an extraordinary treat filled with sweet and
                                        tasty chunks of delicious strawberries. Made with the freshest ingredients, one
                                        bite will send you to summertime. Each gift arrives in an elegant gift box and
                                        arrives with a greeting card of your choice that you can personalize online!</p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-2" role="tabpanel">
                            <div class="row d-flex justify-content-center">
                                <div class="col-lg-8">
                                    <p>This delectable Strawberry Pie is an extraordinary treat filled with sweet and
                                        tasty chunks of delicious strawberries. Made with the freshest ingredients, one
                                        bite will send you to summertime. Each gift arrives in an elegant gift box and
                                        arrives with a greeting card of your choice that you can personalize online!2
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-3" role="tabpanel">
                            <div class="row d-flex justify-content-center">
                                <div class="col-lg-8">
                                    <p>This delectable Strawberry Pie is an extraordinary treat filled with sweet and
                                        tasty chunks of delicious strawberries. Made with the freshest ingredients, one
                                        bite will send you to summertime. Each gift arrives in an elegant gift box and
                                        arrives with a greeting card of your choice that you can personalize online!3
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Details Section End -->

    <!-- Related Products Section Begin -->
    <section class="related-products spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-title">
                        <h2>Related Products</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="related__products__slider owl-carousel">
                    <div class="col-lg-3">
                        <div class="product__item">
                            <div class="product__item__pic set-bg"
                                data-setbg="{{ asset('frontend/img/shop/product-1.jpg') }}">
                                <div class="product__label">
                                    <span>Cupcake</span>
                                </div>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="#">Dozen Cupcakes</a></h6>
                                <div class="product__item__price">$32.00</div>
                                <div class="cart_add">
                                    <a href="#">Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="product__item">
                            <div class="product__item__pic set-bg"
                                data-setbg="{{ asset('frontend/img/shop/product-2.jpg') }}">
                                <div class="product__label">
                                    <span>Cupcake</span>
                                </div>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="#">Cookies and Cream</a></h6>
                                <div class="product__item__price">$30.00</div>
                                <div class="cart_add">
                                    <a href="#">Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="product__item">
                            <div class="product__item__pic set-bg"
                                data-setbg="{{ asset('frontend/img/shop/product-3.jpg') }}">
                                <div class="product__label">
                                    <span>Cupcake</span>
                                </div>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="#">Gluten Free Mini Dozen</a></h6>
                                <div class="product__item__price">$31.00</div>
                                <div class="cart_add">
                                    <a href="#">Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="product__item">
                            <div class="product__item__pic set-bg"
                                data-setbg="{{ asset('frontend/img/shop/product-4.jpg') }}">
                                <div class="product__label">
                                    <span>Cupcake</span>
                                </div>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="#">Cookie Dough</a></h6>
                                <div class="product__item__price">$25.00</div>
                                <div class="cart_add">
                                    <a href="#">Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="product__item">
                            <div class="product__item__pic set-bg"
                                data-setbg="{{ asset('frontend/img/shop/product-5.jpg') }}">
                                <div class="product__label">
                                    <span>Cupcake</span>
                                </div>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="#">Vanilla Salted Caramel</a></h6>
                                <div class="product__item__price">$05.00</div>
                                <div class="cart_add">
                                    <a href="#">Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="product__item">
                            <div class="product__item__pic set-bg"
                                data-setbg="{{ asset('frontend/img/shop/product-6.jpg') }}">
                                <div class="product__label">
                                    <span>Cupcake</span>
                                </div>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="#">German Chocolate</a></h6>
                                <div class="product__item__price">$14.00</div>
                                <div class="cart_add">
                                    <a href="#">Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    {{-- <script>
        // thêm sản phẩm vào giỏ hàng
        $('.add-to-cart').on('click', function() {
            var productId = $(this).data('product-id');

            $.ajax({
                type: 'POST',
                url: '{{ route('addToCart') }}',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'product_id': productId
                },
                success: function(data) {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Thêm sản phẩm vào giỏ hàng thành công!",
                        showConfirmButton: false,
                        timer: 1500
                    });
                    console.log(data);
                    // Handle success, update cart UI, etc.
                },
                error: function(error) {
                    console.log(error.responseJSON.error);
                    // Handle error, display error message, etc.
                }
            });
        });
    </script> --}}
    <!-- Related Products Section End -->
@endsection
