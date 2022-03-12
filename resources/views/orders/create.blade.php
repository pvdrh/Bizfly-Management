@extends('layouts.master')

@section('title')
    Thêm mới danh mục
@endsection

@section('content')
    <!-- Content Header -->
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Thêm mới đơn hàng</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Đơn hàng</a></li>
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
                                <label>Khách hàng</label>
                                <select class="form-control"
                                        name="customer_id">
                                    @foreach($customers as $customer)
                                        <option value="{{$customer->_id}}">{{$customer->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Sản phẩm</label>
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
                                <input name="note" type="text" class="form-control">
                                @error('name')
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
            padding-left: 10px !important;
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
