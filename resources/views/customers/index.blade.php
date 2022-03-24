@extends('layouts.master')

@section('title')
    Danh sách khách hàng
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
                    <a href="{{route('customers.create')}}"
                       style="text-decoration: none; color: white; font-size: 16px; background: #43A047; padding: 7px 10px 7px 10px;"
                    >Thêm mới</a>
                    <a href="{{route('customers.export')}}"
                       style="text-decoration: none; color: white; font-size: 16px; background: #3949AB; padding: 7px 10px 7px 10px;"
                    >Xuất excel</a>
                    <a style="text-decoration: none; color: white; font-size: 16px; background: #546E7A; padding: 7px 10px 7px 10px;"
                       data-toggle="modal"
                       data-target="#exampleModalCenter">
                        Nhập excel
                    </a>
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
                                                <ul class="dropdown-menu dropdown-menu-right">
                                                    <li><a style="color: #546E7A"
                                                           href="{{ route('customers.edit',$customer['_id']) }}"
                                                           type="submit">
                                                            <i class="fa fa-btn fa-edit"></i>Chỉnh Sửa
                                                        </a></li>
                                                    <li data-id="{{$customer['_id']}}" class="delete-card"><a
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
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
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
                            url: '/customers/delete/' + seq,
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
            })
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
