<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Cake Template">
    <meta name="keywords" content="Cake, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cake | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/flaticon.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/barfiller.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}" type="text/css">

    @php
        $currentPage = Request::path(); 
    @endphp
</head>


<body>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__cart">
            <div class="offcanvas__cart__links">
                <a href="#" class="search-switch"><img src="{{ asset('frontend/img/icon/search.png') }}"
                        alt=""></a>
                <a href="#"><img src="{{ asset('frontend/img/icon/heart.png') }}" alt=""></a>
            </div>
            <div class="offcanvas__cart__item">
                <a href=""><img src="{{ asset('frontend/img/icon/cart.png') }}" alt="">
                    <span>0</span></a>
                <div class="cart__price">Cart: <span>$0.00</span></div>
            </div>
            
        </div>
        <div class="offcanvas__logo">
            <a href="./index.html"><img src="{{ asset('frontend/img/logo.png') }}" alt=""></a>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__option">
            <ul>
                <li>USD <span class="arrow_carrot-down"></span>
                    <ul>
                        <li>EUR</li>
                        <li>USD</li>
                    </ul>
                </li>
                <li>ENG <span class="arrow_carrot-down"></span>
                    <ul>
                        <li>Spanish</li>
                        <li>ENG</li>
                    </ul>
                </li>
                <li><a href="#">Sign in</a> <span class="arrow_carrot-down"></span></li>
            </ul>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="header__top__inner">
                            <div class="header__top__left">
                                <ul>
                                    <li>USD <span class="arrow_carrot-down"></span>
                                        <ul>
                                            <li>EUR</li>
                                            <li>USD</li>
                                        </ul>
                                    </li>
                                    <li>ENG <span class="arrow_carrot-down"></span>
                                        <ul>
                                            <li>Spanish</li>
                                            <li>ENG</li>
                                        </ul>
                                    </li>
                                    @php
                                        $customer_id = session('customer_id');
                                    @endphp

                                    <li>
                                        @if ($customer_id == null)
                                            <a href="{{ route('view_login') }}">Sign in</a>
                                        @else
                                            <a href="{{ route('logout') }}">Logout</a>
                                        @endif
                                    </li>


                                </ul>
                            </div>
                            <div class="header__logo">
                                <a href="./index.html"><img src="{{ asset('frontend/img/logo.png') }}"
                                        alt=""></a>
                            </div>
                            <div class="header__top__right">
                                <div class="header__top__right__links">
                                    <a href="#" class="search-switch"><img
                                            src="{{ asset('frontend/img/icon/search.png') }}" alt=""></a>
                                    <a href="#"><img src="{{ asset('frontend/img/icon/heart.png') }}"
                                            alt=""></a>
                                </div>
                                <div class="header__top__right__cart" id="cartIcon">
                                    <a href="{{ route('show_cart') }}">
                                        <img src="{{ asset('frontend/img/icon/cart.png') }}" alt="">
                                        <span id="cartItemCount">0</span>
                                    </a>
                                    <div class="cart__price">Cart</div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="canvas__open"><i class="fa fa-bars"></i></div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li class="{{ $currentPage === '/' ? 'active' : '' }}"><a
                                    href="{{ url('/') }}">Home</a></li>
                            <li class="{{ Str::contains($currentPage, 'about') ? 'active' : '' }}"><a
                                    href="{{ url('./about.html') }}">About</a></li>
                            <li class="{{ Str::contains($currentPage, 'shop') ? 'active' : '' }}"><a
                                    href="{{ route('shop') }}">Shop</a></li>
                            <li class="{{ $currentPage === 'pages' ? 'active' : '' }}">
                                <a href="#">Pages</a>
                                <ul class="dropdown">
                                    <li class="{{ $currentPage === 'shop-details' ? 'active' : '' }}"><a
                                            href="./shop-details.html">Shop Details</a></li>
                                    <li class="{{ $currentPage === 'shoping-cart' ? 'active' : '' }}"><a
                                            href="./shoping-cart.html">Shoping Cart</a></li>
                                    <li class="{{ $currentPage === 'checkout' ? 'active' : '' }}"><a
                                            href="./checkout.html">Check Out</a></li>
                                    <li class="{{ $currentPage === 'wisslist' ? 'active' : '' }}"><a
                                            href="./wisslist.html">Wisslist</a></li>
                                    <li class="{{ $currentPage === 'Class' ? 'active' : '' }}"><a
                                            href="./Class.html">Class</a></li>
                                    <li class="{{ $currentPage === 'blog-details' ? 'active' : '' }}"><a
                                            href="./blog-details.html">Blog Details</a></li>
                                </ul>
                            </li>
                            <li class="{{ $currentPage === 'blog' ? 'active' : '' }}"><a href="./blog.html">Blog</a>
                            </li>
                            <li class="{{ Str::contains($currentPage, 'order') ? 'active' : '' }}"><a
                                    href="{{route('order-history')}}">Order</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    @yield('main')

    <!-- Footer Section Begin -->
    <footer class="footer set-bg" data-setbg="{{ asset('frontend/img/footer-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="footer__widget">
                        <h6>WORKING HOURS</h6>
                        <ul>
                            <li>Monday - Friday: 08:00 am – 08:30 pm</li>
                            <li>Saturday: 10:00 am – 16:30 pm</li>
                            <li>Sunday: 10:00 am – 16:30 pm</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__logo">
                            <a href="#"><img src="{{ asset('frontend/img/footer-logo.png') }}"
                                    alt=""></a>
                        </div>
                        <p>Lorem ipsum dolor amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore dolore magna aliqua.</p>
                        <div class="footer__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-youtube-play"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="footer__newslatter">
                        <h6>Subscribe</h6>
                        <p>Get latest updates and offers.</p>
                        <form action="#">
                            <input type="text" placeholder="Email">
                            <button type="submit"><i class="fa fa-send-o"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <p class="copyright__text text-white">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved | This template is made with <i
                                class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com"
                                target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                    <div class="col-lg-5">
                        <div class="copyright__widget">
                            <ul>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                                <li><a href="#">Site Map</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->

    <!-- Js Plugins -->

    <script src="{{ asset('frontend/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.barfiller.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>
    <script src="{{asset('frontend/js/sweetalert.min.js') }}"></script>
    
    <!-- Thêm sản phẩm vào giỏ hàng -->
<script>
    function updateCartCount() {
        $.ajax({
            type: 'GET',
            url: '{{ route('getCartCount') }}',
            success: function(data) {
                // Cập nhật số lượng sản phẩm trong giỏ hàng ở header
                $('#cartItemCount').text(data.count);
            },
            error: function(error) {
                console.log(error.responseJSON.error);
                // Xử lý lỗi, hiển thị thông báo lỗi, v.v.
            }
        });
    }

    // Gọi hàm cập nhật số lượng sản phẩm khi trang được load
    $(document).ready(function() {
        updateCartCount();
    });

    // Thêm sản phẩm vào giỏ hàng
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
                    timer: 500
                });
                console.log(data);
                // Handle success, update cart UI, etc.
                updateCartCount(); // Cập nhật số lượng sản phẩm sau khi thêm vào giỏ hàng
            },
            error: function(error) {
                console.log(error.responseJSON.error);
                // Handle error, display error message, v.v.
            }
        });
    });
</script>

</body>

</html>
