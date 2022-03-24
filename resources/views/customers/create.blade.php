@extends('layouts.master')

@section('title')
    Thêm mới khách hàng
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
                <li><a href="{{route('customers.index')}}"><i class="icon-home2 position-left"></i> Quản lý khách
                        hàng</a>
                </li>
                <li class="active">Thêm mới</li>
            </ul>
        </div>
    </div>
    <!-- Main row -->
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <form role="form" method="post" action="{{ route('customers.store') }}" class="form-horizontal">
                @csrf
                <div style="margin-left: 15px;margin-right: 15px;margin-bottom: 50px" class="panel panel-flat">
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Tên khách hàng<span style="color: red">*</span>:</label>
                            <div class="col-lg-9">
                                <input value="{{old('name')}}" type="text" name="name" class="form-control" placeholder="Nhập tên khách hàng">
                                @error('name')
                                <span style="color: red; font-size: 14px">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Email:</label>
                            <div class="col-lg-9">
                                <input value="{{old('email')}}" name="email" type="email" class="form-control" placeholder="Nhập email khách hàng">
                                @error('email')
                                <span style="color: red; font-size: 14px">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Số điện thoại<span style="color: red">*</span>:</label>
                            <div class="col-lg-9">
                                <input value="{{old('phone')}}" type="text" name="phone" class="form-control" placeholder="Nhập số điện thoại khách hàng">
                                @error('phone')
                                <span style="color: red; font-size: 14px">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Phân loại:</label>
                            <div class="col-lg-9">
                                <input value="{{old('customer_type')}}" name="customer_type" type="text" class="form-control">
                                @error('customer_type')
                                <span style="color: red; font-size: 14px">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Tuổi:</label>
                            <div class="col-lg-9">
                                <input value="{{old('age')}}" placeholder="Tuổi" name="age" type="number" class="form-control">
                                @error('age')
                                <span style="color: red; font-size: 14px">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Nghề nghiệp:</label>
                            <div class="col-lg-9">
                                <input value="{{old('job')}}" placeholder="Nhập nghề nghiệp" name="job" type="text" class="form-control">
                                @error('job')
                                <span style="color: red; font-size: 14px">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Địa chỉ:</label>
                            <div class="col-lg-9">
                                <input value="{{old('address')}}" name="address" type="text" placeholder="Nhập địa chỉ" class="form-control">
                                @error('address')
                                <span style="color: red; font-size: 14px">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Giới tính:</label>
                            <div class="col-lg-9">
                                <select name="gender" class="form-control select2" style="width: 100%;">
                                    <option value="1">Nam</option>
                                    <option value="0">Nữ</option>
                                </select>
                                @error('gender')
                                <span style="color: red; font-size: 14px">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Nhân viên hỗ trợ<span
                                    style="color: red"> *</span>:</label>
                            <div class="col-lg-9">
                                <select name="employee_code[]" multiple="multiple"
                                        data-placeholder="Chọn nhân viên hỗ trợ" class="select-icons">
                                    @foreach($users as $user)
                                        <option value="{{$user->info->code}}">{{$user->info->name}}</option>
                                    @endforeach
                                </select>
                                @error('employee_code')
                                <span style="color: red; font-size: 14px">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div style="float: right">
                            <a style="font-size: 16px" href="{{ route('customers.index') }}" class="btn btn-danger">Huỷ bỏ</a>
                            <button style="font-size: 16px" type="submit" class="btn btn-success">Tạo mới</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@section('script')
    <script>
        (function ($) {
            $.fn.inputFilter = function (inputFilter) {
                return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function () {
                    if (inputFilter(this.value)) {
                        this.oldValue = this.value;
                        this.oldSelectionStart = this.selectionStart;
                        this.oldSelectionEnd = this.selectionEnd;
                    } else if (this.hasOwnProperty("oldValue")) {
                        this.value = this.oldValue;
                        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
                    } else {
                        this.value = "";
                    }
                });
            };
        }(jQuery));

        // Install input filters.
        $("#inBox").inputFilter(function (value) {
            return /^-?\d*$/.test(value);
        });
        $(document).ready(function () {
            $('.multi_select').select2();
        });

        const validateEmail = (email) => {
            return String(email)
                .toLowerCase()
                .match(
                    /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
                );
        };
    </script>
@endsection
@endsection
