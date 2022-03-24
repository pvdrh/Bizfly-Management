@extends('layouts.master')

@section('title')
    Thêm mới đơn hàng
@endsection

@section('content')
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Dashboard
                </h4>
            </div>
        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{route('orders.index')}}"><i class="icon-home2 position-left"></i> Quản lý đơn hàng</a>
                </li>
                <li class="active">Thêm mới</li>
            </ul>
        </div>
    </div>
    <div class="col-lg-12">
        <div style="margin-left: 15px;margin-right: 15px;margin-bottom: 50px" class="panel panel-flat">
            {{--            <div class="panel-heading">--}}
            {{--                <h5 class="panel-title">Thông tin nhân viên</h5>--}}
            {{--            </div>--}}
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="post" action="{{ route('orders.store') }}">
                    @csrf
                    <fieldset class="content-group">
                        <div class="form-group">
                            <label class="control-label col-lg-2">Khách hàng<span style="color: red">*</span></label>
                            <div class="col-lg-10">
                                <select class="form-control"
                                        name="customer_id">
                                    @foreach($customers as $customer)
                                        <option value="{{$customer->_id}}">{{$customer->name}}</option>
                                    @endforeach
                                </select>
                                @error('customer_id')
                                <span style="color: red; font-size: 14px">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-2">Chọn sản phẩm</label>
                            <div class="col-lg-10">
                                <select name="product_id[]" multiple="multiple"
                                        data-placeholder="Chọn sản phẩm" class="select-icons">
                                    @foreach($products as $product)
                                        <option value="{{$product->_id}}">{{$product->name}}</option>
                                    @endforeach
                                </select>
                                @error('employee_code')
                                <span style="color: red; font-size: 14px">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Ghi chú:</label>
                            <div class="col-lg-10">
                                <input value="{{old('note')}}" type="text" name="note" class="form-control" placeholder="Nhập tên ghi chú">
                                @error('name')
                                <span style="color: red; font-size: 14px">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </fieldset>
                    <div style="float: right">
                        <a style="font-size: 16px" href="{{ route('orders.index') }}" class="btn btn-danger">Huỷ
                            bỏ</a>
                        <button style="font-size: 16px" type="submit" class="btn btn-success">Tạo mới</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@section('script')
    <script>
        $(document).ready(function () {
            $('.multi_select_product').select2();
        });
    </script>
@endsection
@endsection
