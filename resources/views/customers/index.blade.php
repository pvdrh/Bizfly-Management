@extends('layouts.master')

@section('title')
    Danh sách khách hàng
@endsection

@section('content')
    <div class="page-header">
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{route('customers.index')}}"><i class="icon-home2 position-left"></i> Quản lý khách
                        hàng</a>
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
                    <a style="color: white; padding: 7px 11px 7px 11px; background: #43A047"
                       href="{{route('customers.create')}}">
                        <svg style="display: inline" xmlns="http://www.w3.org/2000/svg" width="16"
                             height="16" fill="currentColor" class="bi bi-file-earmark-plus-fill"
                             viewBox="0 0 16 16">
                            <path
                                d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM8.5 7v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 1 0z"/>
                        </svg>
                        Thêm mới</a>
                    {{--                    <a style="color: white; padding: 7px 11px 7px 11px; background: #039BE5"--}}
                    {{--                       href="{{route('customers.export')}}">--}}
                    {{--                        <svg style="display: inline" xmlns="http://www.w3.org/2000/svg" width="16"--}}
                    {{--                             height="16" fill="currentColor" class="bi bi-file-earmark-excel-fill"--}}
                    {{--                             viewBox="0 0 16 16">--}}
                    {{--                            <path--}}
                    {{--                                d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM5.884 6.68 8 9.219l2.116-2.54a.5.5 0 1 1 .768.641L8.651 10l2.233 2.68a.5.5 0 0 1-.768.64L8 10.781l-2.116 2.54a.5.5 0 0 1-.768-.641L7.349 10 5.116 7.32a.5.5 0 1 1 .768-.64z"/>--}}
                    {{--                        </svg>--}}
                    {{--                        Xuất excel</a>--}}
                    <a data-toggle="modal"
                       data-target="#exampleModalCenter"
                       style="color: white; padding: 7px 11px 7px 11px; background: #00ACC1">
                        <svg style="display: inline" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                             fill="currentColor" class="bi bi-file-plus-fill" viewBox="0 0 16 16">
                            <path
                                d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM8.5 6v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 1 0z"/>
                        </svg>
                        Nhập excel</a>
                    <div class="heading-elements">
                        <form class="heading-form" action="#">
                            <div class="form-group">
                                <label class="checkbox-inline checkbox-switchery checkbox-right switchery-xs">
                                    <form role="search" method="get" action="{{route('customers.index')}}">
                                        <div class="input-group input-group-sm">
                                            <input style="width: 75%" value="{{$cus_name}}" type="text" name="search"
                                                   class="form-control float-right"
                                                   placeholder="Nhập tên khách hàng">
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
                @if(count($customers) > 0)
                    <div>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th><input type="checkbox" id="check_all"></th>
                                <th>ID</th>
                                <th>Họ tên</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ</th>
                                <th>Phân loại</th>
                                <th style="text-align: center">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($customers as $customer)
                                <tr>
                                    <td><input type="checkbox" name="customer_id[]" class="checkbox"
                                               data-id="{{$customer->_id}}"></td>
                                    <td>{{$customer->_id}}</td>
                                    <td><span
                                            class="d-inline-block" tabindex="0" data-bs-toggle="tooltip"
                                            title="Chi tiết khách hàng">
                                        <a style="font-weight: bold; color: cornflowerblue"
                                           href="{{route('customers.show', $customer->_id)}}">{{$customer->name}}</a>
                                </span>
                                    </td>
                                    @if($customer->email)
                                        <td>{{$customer->email}}</td>
                                    @else
                                        <td></td>
                                    @endif
                                    @if($customer->phone)
                                        <td>{{$customer->phone}}</td>
                                    @else
                                        <td></td>
                                    @endif
                                    @if($customer->address)
                                        <td>{{$customer->address}}</td>
                                    @else
                                        <td></td>
                                    @endif
                                    @if($customer->customer_type)
                                        <td>{{$customer->customer_type}}</td>
                                    @else
                                        <td></td>
                                    @endif
                                    <td class="text-center">
                                        <ul class="icons-list">
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li><a style="color: #546E7A"
                                                           href="{{ route('customers.edit',$customer['_id']) }}"
                                                           type="submit">
                                                            <i class="fa fa-btn fa-edit"></i>Chỉnh Sửa
                                                        </a></li>
                                                    <li data-id="{{$customer['_id']}}" class="delete-card"><a
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
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div style="padding: 10px" class="card-footer clearfix">
                        <div class="col-lg-3">
                            <span
                                style="font-size: 14px">Số bản ghi / trang: {{$customers->count()}}</span>
                        </div>
                        <div class="col-lg-9">
                            {{ $customers->links('pagination::bootstrap-4') }}
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
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <form role="form" method="post" enctype="multipart/form-data"
              action="{{ route('customers.import') }}">
            @csrf
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Tải lên file excel</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Tải file excel mẫu <a href="{{route('customers.export-sample')}}"><u
                                    style="color: #4974b4">tại đây</u></a></p>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" id="files" name="file">
                                <div id="list_file"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-success">Tải lên</button>
                    </div>
                </div>
            </div>
        </form>
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
        $(document).ready(function () {
            var checkall = false
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
                            url: '/customers/delete/' + seq,
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
            $('#check_all').on('click', function (e) {
                if ($(this).is(':checked', true)) {
                    checkall = true
                    $(".checkbox").prop('checked', true);
                } else {
                    checkall = false
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
                    if (checkall) {
                        if (confirm('Bạn có chắc chắn muốn xóa tất cả bản ghi?')) {
                            $.ajax({
                                url: "{{route('customers.deleteAll')}}",
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
                        if (confirm('Bạn có chắc chắn muốn xóa ' + idss + ' bản ghi đã chọn?')) {
                            console.log("Ok")
                            var strIds = idsArr.join(",");
                            $.ajax({
                                url: "{{route('customers.deleteAll')}}",
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
                    if (checkall) {
                        $.ajax({
                            url: "{{route('customers.export')}}",
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
                                a.download = "Danh sách khách hàng.xlsx";
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
                    } else {
                        var strIds = idsArr.join(",");
                        $.ajax({
                            url: "{{route('customers.export')}}",
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
                                a.download = "Danh sách khách hàng.xlsx";
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
        @if(Session::has('success'))
        toastr.success('{{ Session::get('success') }}');
        @elseif(Session::has('error'))
        toastr.error('{{ Session::get('error') }}');
        @endif
    </script>
    <script>
        var fileInput = document.getElementById('exampleInputFile');
        var listFile = document.getElementById('list_file');

        fileInput.onchange = function () {
            var files = Array.from(this.files);
            files = files.map(file => file.name);
            listFile.innerHTML = files.join('<br/>');
        }
    </script>
@endsection
@endsection
