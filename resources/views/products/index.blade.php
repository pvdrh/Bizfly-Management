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
                </div>
                <div class="table-responsive"> @if(count($products) > 0)
                        <table class="table table-hover">
                            <thead>
                            <tr style="border-bottom: 1px black solid">
                                <th><input type="checkbox" id="check_all"></th>
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
                                    <td><input type="checkbox" name="product_id[]" class="checkbox"
                                               data-id="{{$product->_id}}"></td>
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
                                                    <li><a style="color: #546E7A"
                                                           href="{{ route('products.edit',$product['_id']) }}"
                                                           type="submit">
                                                            <i class="fa fa-btn fa-edit"></i>Chỉnh Sửa
                                                        </a></li>
                                                    <li class="delete-card" data-id="{{$product['_id']}}"><a
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
                    @else
                        <div style="display: flex; justify-content: center">
                            <img style="width: 50%; height: 50%" src="backend/dist/img/social-default.jpg">
                        </div>
                        <h4 style="text-align: center; padding-bottom: 50px">Không có dữ liệu</h4>
                    @endif
                </div>

            </div>
        </div>
    </div>
@section('script')
    <script>
        $(document).ready(function () {
            $('.delete-card').on('click', function () {
                let seq = $(this).data('id')
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

                        $.ajax({
                            type: 'post',
                            url: '/products/delete/' + seq,
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
                            url: "{{route('products.deleteAll')}}",
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
        @if(Session::has('success'))
        toastr.success('{{ Session::get('success') }}');
        @elseif(Session::has('error'))
        toastr.error('{{ Session::get('error') }}');
        @endif
    </script>
@endsection
@endsection
