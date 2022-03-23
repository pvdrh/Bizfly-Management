@extends('layouts.master')

@section('title')
    Danh sách nhân viên
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
                <li class="active">Danh sách</li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <a href="{{route('users.create')}}" type="submit" style="text-decoration: none; color: white"
                       class="btn btn-success">Tạo mới</a>
                    <a href="{{route('users.export')}}" type="submit"
                       style="text-decoration: none; color: white"
                       class="btn btn-info">Xuất excel
                    </a>
                    <div class="heading-elements">
                        <form class="heading-form" action="#">
                            <div class="form-group">
                                <label class="checkbox-inline checkbox-switchery checkbox-right switchery-xs">
                                    <form role="search" method="get" action="{{route('users.index')}}">
                                        <div class="input-group input-group-sm">
                                            <input style="width: 75%" value="{{$em_code}}" type="text" name="search"
                                                   class="form-control float-right"
                                                   placeholder="Nhập mã nhân viên">
                                            <div class="input-group-append">
                                                <button style="margin-left: 5px" type="submit" class="btn btn-default">
                                                    <i
                                                        class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </label>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table datatable-basic table-hover">
                        <thead>
                        <tr>
                            <th>Mã NV</th>
                            <th>Họ tên</th>
                            <th>Email</th>
                            <th>SĐT</th>
                            <th>Địa chỉ</th>
                            <th>Giới tính</th>
                            <th>Chức vụ</th>
                            <th class="text-center">Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                @if($user->info)
                                    <td style="font-weight: bold">{{$user->info->code}}</td>
                                    <td>{{$user->info->name}}</td>
                                @endif
                                <td>{{$user->email}}</td>
                                @if($user->info)
                                    <td>{{$user->info->phone}}</td>
                                    <td>{{$user->info->address}}</td>
                                    @if($user->info->gender == 1)
                                        <td>Nam</td>
                                    @else
                                        <td>Nữ</td>
                                    @endif
                                    @if($user->info->role == 1)
                                        <td>Nhân viên</td>
                                    @else
                                        <td>Admin</td>
                                    @endif
                                @endif
                                <td class="text-center">
                                    <ul class="icons-list">
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li><a href="{{ route('users.edit',$user['_id']) }}" type="submit">
                                                        <i class="fa fa-btn fa-edit"></i>Chỉnh Sửa
                                                    </a></li>
                                                <li>
                                                    <a data-toggle="modal" data-target="#myModal"><i class="fa fa-key"
                                                                                                     aria-hidden="true"></i>
                                                        Đặt lại mật khẩu
                                                    </a>
                                                </li>
                                                <li><a style="padding-left: 15px;padding-bottom: 10px;padding-top: 5px;"
                                                       data-id="{{$user['_id']}}"><i class="fa fa-btn fa-trash"></i> Xoá
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 style="font-weight: bold;font-size: 18px" class="modal-title">Đặt lại mật
                                        khẩu cho {{$user->info->name}}</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <form role="form" method="post" id="change-pass"
                                      action="{{ route('users.changePass',$user->_id) }}">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="new_password">Mật khẩu mới<span
                                                    style="color: red">*</span></label>
                                            <input id="password-field" type="password" class="form-control"
                                                   name="new_password">
                                            <span toggle="#password-field"
                                                  class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                            @error('new_password')
                                            <span style="color: red; font-size: 14px">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="confirm_password">Xác nhận mật khẩu<span
                                                    style="color: red">*</span></label>
                                            <input id="password-fieldd" type="password"
                                                   name="confirm_password"
                                                   class="form-control">
                                            <span toggle="#password-fieldd"
                                                  class="fa fa-fw fa-eye field-icon toggle-passwordd"></span>
                                            @error('confirm_password')
                                            <span style="color: red; font-size: 14px">{{ $message }}</span>
                                            @enderror
                                            <span style="margin-top: 7px;color: red; font-size: 12px"
                                                  id="CheckPasswordMatch"></span>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng
                                        </button>
                                        <button id="btn-sub" type="submit" class="btn btn-primary">Cập nhật</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .field-icon {
            float: right;
            margin-left: -25px;
            margin-top: -25px;
            position: relative;
            margin-right: 10px;
            z-index: 2;
        }
        .container {
            padding-top: 50px;
            margin: auto;
        }
        .error {
            font-size: 12px;
            color: red;
            font-weight: 400 !important;
        }
    </style>
    <!-- Content Header -->
    <!-- Content -->
    <style>
        .field-icon {
            float: right;
            margin-left: -25px;
            margin-top: -25px;
            position: relative;
            margin-right: 10px;
            z-index: 2;
        }
        .container {
            padding-top: 50px;
            margin: auto;
        }
        .error {
            font-size: 12px;
            color: red;
            font-weight: 400 !important;
        }
    </style>
@section('script')
    <script>
        $(document).ready(function () {
            $('.delete-card').on('click', function () {
                swal({
                    title: "Chú Ý",
                    text: "Bạn có chắc chắn muốn xóa?",
                    icon: "warning",
                    buttons: ["Đóng", "OK"],
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        let seq = $(this).data('id')
                        $.ajax({
                            type: 'post',
                            url: '/users/delete/' + seq,
                            success: function (res) {
                                window.location.reload()
                            }
                        });
                    }
                }).catch(err => {
                    if (err) {
                        swal("Chú Ý!", "Xóa thất bại!", "error");
                    } else {
                        swal.stopLoading();
                        swal.close();
                    }
                });
            });
            var validator = $("#change-pass").validate({
                onfocusout: false,
                onkeyup: true,
                onclick: false,
                rules: {
                    "new_password": {
                        required: true,
                        maxlength: 20,
                        minlength: 6
                    },
                    "confirm_password": {
                        required: true,
                    }
                },
                messages: {
                    "new_password": {
                        required: "Mật khẩu mới không được để trống.",
                        minlength: "Mật khẩu phải có ít nhất 6 ký tự."
                    },
                    "confirm_password": {
                        required: "Xác nhận mật khẩu không được để trống.",
                        equalTo: "Mật khẩu phải có ít nhất 6 ký tự"
                    },
                }
            });

            $("#btn-sub").click(function () {
                validator.resetForm();
                var password = $("#password-field").val();
                var confirmPassword = $("#password-fieldd").val();
                if (password != confirmPassword) {
                    $("#CheckPasswordMatch").html("Mật khẩu không trùng nhau!").css("color", "red");
                    return false;
                } else return true;
            });
        });
    </script>
    <script>
        $(".toggle-password").click(function () {

            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
        $(".toggle-passwordd").click(function () {

            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    </script>
    <script>
        @if(Session::has('success'))
        toastr.success('{{ Session::get('success') }}');
        @elseif(Session::has('error'))
        toastr.error('{{ Session::get('error') }}');
        @endif
    </script>
@endsection
@endsection
