@extends('layouts.master')

@section('title')
    Danh sách đơn hàng
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
                <li><a href="{{route('orders.index')}}"><i class="icon-home2 position-left"></i> Quản lý đơn hàng</a>
                </li>
                <li class="active">Danh sách</li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div style="margin-left: 25px;margin-right: 25px;margin-bottom: 50px"
                 class="panel panel-flat">
                <div class="panel-heading">
                    <div class="btn-group">
                        <a style="text-decoration: none; margin-bottom: 5px; color: white; font-size: 16px; background: #546E7A; padding: 7px 10px 7px 10px;"
                           type="button" class="dropdown-toggle" data-bs-toggle="dropdown">
                            <svg style="display: inline" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                                <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                                <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
                            </svg> Tùy chọn
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a style="color: #039BE5" href="{{route('orders.create')}}">
                                    <svg style="display: inline" xmlns="http://www.w3.org/2000/svg" width="16"
                                         height="16" fill="currentColor" class="bi bi-file-earmark-plus-fill"
                                         viewBox="0 0 16 16">
                                        <path
                                            d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM8.5 7v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 1 0z"/>
                                    </svg>
                                    Thêm mới</a>
                            </li>
                            <li><a  data-toggle="modal"
                                    data-target="#exampleModalCenter" style="color: #f59e0b">
                                    <svg style="display: inline" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-plus-fill" viewBox="0 0 16 16">
                                        <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM8.5 6v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 1 0z"/>
                                    </svg>
                                    Nhập excel</a></li>
                            <li>
                            <li><a style="color: green" href="{{route('orders.export')}}">
                                    <svg style="display: inline" xmlns="http://www.w3.org/2000/svg" width="16"
                                         height="16" fill="currentColor" class="bi bi-file-earmark-excel-fill"
                                         viewBox="0 0 16 16">
                                        <path
                                            d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM5.884 6.68 8 9.219l2.116-2.54a.5.5 0 1 1 .768.641L8.651 10l2.233 2.68a.5.5 0 0 1-.768.64L8 10.781l-2.116 2.54a.5.5 0 0 1-.768-.641L7.349 10 5.116 7.32a.5.5 0 1 1 .768-.64z"/>
                                    </svg>
                                    Xuất excel</a></li>
                            <li>
                                <a style="color: red" class="dropdown-item delete-all">
                                    <svg style="display: inline" xmlns="http://www.w3.org/2000/svg" width="16"
                                         height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                    </svg>
                                    Xóa bản ghi đã chọn</a>
                            </li>
                        </ul>
                    </div>
                </div>
                @if(count($orders) > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th><input type="checkbox" id="check_all"></th>
                                <th>Code</th>
                                <th>Tên khách hàng</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ</th>
                                <th>Ghi chú</th>
                                <th>Thành tiền</th>
                                <th>Thời gian đặt hàng</th>
                                <th style="text-align: center">Trạng thái</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td><input type="checkbox" name="order_id[]" class="checkbox"
                                               data-id="{{$order->_id}}"></td>
                                    <td style="font-weight: bold">{{$order->code}}</td>
                                    @if($order->customers)
                                        <td>{{$order->customers->name}}</td>
                                    @else
                                        <td>Đang cập nhật</td>
                                    @endif
                                    @if($order->customers)
                                        <td>{{$order->customers->phone}}</td>
                                    @else
                                        <td>Đang cập nhật</td>
                                    @endif
                                    @if($order->customers)
                                        <td style="overflow: hidden;white-space: nowrap;text-overflow: ellipsis;max-width: 150px;">{{$order->customers->address}}</td>
                                    @else
                                        <td>Đang cập nhật</td>
                                    @endif
                                    <td>{{$order->note}}</td>
                                    <td>{{number_format($order->total) }} VND</td>
                                    <td>{{$order->created_at->format('d-m-Y')}}</td>
                                    @if($order->product_id)
                                        {{--                                        Chuyển trạng thái đơn hàng--}}
                                        @if($order->status == 0)
                                            <td style="text-align: center">
                                                <a style="width: 125px"
                                                   href="{{route('orders.accept', $order->_id)}}"
                                                   type="submit"
                                                   class="btn btn-success">
                                                    <i class="fa fa-btn fa-edit"></i> Duyệt đơn
                                                </a>
                                                <a style="width: 125px"
                                                   href="{{route('orders.cancel', $order->_id)}}"
                                                   type="submit"
                                                   class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i> Huỷ đơn
                                                </a>
                                            </td>
                                        @endif
                                        @if($order->status == 1)
                                            <td style="text-align: center">
                                                <a style="width: 125px; color: white"
                                                   href="{{route('orders.return', $order->_id)}}" type="submit"
                                                   class="btn btn-warning">
                                                    <svg style="display: inline" xmlns="http://www.w3.org/2000/svg"
                                                         width="21" height="21" fill="currentColor"
                                                         class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd"
                                                              d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
                                                        <path
                                                            d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
                                                    </svg>
                                                    Hoàn đơn
                                                </a>
                                            </td>
                                        @endif
                                        @if($order->status == 2)
                                            <td style="text-align: center">
                                                <a style="width: 125px; color: white; cursor: not-allowed" href="#"
                                                   type="submit"
                                                   class="btn btn-info">
                                                    <svg style="display: inline" xmlns="http://www.w3.org/2000/svg"
                                                         width="21" height="21" fill="currentColor"
                                                         class="bi bi-box-seam"
                                                         viewBox="0 0 16 16">
                                                        <path
                                                            d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/>
                                                    </svg>
                                                    </i> Đã hoàn
                                                </a>
                                            </td>
                                        @endif
                                        @if($order->status == 3)
                                            <td style="text-align: center">
                                                <a style="width: 125px; color: white; cursor: not-allowed; background: #666666"
                                                   href="#"
                                                   class="btn btn-secondary">
                                                    <svg style="display: inline" xmlns="http://www.w3.org/2000/svg"
                                                         width="21" height="21" fill="currentColor"
                                                         class="bi bi-backspace-reverse" viewBox="0 0 16 16">
                                                        <path
                                                            d="M9.854 5.146a.5.5 0 0 1 0 .708L7.707 8l2.147 2.146a.5.5 0 0 1-.708.708L7 8.707l-2.146 2.147a.5.5 0 0 1-.708-.708L6.293 8 4.146 5.854a.5.5 0 1 1 .708-.708L7 7.293l2.146-2.147a.5.5 0 0 1 .708 0z"/>
                                                        <path
                                                            d="M2 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h7.08a2 2 0 0 0 1.519-.698l4.843-5.651a1 1 0 0 0 0-1.302L10.6 1.7A2 2 0 0 0 9.08 1H2zm7.08 1a1 1 0 0 1 .76.35L14.682 8l-4.844 5.65a1 1 0 0 1-.759.35H2a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h7.08z"/>
                                                    </svg>
                                                    </i> Đã hủy
                                                </a>
                                            </td>
                                        @endif
                                    @endif
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
              action="{{ route('orders.import') }}">
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
                        <p>Tải file excel mẫu <a href="{{route('orders.export-sample')}}"><u style="color: #4974b4">tại
                                    đây</u></a></p>
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
                            url: "{{route('orders.deleteAll')}}",
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
