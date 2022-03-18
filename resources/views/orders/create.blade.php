@extends('layouts.master')

@section('title')
    Thêm mới đơn hàng
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
                    <li class="breadcrumb-item"><a href="{{route('orders.index')}}">Đơn hàng</a></li>
                    <li class="breadcrumb-item active">Tạo mới</li>
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
                    <form role="form" action="{{route('orders.store')}}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Khách hàng<span style="color: red">*</span></label>
                                <select class="form-control"
                                        name="customer_id">
                                    @foreach($customers as $customer)
                                        <option value="{{$customer->_id}}">{{$customer->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Sản phẩm<span style="color: red">*</span></label>
                                <select class="form-control multi_select_product" multiple
                                        name="product_id[]">
                                    @foreach($products as $product)
                                        <option value="{{$product->_id}}">{{$product->name}}</option>
                                    @endforeach
                                </select>
                                @error('description')
                                <span style="color: red; font-size: 14px">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ghi chú</label>
                                <input value="{{old('note')}}" name="note" type="text" class="form-control">
                                @error('note')
                                <span style="color: red; font-size: 14px">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <a href="{{ route('orders.index') }}" class="btn btn-danger">Huỷ bỏ</a>
                            <button type="submit" class="btn btn-success">Tạo mới</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
    <style>
        .select2-selection__choice__display {
            padding-left: 15px !important;
            background-color: #d3d1d1;
        }

        .selection__choice__display:hover {
            background-color: #d3d1d1;
        }

        .select2-selection__choice__remove {
            background-color: #d3d1d1;
            color: black !important;
            margin-left: 0px !important;
        }

        .select2-selection__choice__remove span {
            color: black;
        }

        .select2-selection__choice__remove:hover {
            background-color: #a1a1a1 !important;
        }

        select2-selection__choice__remove span:hover {
            background-color: #c4c1c1 !important;
        }

        .select2-selection__choice {
            background-color: #d3d1d1 !important;
            font-size: 16px;
            color: black !important;
        }

        .select2-search__field {
            border: none !important;
        }
    </style>
@section('script')
    <script>
        $(document).ready(function () {
            $('.multi_select_product').select2();
        });
    </script>
@endsection
@endsection
