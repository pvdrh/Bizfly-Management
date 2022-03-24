@extends('layouts.master')

@section('title')
    Cập nhật thông tin nhân viên
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
                <li><a href="{{route('users.index')}}"><i class="icon-home2 position-left"></i> Quản lý nhân viên</a>
                </li>
                <li class="active">Cập nhật</li>
            </ul>
        </div>
    </div>
    <div class="col-lg-12">
        <div style="margin-left: 15px;margin-right: 15px;margin-bottom: 50px" class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Thông tin nhân viên</h5>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="post" action="{{route('users.update',$user->_id)}}">
                    @csrf
                    <fieldset class="content-group">
                        <div class="form-group">
                            <label class="control-label col-lg-2">Mã nhân viên<span style="color: red">*</span></label>
                            <div class="col-lg-10">
                                <input disabled value="{{$user->info->code}}" type="text" name="name" class="form-control" placeholder="Nhập tên nhân viên">
                                @error('name')
                                <span style="color: red; font-size: 14px">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-2">Email<span style="color: red">*</span></label>
                            <div class="col-lg-10">
                                <input disabled value="{{$user->email}}" type="email" name="email" class="form-control" placeholder="Email">
                                @error('email')
                                <span style="color: red; font-size: 14px">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-2">Tên nhân viên<span style="color: red">*</span></label>
                            <div class="col-lg-10">
                                <input value="{{$user->info->name}}" type="text" name="name" class="form-control" placeholder="Nhập tên nhân viên">
                                @error('name')
                                <span style="color: red; font-size: 14px">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-2">Số điện thoại</label>
                            <div class="col-lg-10">
                                <input id="intTextBox" value="{{$user->info->phone}}" type="text" name="phone" placeholder="Nhập số điện thoại" class="form-control"
                                       placeholder="Enter your username...">
                                @error('phone')
                                <span style="color: red; font-size: 14px">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-2">Địa chỉ</label>
                            <div class="col-lg-10">
                                <input value="{{$user->info->address}}" type="text" name="address" placeholder="Nhập địa chỉ" class="form-control">
                                @error('address')
                                <span style="color: red; font-size: 14px">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-2 cursor-pointer" for="clickable-label">Giới tính</label>
                            <div class="col-lg-10">
                                <select name="gender" class="form-control select2" style="width: 100%;">
                                    <option value="1" @if($user->info->gender == 1) selected @endif>Nam</option>
                                    <option value="0" @if($user->info->gender == 0) selected @endif>Nữ</option>
                                </select>
                                @error('gender')
                                <span style="color: red; font-size: 14px">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-2 cursor-pointer" for="clickable-label">Chức vụ<span style="color: red">*</span></label>
                            <div class="col-lg-10">
                                <select name="role" class="form-control select2" style="width: 100%;">
                                    <option value="0" @if(0 == $user->info->role) selected @endif>Admin</option>
                                    <option value="1" @if(1 == $user->info->role) selected @endif>Nhân viên</option>
                                </select>
                                @error('role')
                                <span style="color: red; font-size: 14px">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </fieldset>
                    <div style="float: right">
                        <a style="font-size: 16px" href="{{ route('users.index') }}" class="btn btn-danger">Huỷ bỏ</a>
                        <button style="font-size: 16px" type="submit" class="btn btn-success">Cập nhật</button>
                    </div>
                </form>
            </div>
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
        $("#intTextBox").inputFilter(function (value) {
            return /^-?\d*$/.test(value);
        });
    </script>
@endsection
@endsection
