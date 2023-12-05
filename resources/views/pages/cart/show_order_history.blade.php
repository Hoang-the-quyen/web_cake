@extends('index')
@section('main')
    <section class="shop spad">
        <div class="container">
            <div class="row">
                @foreach ($search_orders as $index => $pro)
                <div class="card">
                    <div style="display: flex" class="sp col-lg-3 col-md-6 col-sm-6">
                        <img width="100px" src="{{ asset('uploads/' . $pro->images) }}" alt="">
                        <h6>{{ $pro->name }}</h6>
                        <div class="product__item__price">{{ number_format($pro->price) }} vnđ</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        </div>
    </section>
@endsection
