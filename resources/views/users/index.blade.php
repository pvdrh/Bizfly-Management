@extends('layouts.master')

@section('title')
    Danh sách nhân viên
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
                    <li class="breadcrumb-item active">Danh sách</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    <!-- Content -->
    <div class="container-fluid">
        <!-- Main row -->
        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{route('users.create')}}" type="submit" style="text-decoration: none; color: white"
                           class="btn btn-success">Tạo mới</a>
                        <a href="{{route('users.export')}}" type="submit"
                           style="text-decoration: none; color: white"
                           class="btn btn-info">Xuất excel
                        </a>
                        <div class="card-tools">
                            <form role="search" method="get" action="{{route('users.index')}}">
                                <div class="input-group input-group-sm">
                                    <input value="{{$em_code}}" type="text" name="search"
                                           class="form-control float-right"
                                           placeholder="Nhập mã nhân viên">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover table-borderless ">
                            <thead>
                            <tr style="border-bottom: 1px black solid">
                                <th>Mã NV</th>
                                <th>Họ tên</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ</th>
                                <th>Giới tính</th>
                                <th>Chức vụ</th>
                                <th style="text-align: center">Hành động</th>
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
                                    @if(!$user->info->is_protected)
                                        <td style="text-align: center">
                                            <a href="{{ route('users.edit',$user['_id']) }}" type="submit"
                                               class="btn btn-info">
                                                <i class="fa fa-btn fa-edit"></i>Chỉnh Sửa
                                            </a>
                                            <button type="button" data-toggle="modal" data-target="#myModal"
                                                    class="btn btn-secondary"><i class="fa fa-key"
                                                                                 aria-hidden="true"></i> Đặt lại mật
                                                khẩu
                                            </button>
                                            <!-- //Nút xóa-->
                                            <span data-id="{{$user['_id']}}"
                                                  class="btn btn-danger delete-card"> <i
                                                    class="fa fa-btn fa-trash"></i> Xoá</span>
                                        </td>
                                    @endif
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
                                                <label for="new_password">Mật khẩu mới</label>
                                                <input id="password-field" type="password" class="form-control"
                                                       name="new_password">
                                                <span toggle="#password-field"
                                                      class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                                @error('new_password')
                                                <span style="color: red; font-size: 14px">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="confirm_password">Xác nhận mật khẩu</label>
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
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng
                                            </button>
                                            <button id="btn-sub" type="submit" class="btn btn-primary">Cập nhật</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                {!! $users->links() !!}
                <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
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
