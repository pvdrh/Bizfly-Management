@extends('layouts.master')

@section('title')
    Danh sách đơn hàng
@endsection

@section('content')
    <!-- Content Header -->
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Danh sách đơn hàng</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Đơn hàng</a></li>
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
                           class="btn btn-secondary">Xuất excel</a>
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right"
                                       placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
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
                                    @endif
                                    <td style="overflow: hidden;white-space: nowrap;text-overflow: ellipsis;max-width: 150px;">{{$order->customers->address}}</td>
                                    <td>{{$order->note}}</td>
                                    <td>{{number_format($order->total) }} VND</td>
                                    <td>{{$order->created_at->format('d-m-Y')}}</td>
                                    @if($order->status == 0)
                                        <td>
                                            <a href="{{route('orders.accept', $order->_id)}}" type="submit"
                                               class="btn btn-success">
                                                <i class="fa fa-btn fa-edit"></i> Duyệt đơn
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{route('orders.cancel', $order->_id)}}" type="submit"
                                               class="btn btn-danger">
                                                <i class="fa fa-btn fa-trash"></i> Huỷ đơn
                                            </a>
                                        </td>
                                    @endif
                                    @if($order->status == 1)
                                        <td>
                                            <a href="{{route('orders.return', $order->_id)}}" type="submit"
                                               class="btn btn-warning">
                                                <i class="fa fa-btn fa-circle-o-notch" aria-hidden="true"></i>Hoàn đơn
                                            </a>
                                        </td>
                                    @endif
                                    @if($order->status == 2)
                                        <td style="text-align: center">
                                            <span
                                                style="padding: 5px; font-weight: bold; background: #f97316;color: white">Đã hoàn</span>
                                        </td>
                                    @endif
                                    @if($order->status == 3)
                                        <td style="text-align: center">
                                            <span
                                                style="padding: 5px; font-weight: bold; background: #ef4444;color: white">Đã hủy</span>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
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
