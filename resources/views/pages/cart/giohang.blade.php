@extends('index')
@section('main')
    <!-- Giỏ hàng Section Begin -->
    <section class="cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Ảnh sản phẩm</th>
                                    <th>id</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng cộng</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cart as $item)
                                    <tr class="cart-product" data-product-id="{{ $item['id'] }}">
                                        <td class="cart__product__item">
                                            <img width="200px" height="200px" src="{{ asset('uploads/' . $item['images']) }}"
                                                alt="Product">
                                        </td>
                                        <td class="cart__product__id">
                                            {{ $item['id'] }}
                                        </td>
                                        <td class="cart__product__name">
                                            {{ $item['name'] }}
                                        </td>
                                        <td class="cart__product__price">
                                            {{ number_format($item['price']) }} vnđ
                                        </td>
                                        <td class="cart__product__quantity">
                                            {{ $item['quantity'] }}
                                        </td>
                                        <td class="cart__product__subtotal">
                                            {{ number_format($item['quantity'] * $item['price']) }} vnđ
                                        </td>
                                        <td class="cart__product__remove">
                                            <button class="remove-from-cart"
                                                data-product-id="{{ $item['id'] }}">Xóa</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="cart__total__procced">
                        <form method="POST" action="{{ route('checkout') }}">
                            @csrf
                            <label for="name">Name:</label>
                            <input type="text" name="name" required>

                            <label for="phone">Phone:</label>
                            <input type="tel" name="phone" required>

                            <label for="address">Address:</label>
                            <input type="text" name="address" required>

                            <label for="email">Email:</label>
                            <input type="email" name="email" required>

                            <input type="hidden" name="order_id" value="{{ uniqid() }}">

                            <button type="submit" class="primary-btn">Tiến hành thanh toán</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Giỏ hàng Section End -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        // Xóa sản phẩm khỏi giỏ hàng
        $('.remove-from-cart').on('click', function() {
            var productId = $(this).data('product-id');

            $.ajax({
                type: 'POST',
                url: '{{ route('removeFromCart') }}',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'product_id': productId
                },
                success: function(data) {
                    // Ẩn hàng sản phẩm đã xóa
                    $('.cart-product[data-product-id="' + productId + '"]').hide();

                    // Cập nhật số lượng sản phẩm trong giỏ hàng (nếu cần)
                    updateCartCount();
                },
                error: function(error) {
                    console.log(error.responseJSON.error);
                    // Xử lý lỗi, hiển thị thông báo lỗi, v.v.
                }
            });
        });

        function updateCartCount() {
            // Cập nhật số lượng sản phẩm trong giỏ hàng ở header (sử dụng ajax như trong ví dụ trước)
        }
    </script>
@endsection
