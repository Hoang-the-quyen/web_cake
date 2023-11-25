@extends('dashboard.dashboard')
@section('contents')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 style="text-align: center;font-size:30px" class="card-title">Add Product</h4>
                            <form class="form-sample" method="post" action="{{ route('store-product') }}"
                                enctype="multipart/form-data" novalidate="novalidate">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Product name</label>
                                            <div class="col-sm-9">
                                                <input type="file" id="file" name="images"
                                                    style="border:solid 1px black" class="form-control"
                                                    onchange="displayImage(this)">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Product price</label>
                                            <div class="col-sm-9">
                                                <input name="price" style="border:solid 1px black" type="text"
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
                                                <select name="status" style="border:solid 1px black" class="form-control">
                                                    <option value="1">1</option>
                                                    <option value="0">0</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Size</label>
                                            <div class="col-sm-9">
                                                <select name="size" style="border:solid 1px black" class="form-control">
                                                    <option>L</option>
                                                    <option>S</option>
                                                    <option>M</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Show image</label>
                                            <div class="col-sm-9">
                                                <img id="previewImage"
                                                    src="https://image.nhandan.vn/Uploaded/2023/unqxwpejw/2023_09_24/anh-dep-giao-thong-1626.jpg"
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
                                            preview.src = "https://image.nhandan.vn/Uploaded/2023/unqxwpejw/2023_09_24/anh-dep-giao-thong-1626.jpg";
                                        }
                                    }
                                </script>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Category</label>
                                            <div class="col-sm-9">
                                                <select name="category_id" style="border:solid 1px black"
                                                    class="form-control">
                                                    @foreach ($cate as $cate)
                                                        <option value="{{ $cate->category_id }}">{{ $cate->category_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Supplier</label>
                                            <div class="col-sm-9">
                                                <select name="supplier_id" style="border:solid 1px black"
                                                    class="form-control">
                                                    @foreach ($sup as $sup)
                                                        <option value="{{ $sup->supplier_id }}">{{ $sup->supplier_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label for="exampleTextarea1">Textarea</label>
                                        <textarea name="des" style="border:solid 1px black" class="form-control" id="exampleTextarea1" rows="6"></textarea>
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-info" value="Add product">
                                <a class="btn btn-secondary">Thoát</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
