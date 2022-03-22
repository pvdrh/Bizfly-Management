@extends('layouts.master')

@section('title')
    Chỉnh sửa sản phẩm
@endsection

@section('content')

    <!-- Content Header -->
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="{{route('products.index')}}">Sản phẩm</a></li>
                    <li class="breadcrumb-item active">Cập nhật</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    <!-- Content -->
    <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card">
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" method="post" enctype="multipart/form-data"
                          action="{{ route('products.update', $product->_id) }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên sản phẩm <span style="color: red">*</span></label>
                                <input type="text" name="name" value="{{$product->name}}" class="form-control" id=""
                                       placeholder="Điền tên sản phẩm ">
                                @error('name')
                                <span style="color: red; font-size: 14px">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Danh mục sản phẩm</label>
                                <select class="form-control select2" name="category_id" style="width: 100%;">
                                    <option>Chọn danh mục</option>
                                    @foreach($category as $category)
                                        <option value="{{ $category->id }}"
                                                @if($category->id == $product->category_id) selected @endif>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Giá bán<span style="color: red">*</span></label>
                                        <input value="{{$product->price}}" type="text" name="price" min="1"
                                               class="form-control input-element"
                                               placeholder="Điền giá bán">
                                        @error('price')
                                        <span style="color: red; font-size: 14px">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Số lượng<span style="color: red">*</span></label>
                                        <input value="{{$product->quantity}}" type="number" name="quantity" min="1"
                                               class="form-control"
                                               placeholder="Điền số lượng">
                                        @error('quantity')
                                        <span style="color: red; font-size: 14px">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mô tả sản phẩm</label>
                                <textarea name="description"
                                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{!! $product->description !!}</textarea>
                                @error('description')
                                <span style="color: red; font-size: 14px">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Hình ảnh sản phẩm</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input name="image" accept="image/*" type='file' id="imgInp"/>
                                    </div>
                                </div>
                                <div>
                                    @if(!empty($product->image))
                                        <img id="blah"
                                             style="width: 150px; height: 150px; object-fit: cover"
                                             src="{{ $product->image_src }}">@else
                                        <img id="blah"
                                             style="width: 150px; height: 150px; object-fit: cover"
                                             src="/backend/dist/img/default.jpg">
                                    @endif
                                </div>
                            </div>
                            @error('image')
                            <span style="color: red; font-size: 14px">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <a type="submit" href="{{ route('products.index') }}" class="btn btn-danger">Huỷ bỏ</a>
                            <button type="submit" class="btn btn-success">Cập nhật</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->

@section('script')
    <script>
        var cleave = new Cleave('.input-element', {
            numeral: true,
            numeralThousandsGroupStyle: 'thousand',
        });

        var fileInput = document.getElementById('exampleInputFile');
        var listFile = document.getElementById('list_file');

        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                blah.src = URL.createObjectURL(file)
            }
        }
    </script>
@endsection
@endsection
