@extends('layouts.master')

@section('title')
    Chỉnh sửa sản phẩm
@endsection

@section('content')
    <div class="page-header">
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{route('products.index')}}"><i class="icon-home2 position-left"></i> Quản lý sản phẩm</a>
                </li>
                <li class="active">Cập nhật</li>
            </ul>
        </div>
    </div>
    <div class="col-lg-12">
        <div style="margin-left: 15px;margin-right: 15px;margin-bottom: 50px" class="panel panel-flat">
            {{--            <div class="panel-heading">--}}
            {{--                <h5 class="panel-title">Thông tin nhân viên</h5>--}}
            {{--            </div>--}}
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="post"
                      action="{{ route('products.update', $product->_id) }}">
                    @csrf
                    <fieldset class="content-group">
                        <div class="form-group">
                            <label class="control-label col-lg-2">Tên sản phẩm:<span style="color: red">*</span></label>
                            <div class="col-lg-10">
                                <input value="{{$product->name}}" type="text" name="name" class="form-control"
                                       placeholder="Nhập tên sản phẩm">
                                @error('name')
                                <span style="color: red; font-size: 14px">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Danh mục:</label>
                            <div class="col-lg-10">
                                <select class="form-control select2" name="category_id" style="width: 100%;">
                                    <option>---Chọn danh mục---</option>
                                    @foreach($category as $category)
                                        <option value="{{ $category->id }}"
                                                @if($category->id == $product->category_id) selected @endif>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <span style="color: red; font-size: 14px">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Giá bán:<span style="color: red">*</span></label>
                            <div class="col-lg-3">
                                <input type="text" value="{{$product->price}}" name="price" min="1"
                                       class="form-control input-element"
                                       placeholder="Điền giá bán">
                                @error('price')
                                <span style="color: red; font-size: 14px">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-2">
                            </div>
                            <label class="col-lg-2 control-label">Số lượng:<span style="color: red">*</span></label>
                            <div class="col-lg-3">
                                <input value="{{$product->quantity}}" type="number" name="quantity" min="1"
                                       class="form-control"
                                       placeholder="Điền số lượng   ">
                                @error('quantity')
                                <span style="color: red; font-size: 14px">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </fieldset>
                    <div style="float: right">
                        <a style="text-decoration: none; color: white; font-size: 16px; background: #E53935; padding: 7px 12px 7px 12px;" href="{{ route('products.index') }}">Huỷ bỏ</a>
                        <button style="text-decoration: none; color: white; font-size: 16px; background: #43A047; padding: 6px 10px 6px 10px;" type="submit" >Cập nhật</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
