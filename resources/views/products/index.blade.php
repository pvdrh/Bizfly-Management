@extends('layouts.master')

@section('title')
    Danh sách sản phẩm
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
                <li><a href="{{route('products.index')}}"><i class="icon-home2 position-left"></i> Quản lý sản phẩm</a>
                </li>
                <li class="active">Danh sách</li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div style="margin-left: 25px;margin-right: 25px;margin-bottom: 50px" class="panel panel-flat">
                <div class="panel-heading">
                    <a href="{{route('products.create')}}"
                       style="text-decoration: none; color: white; font-size: 16px; background: #43A047; padding: 7px 10px 7px 10px;"
                    >Thêm mới</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr style="border-bottom: 1px black solid">
                            <th style="text-align: center">Tên sản phẩm</th>
                            <th style="text-align: center">Ảnh</th>
                            <th>Danh mục</th>
                            <th>Giá bán</th>
                            <th style="text-align: center">Số lượng</th>
                            <th style="text-align: center">Đã bán</th>
                            <th style="text-align: center">Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td style="overflow: hidden;white-space: nowrap;text-overflow: ellipsis;max-width: 200px;text-align: center; @if($product->quantity <= 0) color:orangered; font-weight: bold @endif">{{ $product->name }}</td>
                                <td style="text-align: center">
                                    @if($product->image)
                                        <img
                                            style="width: 150px; height: 150px; object-fit: cover"
                                            src="storage/{{ $product->image }}">
                                    @else
                                        <img style="width: 150px; height: 150px; object-fit: cover"
                                             src="/backend/dist/img/default.jpg">
                                    @endif
                                </td>
                                <td>{{ $product->categories ? $product->categories->name : "Đang cập nhật" }}</td>
                                <td>{{ number_format($product->price) }} VND</td>
                                <td style="text-align: center">{!! $product->quantity !!}</td>
                                <td style="text-align: center">{!! $product->total_sold !!}</td>
                                <td class="text-center">
                                    <ul class="icons-list">
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li><a style="color: #546E7A" href="{{ route('products.edit',$product['_id']) }}" type="submit">
                                                        <i class="fa fa-btn fa-edit"></i>Chỉnh Sửa
                                                    </a></li>
                                                <li class="delete-card"><a
                                                        style="padding-left: 15px;padding-bottom: 10px;padding-top: 5px; color: #F4511E"
                                                        data-id="{{$product['_id']}}"><i
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
                            url: '/products/delete/' + seq,
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
