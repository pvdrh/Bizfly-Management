@extends('layouts.master')

@section('title')
    Thêm mới nhân viên
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
                    <li class="breadcrumb-item"><a href="{{route('users.index')}}">Nhân viên</a></li>
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
                    <form role="form" method="post" action="{{ route('users.store') }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên nhân viên<span style="color: red">*</span></label>
                                <input value="{{old('name')}}" type="text" name="name" class="form-control" id=""
                                       placeholder="Nhập tên nhân viên">
                                @error('name')
                                <span style="color: red; font-size: 14px">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email<span style="color: red">*</span></label>
                                <input value="{{old('email')}}" type="email" name="email" class="form-control" id=""
                                       placeholder="Email">
                                @error('email')
                                <span style="color: red; font-size: 14px">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mật khẩu<span style="color: red">*</span></label>
                                <input name="password" type="password" min="6" max="20" class="form-control" id="">
                                @error('password')
                                <span style="color: red; font-size: 14px">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Số điện thoại</label>
                                <input value="{{old('phone')}}" type="text" name="phone" class="form-control"
                                       id="intTextBox" placeholder="Nhập số điện thoại">
                                @error('phone')
                                <span style="color: red; font-size: 14px">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Địa chỉ</label>
                                <input value="{{old('address')}}" type="text" name="address" class="form-control" id=""
                                       placeholder="Nhập địa chỉ">
                                @error('address')
                                <span style="color: red; font-size: 14px">{{ $message }}</span>
                                @enderror
                            </div>
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
                            <div class="form-group">
                                <label>Chức vụ<span style="color: red">*</span></label>
                                <select name="role" class="form-control select2" style="width: 100%;">
                                    <option value="0">Admin</option>
                                    <option value="1">Nhân viên</option>
                                </select>
                                @error('role')
                                <span style="color: red; font-size: 14px">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <a href="{{ route('users.index') }}" class="btn btn-danger">Huỷ bỏ</a>
                            <button type="submit" class="btn btn-success">Tạo mới</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
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
        $("#intTextBox").inputFilter(function (value) {
            return /^-?\d*$/.test(value);
        });
    </script>
@endsection
@endsection
