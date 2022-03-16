@extends('layouts.master')

@section('title')
    Danh sách đơn hàng
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
                    <li class="breadcrumb-item"><a href="{{route('orders.index')}}">Đơn hàng</a></li>
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
                        <a href="{{route('orders.create')}}" type="submit" style="text-decoration: none; color: white"
                           class="btn btn-success">Tạo mới</a>
                        <a href="{{route('orders.export')}}" type="submit" style="text-decoration: none; color: white"
                           class="btn btn-info">Xuất excel</a>
                        <button type="button" class="btn btn-secondary" data-toggle="modal"
                                data-target="#exampleModalCenter">
                            Nhập file excel
                        </button>
                        <div class="card-tools">
                            <form role="search" method="get" action="{{route('orders.index')}}">
                                <div class="input-group input-group-sm">
                                    <input type="text" name="search" class="form-control float-right"
                                           placeholder="Nhập mã đơn hàng">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="form-group col-2">

                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Code</th>
                                <th>Tên khách hàng</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ</th>
                                <th>Ghi chú</th>
                                <th>Thành tiền</th>
                                <th>Thời gian đặt hàng</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td style="font-weight: bold">{{$order->code}}</td>
                                    @if($order->customers)
                                        <td>{{$order->customers->name}}</td>
                                        <td>{{$order->customers->phone}}</td>
                                    <td style="overflow: hidden;white-space: nowrap;text-overflow: ellipsis;max-width: 150px;">{{$order->customers->address}}</td>
                                    @endif
                                    <td>{{$order->note}}</td>
                                    <td>{{number_format($order->total) }} VND</td>
                                    <td>{{$order->created_at->format('d-m-Y')}}</td>
                                    @if($order->status == 0)
                                        <td>
                                            <a style="width: 125px" href="{{route('orders.accept', $order->_id)}}"
                                               type="submit"
                                               class="btn btn-success">
                                                <i class="fa fa-btn fa-edit"></i> Duyệt đơn
                                            </a>
                                        </td>
                                        <td>
                                            <a style="width: 125px" href="{{route('orders.cancel', $order->_id)}}"
                                               type="submit"
                                               class="btn btn-danger">
                                                <i class="fa fa-btn fa-trash"></i> Huỷ đơn
                                            </a>
                                        </td>
                                    @endif
                                    @if($order->status == 1)
                                        <td>
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
                                                     width="21" height="21" fill="currentColor" class="bi bi-box-seam"
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
                                            <a style="width: 125px; color: white; cursor: not-allowed" href="#"
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
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                {!! $orders->links() !!}
                <!-- /.card-body -->
                </div>
                <!-- /.card -->
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
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
@section('script')
    <script>
        @if(Session::has('success'))
        toastr.success('{{ Session::get('success') }}');
        @elseif(Session::has('error'))
        toastr.error('{{ Session::get('error') }}');
        @endif
    </script>
@endsection
@endsection
