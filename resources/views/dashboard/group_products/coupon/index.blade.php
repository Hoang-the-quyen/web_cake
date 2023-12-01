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

                                <h4 class="card-title">Coupon</h4>
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
                                                    Des
                                                </th>
                                                <th>
                                                    code
                                                </th>
                                                <th>
                                                    Quantity
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
                                                    <td></td>
                                                    <td width="24%">
                                                        <a class="btn btn-info" href="#" data-toggle="modal"
                                                            data-target="#productModal{{ $show->product_id }}">Detail</a>
                                                        <a class="btn btn-success"
                                                            href="{{ route('edit-product', ['id' => $show->product_id]) }}">update</a>
                                                        <a class="btn btn-danger"
                                                            href="{{ route('delete-product', ['id' => $show->product_id]) }}">delete</a>
                                                    </td>
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
@endsection