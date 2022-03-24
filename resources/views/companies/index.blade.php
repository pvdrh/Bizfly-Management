@extends('layouts.master')

@section('title')
    Danh sách công ty
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
                <li><a href="{{route('companies.index')}}"><i class="icon-home2 position-left"></i> Quản lý công ty</a>
                </li>
                <li class="active">Danh sách</li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div style="margin-left: 25px;margin-right: 25px;margin-bottom: 50px" class="panel panel-flat">
                <div class="panel-heading">
                    <a href="{{route('companies.create')}}" type="submit"
                       style="text-decoration: none; color: white; font-size: 16px"
                       class="btn btn-success">Tạo mới</a>
                    <div class="heading-elements">
                        <form class="heading-form" action="#">
                            <div class="form-group">
                                <label class="checkbox-inline checkbox-switchery checkbox-right switchery-xs">
                                    <form role="search" method="get" action="{{route('companies.index')}}">
                                        <div class="input-group input-group-sm">
                                            <input style="width: 75%" value="{{$com_name}}" type="text" name="search"
                                                   class="form-control float-right"
                                                   placeholder="Nhập tên danh mục">
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
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th style="text-align: center">Tên công ty</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th class="text-center">Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($companies as $company)
                            <tr>
                                <td style="text-align: center">{{$company->name}}</td>
                                <td>{{$company->phone}}</td>
                                <td>{{$company->address}}</td>

                                <td class="text-center">
                                    <ul class="icons-list">
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li><a href="{{ route('companies.edit',$company['_id']) }}"
                                                       type="submit">
                                                        <i class="fa fa-btn fa-edit"></i>Chỉnh Sửa
                                                    </a></li>
                                                <li class="delete-card"><a
                                                        style="padding-left: 15px;padding-bottom: 10px;padding-top: 5px;"
                                                        data-id="{{$company['_id']}}"><i
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
                            url: '/companies/delete/' + seq,
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
@endsection
@endsection
