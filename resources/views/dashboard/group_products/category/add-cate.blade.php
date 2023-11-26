@extends('dashboard.dashboard')
@section('contents')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-6 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 style="text-align: center;font-size:30px" class="card-title">Add Category</h4>
                            <form class="form-sample" method="post" action="{{ route('store-cate') }}"
                                enctype="multipart/form-data" novalidate="novalidate">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Category name</label>
                                            <div class="col-sm-9">
                                                <input name="name" style="border:solid 1px black" type="text"
                                                    class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Images</label>
                                            <div class="col-sm-9">
                                                <input type="file" id="file" name="icon"
                                                    style="border:solid 1px black" class="form-control"
                                                    onchange="displayImage(this)">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-6 col-form-label">Show image</label>
                                                <div class="col-sm-6">
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
                                    
                                    <div class="col-md-6">
                                        <input type="submit" class="btn btn-info" value="Add Category">
                                        <a class="btn btn-secondary">Thoát</a>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
