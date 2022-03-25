@extends('layouts.master')

@section('title')
    Chỉnh sửa khách hàng
@endsection

@section('content')
    <div class="page-header">
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{route('customers.index')}}"><i class="icon-home2 position-left"></i> Quản lý khách
                        hàng</a>
                </li>
                <li class="active">Cập nhật</li>
            </ul>
        </div>
    </div>
    <!-- Main row -->
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <form role="form" method="post" action="{{route('customers.update',$customer->_id)}}" class="form-horizontal">
                @csrf
                <div style="margin-left: 15px;margin-right: 15px;margin-bottom: 50px" class="panel panel-flat">
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Tên khách hàng:<span style="color: red">*</span></label>
                            <div class="col-lg-9">
                                <input value="{{$customer->name}}" type="text" name="name" class="form-control" placeholder="Nhập tên khách hàng">
                                @error('name')
                                <span style="color: red; font-size: 14px">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Email:</label>
                            <div class="col-lg-9">
                                <input value="{{$customer->email}}" name="email" type="email" class="form-control" placeholder="Nhập email khách hàng">
                                @error('email')
                                <span style="color: red; font-size: 14px">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Số điện thoại:<span style="color: red">*</span></label>
                            <div class="col-lg-9">
                                <input value="{{$customer->phone}}" type="text" name="phone" class="form-control" placeholder="Nhập số điện thoại khách hàng">
                                @error('phone')
                                <span style="color: red; font-size: 14px">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Phân loại:</label>
                            <div class="col-lg-9">
                                <input value="{{$customer->customer_type}}" name="customer_type" type="text" class="form-control">
                                @error('customer_type')
                                <span style="color: red; font-size: 14px">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Tuổi:</label>
                            <div class="col-lg-9">
                                <input value="{{$customer->age}}" name="age" type="number" class="form-control">
                                @error('age')
                                <span style="color: red; font-size: 14px">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Nghề nghiệp:</label>
                            <div class="col-lg-9">
                                <input value="{{$customer->job}}" placeholder="Nhập nghề nghiệp" name="job" type="text" class="form-control">
                                @error('job')
                                <span style="color: red; font-size: 14px">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Địa chỉ:</label>
                            <div class="col-lg-9">
                                <input value="{{$customer->address}}" placeholder="Nhập địa chỉ" name="address" type="text" class="form-control">
                                @error('address')
                                <span style="color: red; font-size: 14px">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Giới tính:</label>
                            <div class="col-lg-9">
                                <select name="gender" class="form-control select2" style="width: 100%;">
                                    <option value="1" @if($customer->gender == 1) selected @endif>Nam</option>
                                    <option value="0" @if($customer->gender == 0) selected @endif>Nữ</option>
                                </select>
                                @error('gender')
                                <span style="color: red; font-size: 14px">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Nhân viên hỗ trợ:<span
                                    style="color: red">*</span></label>
                            <div class="col-lg-9">
                                <select  name="employee_code[]" multiple="multiple"
                                        data-placeholder="Chọn nhân viên hỗ trợ" class="select-xs">
                                    @foreach($users as $user)
                                        <option class="select-xs" value="{{$user->info->code}}" @if(isset($customer->employee_code)) {{in_array($user->info->code, $customer->employee_code) ? "selected" : ''}} @endif >{{$user->info->name}}</option>
                                    @endforeach
                                </select>
                                @error('employee_code')
                                <span style="color: red; font-size: 14px">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div style="float: right">
                            <a style="text-decoration: none; color: white; font-size: 16px; background: #E53935; padding: 7px 12px 7px 12px;" href="{{ route('customers.index') }}">Huỷ bỏ</a>
                            <button style="text-decoration: none; color: white; font-size: 16px; background: #43A047; padding: 6px 10px 6px 10px;" type="submit" >Cập nhật</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <style>
        .icon-undefined{
            display: none;
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
        let selectedValuesTest = {{\Illuminate\Support\Facades\Auth::user()->info->code}};
        $(function () {
            $(".multi_select").select2().val(selectedValuesTest).trigger('change.select2');
        });
    </script>
@endsection
@endsection
