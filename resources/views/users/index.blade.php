@extends('layouts.master')

@section('title')
    Danh sách nhân viên
@endsection

@section('content')
    <div class="page-header">
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
                    <div class="dropdown">
                        <a style="color: white; padding: 7px 11px 7px 11px; background: gray" class="dropbtn">
                            <svg style="display: inline" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                 fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                                <path
                                    d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                                <path
                                    d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
                            </svg>
                            Tùy chọn</a>
                        <div style="font-size: 14px" class="dropdown-content">
                            <a style="color: red" class="delete-all">
                                <svg style="display: inline" xmlns="http://www.w3.org/2000/svg" width="16"
                                     height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                </svg>
                                Xóa bản ghi đã chọn</a>
                            <a style="color: green" class="export-checkbox">
                                <svg style="display: inline" xmlns="http://www.w3.org/2000/svg" width="16"
                                     height="16" fill="currentColor" class="bi bi-file-earmark-excel-fill"
                                     viewBox="0 0 16 16">
                                    <path
                                        d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM5.884 6.68 8 9.219l2.116-2.54a.5.5 0 1 1 .768.641L8.651 10l2.233 2.68a.5.5 0 0 1-.768.64L8 10.781l-2.116 2.54a.5.5 0 0 1-.768-.641L7.349 10 5.116 7.32a.5.5 0 1 1 .768-.64z"/>
                                </svg>
                                Xuất bản ghi đã chọn</a>
                        </div>
                    </div>
                    <a style="color: white; padding: 7px 11px 7px 11px; background: green"
                       href="{{route('users.create')}}">
                        <svg style="display: inline" xmlns="http://www.w3.org/2000/svg" width="16"
                             height="16" fill="currentColor" class="bi bi-file-earmark-plus-fill"
                             viewBox="0 0 16 16">
                            <path
                                d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM8.5 7v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 1 0z"/>
                        </svg>
                        Thêm mới</a>
                    {{--                    <a style="color: white; padding: 7px 11px 7px 11px; background: green"--}}
                    {{--                       href="{{route('users.export')}}">--}}
                    {{--                        <svg style="display: inline" xmlns="http://www.w3.org/2000/svg" width="16"--}}
                    {{--                             height="16" fill="currentColor" class="bi bi-file-earmark-excel-fill"--}}
                    {{--                             viewBox="0 0 16 16">--}}
                    {{--                            <path--}}
                    {{--                                d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM5.884 6.68 8 9.219l2.116-2.54a.5.5 0 1 1 .768.641L8.651 10l2.233 2.68a.5.5 0 0 1-.768.64L8 10.781l-2.116 2.54a.5.5 0 0 1-.768-.641L7.349 10 5.116 7.32a.5.5 0 1 1 .768-.64z"/>--}}
                    {{--                        </svg>--}}
                    {{--                        Xuất excel</a>--}}
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
                                @if(!$user->info->is_protected)
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="user_id[]"
                                                   class="checkbox"
                                                   data-id="{{$user->_id}}">
                                        </td>
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
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <a style="color: #546E7A"
                                                                   href="{{ route('users.edit',$user['_id']) }}"
                                                                   type="submit">
                                                                    <i class="fa fa-btn fa-edit"></i>Chỉnh Sửa
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a data-toggle="modal" data-target="#exampleModal"
                                                                   type="submit">
                                                                    <i class="fa fa-btn fa-key"></i>Đặt lại mật khẩu
                                                                </a>
                                                            </li>
                                                            <li data-id="{{$user['_id']}}" class="delete-card"><a
                                                                    style="padding-left: 15px;padding-bottom: 10px;padding-top: 5px; color: #E53935"
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
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                        <div style="padding: 10px" class="card-footer clearfix">
                            <div class="col-lg-3">
                                <span style="font-size: 14px">Số bản ghi / trang: {{$users->count()}}</span>
                            </div>
                            <div class="col-lg-9">
                                {{ $users->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 style="font-weight: bold;font-size: 18px" class="modal-title">Đặt lại mật
                                            khẩu cho {{$user->info->name}}</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <form role="form" method="post"
                                          action="{{ route('users.changePass',$user->_id) }}">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="new_password">Mật khẩu mới:<span
                                                        style="color: red">*</span></label>
                                                <input name="password" id="password" class="form-control" required
                                                       type="password"
                                                @error('new_password')
                                                <span style="color: red; font-size: 14px">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="confirm_password">Xác nhận mật khẩu<span
                                                        style="color: red">*</span></label>
                                                <input id="confirm_password" type="password" required
                                                       name="confirm_password"
                                                       class="form-control">
                                                <span id="message" style="color:red"> </span> <br><br>
                                                @error('confirm_password')
                                                <span style="color: red; font-size: 14px">{{ $message }}</span>
                                                @enderror
                                                <span style="margin-top: 7px;color: red; font-size: 12px"
                                                      id="CheckPasswordMatch"></span>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <a type="button"
                                               style="text-decoration: none; color: white; font-size: 16px; background: #E53935; padding: 7px 12px 7px 12px;"
                                               data-dismiss="modal">Đóng
                                            </a>
                                            <button id="btn-sub" type="submit"
                                                    style="text-decoration: none; color: white; font-size: 16px; background: #43A047; padding: 6px 10px 6px 10px;">
                                                Cập nhật
                                            </button>
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
    <style>
        .dropbtn {
            background-color: #4CAF50;
            color: white;
            padding: 16px;
            font-size: 16px;
            border: none;
            cursor: pointer;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #fff;
            min-width: 180px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown:hover .dropbtn {
            background-color: #3e8e41;
        }

        .pagination {
            float: right;
        }
    </style>
@section('script')
    <script>
        var password = document.getElementById("password")
            , confirm_password = document.getElementById("confirm_password");

        function validatePassword() {
            if (password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Mật khẩu không trùng nhau.");
            } else {
                confirm_password.setCustomValidity('');
            }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
    </script>
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
            var checkAll = false;
            $('#check_all').on('click', function (e) {
                if ($(this).is(':checked', true)) {
                    checkAll = true;
                    $(".checkbox").prop('checked', true);
                } else {
                    checkAll = false;
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
                    if (checkAll) {
                        if (confirm('Bạn có chắc chắn muốn xóa tất cả bản ghi?')) {
                            $.ajax({
                                url: "{{route('users.deleteAll')}}",
                                type: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
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
                }
            });
            $('.export-checkbox').on('click', function (e) {
                var idsArr = [];
                $(".checkbox:checked").each(function () {
                    idsArr.push($(this).attr('data-id'));
                });
                if (idsArr.length <= 0) {
                    alert("Vui lòng chọn bản ghi bạn muốn xuất");
                } else {
                    if (checkAll) {
                        console.log("abbbb")
                        $.ajax({
                            url: "{{route('users.export')}}",
                            type: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            xhrFields: {
                                responseType: 'blob'
                            },
                            success: function (response) {
                                let downloadUrl = URL.createObjectURL(response);
                                let a = document.createElement("a");
                                a.href = downloadUrl;
                                a.download = "Danh sách nhân viên.xlsx";
                                document.body.appendChild(a);
                                a.click();
                                location.reload();
                            },
                            error: function () {
                                swal("Xuất excel thất bại!", "", "error");
                                setTimeout(function () {
                                    location.reload();
                                }, 1000);
                            }
                        });
                    } else {
                        let strIds = idsArr.join(",");
                        console.log(strIds)
                        $.ajax({
                            url: "{{route('users.export')}}",
                            type: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: 'ids=' + strIds,
                            xhrFields: {
                                responseType: 'blob'
                            },
                            success: function (response) {
                                let downloadUrl = URL.createObjectURL(response);
                                let a = document.createElement("a");
                                a.href = downloadUrl;
                                a.download = "Danh sách nhân viên.xlsx";
                                document.body.appendChild(a);
                                a.click();
                                location.reload();
                            },
                            error: function (data) {
                                swal("Xuất excel thất bại!", "", "error");
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
