@extends('layouts.master')

@section('title')
    Thêm mới nhân viên
@endsection

@section('content')
    <!-- Content Header -->
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Thêm mới nhân viên</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Nhân viên</a></li>
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
                    <form role="form" method="post" action="{{route('users.update',$user->id)}}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mã nhân viên</label>
                                <input disabled type="text" max="30" name="name" value="{{$user->info->code}}"
                                       class="form-control" id="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" disabled name="email" value="{{$user->email}}" class="form-control"
                                       id=""
                                       placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên nhân viên</label>
                                <input type="text" max="30" name="name" value="{{$user->info->name}}"
                                       class="form-control" id=""
                                       placeholder="Nhập tên nhân viên">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Số điện thoại</label>
                                <input type="text" name="phone" id="intTextBox" value="{{$user->info->phone}}"
                                       class="form-control" id="">
                                @error('phone')
                                <span style="color: red; font-size: 14px">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Địa chỉ</label>
                                <input type="text" name="address" value="{{$user->info->address}}" class="form-control"
                                       id="" placeholder="Nhập địa chỉ">
                                @error('address')
                                <span style="color: red; font-size: 14px">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Giới tính</label>
                                <select class="form-control select2" name="gender" style="width: 100%;">
                                    <option value="1" @if($user->info->gender == 1) selected @endif>Nam</option>
                                    <option value="0" @if($user->info->gender == 0) selected @endif>Nữ</option>
                                </select>
                                @error('gender')
                                <span style="color: red; font-size: 14px">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Chức vụ</label>
                                <select class="form-control  select2" name="role_id" style="width: 100%;">
                                    <option value="0" @if(0 == $user->info->role) selected @endif>Admin</option>
                                    <option value="1" @if(1 == $user->info->role) selected @endif>Nhân viên</option>
                                </select>
                                @error('role_id')
                                <span style="color: red; font-size: 14px">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <a href="{{route('users.index')}}" class="btn btn-danger">Huỷ bỏ</a>
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
