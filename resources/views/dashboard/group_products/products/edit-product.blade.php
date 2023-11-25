@extends('dashboard.dashboard')
@section('contents')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 style="text-align: center;font-size:30px" class="card-title">Update Product</h4>
                            @foreach ($product as $key => $edt_pro)
                                <form class="form-sample" method="post" action="{{ route('update-product',['id' => $edt_pro->product_id]) }}"
                                    enctype="multipart/form-data" novalidate="novalidate">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Product name</label>
                                                <div class="col-sm-9">
                                                    <input name="name" value="{{ $edt_pro->name }}"
                                                        style="border:solid 1px black" type="text"
                                                        class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Product price</label>
                                                <div class="col-sm-9">
                                                    <input value="{{ $edt_pro->price }}" name="price"
                                                        style="border:solid 1px black" type="text"
                                                        class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Images</label>
                                                <div class="col-sm-9">
                                                    <input type="file" id="file" name="images"
                                                        style="border:solid 1px black" class="form-control"
                                                        onchange="displayImage(this)">
                                                </div>

                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Status</label>
                                                <div class="col-sm-9">
                                                    <select name="status" style="border:solid 1px black"
                                                        class="form-control">
                                                        @if ($edt_pro->status == 1)
                                                            <option value="1">ON</option>
                                                            <option value="0">OFF</option>
                                                        @else
                                                            <option value="1">ON</option>
                                                            <option value="0" selected>OFF</option>
                                                        @endif
                                                    </select>

                                                </div>

                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Size</label>
                                                <div class="col-sm-9">
                                                    <select name="size" style="border:solid 1px black"
                                                        class="form-control">
                                                        @if ($edt_pro->size == 'L')
                                                            <option value="L" selected>L</option>
                                                            <option value="S">S</option>
                                                            <option value="M">M</option>
                                                        @elseif ($edt_pro->size == 'S')
                                                            <option value="L">L</option>
                                                            <option value="S" selected>S</option>
                                                            <option value="M">M</option>
                                                        @elseif ($edt_pro->size == 'M')
                                                            <option value="L">L</option>
                                                            <option value="S">S</option>
                                                            <option value="M" selected>M</option>
                                                        @else
                                                            <option value="L">L</option>
                                                            <option value="S">S</option>
                                                            <option value="M">M</option>
                                                        @endif
                                                    </select>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Show image</label>
                                                <div class="col-sm-9">
                                                    <img id="previewImage" src="{{ asset('/uploads/' . $edt_pro->images) }}"
                                                        alt="Preview" style="width:200px; height:200px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                        function displayImage(input) {
                                            const preview = document.getElementById('previewImage');
                                            const file = input.files[0];

                                            if (file) {
                                                const reader = new FileReader();

                                                reader.onload = function(e) {
                                                    preview.src = e.target.result;
                                                };

                                                reader.readAsDataURL(file);
                                            } else {
                                                // Nếu không có ảnh mới, hiển thị ảnh cũ
                                                preview.src = "{{ asset('/uploads/' . $edt_pro->images) }}";
                                            }
                                        }
                                    </script>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Danh mục</label>
                                                <div class="col-sm-9">
                                                    <select name="category_id" style="border:solid 1px black"
                                                        class="form-control">
                                                        @foreach ($cate as $category)
                                                            <option value="{{ $category->category_id }}"
                                                                {{ $category->category_id == $edt_pro->category_id ? 'selected' : '' }}>
                                                                {{ $category->category_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Nhà cung cấp</label>
                                                <div class="col-sm-9">
                                                    <select name="supplier_id" style="border:solid 1px black"
                                                        class="form-control">
                                                        @foreach ($sup as $supplier)
                                                            <option value="{{ $supplier->supplier_id }}"
                                                                {{ $supplier->supplier_id == $edt_pro->supplier_id ? 'selected' : '' }}>
                                                                {{ $supplier->supplier_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label for="exampleTextarea1">Product description</label>
                                            <textarea name="des" style="border:solid 1px black" class="form-control" id="exampleTextarea1" rows="6">{{ $edt_pro->des }}</textarea>
                                        </div>
                                    </div>
                                    <input type="submit" class="btn btn-info" value="Update product">
                                    <a class="btn btn-secondary">Thoát</a>
                                </form>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
