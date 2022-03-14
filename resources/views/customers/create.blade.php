@extends('layouts.master')

@section('title')
    Thêm mới khách hàng
@endsection

@section('content')
    <!-- Content Header -->
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Thêm mới khách hàng</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Khách hàng</a></li>
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
                    <form role="form" method="post" action="{{ route('customers.store') }}">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tên khách hàng</label>
                                        <input type="text" name="name" class="form-control" id=""
                                               placeholder="Nhập tên khách hàng">
                                        @error('name')
                                        <span style="color: red; font-size: 14px">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="email" name="email" class="form-control" id="" placeholder="Email">
                                        @error('email')
                                        <span style="color: red; font-size: 14px">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Số điện thoại</label>
                                        <input type="text" name="phone" class="form-control" id="inBox"
                                               placeholder="Nhập số điện thoại">
                                        @error('phone')
                                        <span style="color: red; font-size: 14px">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tuổi</label>
                                        <input min="18" type="number" name="age" class="form-control" id=""
                                               placeholder="Nhập tuổi">
                                        @error('age')
                                        <span style="color: red; font-size: 14px">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nghề nghiệp</label>
                                        <input type="text" name="job" class="form-control" id=""
                                               placeholder="Nhập địa chỉ">
                                        @error('job')
                                        <span style="color: red; font-size: 14px">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Địa chỉ</label>
                                        <input type="text" name="address" class="form-control" id=""
                                               placeholder="Nhập địa chỉ">
                                        @error('address')
                                        <span style="color: red; font-size: 14px">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-1">
                                    <div class="form-group">
                                        <label>Giới tính</label>
                                        <select name="gender" class="form-control select2" style="width: 100%;">
                                            <option value="0">Nữ</option>
                                            <option value="1">Nam</option>
                                        </select>
                                        @error('gender')
                                        <span style="color: red; font-size: 14px">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Phân loại</label>
                                            <input type="text" name="customer_type" class="form-control">
                                            @error('customer_type')
                                            <span style="color: red; font-size: 14px">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>Đơn vị công tác</label>
                                        <select name="company_id" class="form-control select2" style="width: 100%;">
                                            @foreach($companies as $company)
                                                <option value="{{ $company->_id }}">{{ $company->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('company_id')
                                        <span style="color: red; font-size: 14px">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>Nhân viên hỗ trợ</label>
                                        <select class="form-control multi_select" multiple="multiple"
                                                name="employee_code[]">
                                            @foreach($users as $user)
                                                <option value="{{$user->info->code}}">{{$user->info->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('employee_code')
                                        <span style="color: red; font-size: 14px">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <a href="{{ route('customers.index') }}" class="btn btn-danger">Huỷ bỏ</a>
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
    </script>
@endsection
@endsection
