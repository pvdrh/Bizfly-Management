@extends('layouts.master')

@section('title')
    Lịch sử cập nhật
@endsection

@section('content')
    <div class="page-header">
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{route('products.index')}}"><i class="icon-home2 position-left"></i> Quản lý khách
                        hàng</a>
                </li>
                <li>Chi tiết khách hàng</li>
                <li class="active">Lịch sử cập nhật</li>
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
                        </div>
                    </div>
                </div>
                <div> @if(count($histories) > 0)
                        <table class="table table-hover">
                            <thead>
                            <tr style="border-bottom: 1px black solid">
                                <th><input type="checkbox" id="check_all"></th>
                                <th>Tên khách hàng</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ</th>
                                <th>Tuổi</th>
                                <th>Giới tính</th>
                                <th>Phân loại</th>
                                <th>Nghề nghiệp</th>
                                <th>Người cập nhật</th>
                                <th>Thời gian</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($histories as $history)
                                <tr>
                                    <td><input type="checkbox" name="history_id[]" class="checkbox"
                                               data-id="{{$history->_id}}"></td>
                                    <td>{{ $history->name }}</td>
                                    <td>{{ $history->email }}</td>
                                    <td>{{ $history->phone }}</td>
                                    <td>{{ $history->address}}</td>
                                    <td>{{ $history->age}}</td>
                                    <td>{{ $history->gender ? "Name" : "Nữ"}}</td>
                                    <td>{{ $history->customer_type}}</td>
                                    <td>{{ $history->job}}</td>
                                    <td>{{ $history->users ? $history->users->info->name : "Đang cập nhật"}}</td>
                                    <td>{{ $history->updatedTime}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                </div>
                <div style="padding: 10px" class="card-footer clearfix">
                    <div class="col-lg-3">
                        <span style="font-size: 14px">Số bản ghi / trang: {{$histories->count()}}</span>
                    </div>
                    <div class="col-lg-9">
                        {{ $histories ->links('pagination::bootstrap-4') }}
                    </div>
                </div>
                @else
                    <div style="display: flex; justify-content: center">
                        <img style="width: 50%; height: 50%" src="{{ URL::to('backend/dist/img/social-default.jpg') }}">
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
        $(document).ready(function () {
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
                                url: "{{route('customers.deleteAllHistory')}}",
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
                            var strIds = idsArr.join(",");
                            $.ajax({
                                url: "{{route('customers.deleteAllHistory')}}",
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
        })
    </script>
@endsection
@endsection
