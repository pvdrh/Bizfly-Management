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
            <div style="margin-left: 25px;margin-right: 25px;margin-bottom: 50px" class="panel panel-flat">
                <div class="panel-heading">
                    <a href="{{route('users.create')}}"
                       style="text-decoration: none; color: white; font-size: 16px; background: #43A047; padding: 7px 10px 7px 10px;"
                    >Thêm mới</a>
                    <a href="{{route('users.export')}}"
                       style="text-decoration: none; color: white; font-size: 16px; background: #3949AB; padding: 7px 10px 7px 10px;">Xuất
                        excel
                    </a>
                    <div class="btn-group">
                        <a style="text-decoration: none; margin-bottom: 5px; color: white; font-size: 16px; background: #666666; padding: 7px 10px 7px 10px;"
                           type="button" class="dropdown-toggle" data-bs-toggle="dropdown">
                            Tùy chọn
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <button class="dropdown-item delete-all">Xóa bản ghi đã chọn</button>
                            </li>
                        </ul>
                    </div>
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
                @if(count($users) > 0)
                    <div>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th><input type="checkbox" id="check_all"></th>
                                <th>Mã NV</th>
                                <th>Họ tên</th>
                                <th>Email</th>
                                <th>SĐT</th>
                                <th>Địa chỉ</th>
                                <th>Chức vụ</th>
                                <th class="text-center">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>@if(!$user->info->is_protected)
                                            <input type="checkbox" name="user_id[]"
                                                   class="checkbox"
                                                   data-id="{{$user->_id}}">
                                        @endif</td>
                                    @if($user->info)
                                        <td style="font-weight: bold">{{$user->info->code}}</td>
                                        <td>{{$user->info->name}}</td>
                                    @endif
                                    <td>{{$user->email}}</td>
                                    @if($user->info)
                                        <td>{{$user->info->phone}}</td>
                                        <td>{{$user->info->address}}</td>
                                        @if($user->info->role == 1)
                                            <td>Nhân viên</td>
                                        @else
                                            <td>Admin</td>
                                        @endif
                                    @endif
                                    @if(!$user->info->is_protected)
                                        <td class="text-center">
                                            <ul class="icons-list">
                                                <li class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                        <i class="icon-menu9"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                        <li><a style="color: #546E7A"
                                                               href="{{ route('users.edit',$user['_id']) }}"
                                                               type="submit">
                                                                <i class="fa fa-btn fa-edit"></i>Chỉnh Sửa
                                                            </a></li>
                                                        <li data-id="{{$user['_id']}}" class="delete-card"><a
                                                                style="padding-left: 15px;padding-bottom: 10px;padding-top: 5px; color: #F4511E"
                                                            ><i
                                                                    class="fa fa-btn fa-trash"></i>
                                                                Xoá
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
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
                @else
                    <div style="display: flex; justify-content: center">
                        <img style="width: 50%; height: 50%" src="backend/dist/img/social-default.jpg">
                    </div>
                    <h4 style="text-align: center; padding-bottom: 50px">Không có dữ liệu</h4>
                @endif
            </div>
        </div>
    </div>
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
                                swal("Xoá thành công!", "", "success");
                                setTimeout(function () {
                                    location.reload();
                                }, 1000);
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
        $(document).ready(function () {
            $('#check_all').on('click', function (e) {
                if ($(this).is(':checked', true)) {
                    $(".checkbox").prop('checked', true);
                } else {
                    $(".checkbox").prop('checked', false);
                }
            });
            $('.delete-all').on('click', function (e) {
                var idsArr = [];
                $(".checkbox:checked").each(function () {
                    idsArr.push($(this).attr('data-id'));
                });
                if (idsArr.length <= 0) {
                    alert("Vui lòng chọn bản ghi bạn muốn xóa");
                } else {
                    var idss = idsArr.length;
                    if (confirm('Bạn có chắc chắn muốn xóa ' + idss + ' bản ghi đã chọn?')) {
                        var strIds = idsArr.join(",");
                        $.ajax({
                            url: "{{route('users.deleteAll')}}",
                            type: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: 'ids=' + strIds,
                            success: function () {
                                swal("Xoá thành công!", "", "success");
                                setTimeout(function () {
                                    location.reload();
                                }, 1000);
                            },
                            error: function () {
                                swal("Xoá thất bại!", "", "error");
                                setTimeout(function () {
                                    location.reload();
                                }, 1000);
                            }
                        });
                    }
                }
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
