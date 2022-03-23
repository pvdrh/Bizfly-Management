@extends('layouts.master')

@section('title')
    Quản Lý Bán Hàng
@endsection

@section('content')
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Dashboard
                </h4>
            </div>
        </div>

        {{--        <div class="breadcrumb-line">--}}
        {{--            <ul class="breadcrumb">--}}
        {{--                <li><a href="{{route('users.index')}}"><i class="icon-home2 position-left"></i> Quản lý nhân viên</a>--}}
        {{--                </li>--}}
        {{--                <li class="active">Danh sách</li>--}}
        {{--            </ul>--}}
        {{--        </div>--}}
    </div>
    <div style="padding: 20px" class="row">
        <div class="col-lg-3">
            <!-- Members online -->
            <div class="panel bg-teal-400">
                <div class="panel-body">
                    @if($categories)
                        <h3 class="no-margin">{{$categories}}</h3>
                    @else
                        <h3 class="no-margin">0</h3>
                    @endif
                    Danh mục
                </div>
            </div>
            <!-- /members online -->
        </div>
        <div class="col-lg-3">
            <!-- Current server load -->
            <div style="border: none" class="panel bg-purple-400">
                <div class="panel-body">
                    @if($orders)
                        <h3 class="no-margin">{{$orders}}</h3>
                    @else
                        <h3 class="no-margin">0</h3>
                    @endif
                    Đơn hàng
                </div>
            </div>
            <!-- /current server load -->
        </div>
        <div class="col-lg-3">
            <!-- Today's revenue -->
            <div class="panel bg-orange-400">
                <div class="panel-body">
                    @if($customers)
                        <h3 class="no-margin">{{$customers}}</h3>
                    @else
                        <h3 class="no-margin">0</h3>
                    @endif
                    Khách hàng
                </div>
            </div>
            <!-- /today's revenue -->
        </div>
        <div class="col-lg-3">
            <!-- Today's revenue -->
            <div class="panel bg-blue-400">
                <div class="panel-body">
                    @if($products)
                        <h3 class="no-margin">{{$products}}</h3>
                    @else
                        <h3 class="no-margin">0</h3>
                    @endif
                    Sản phẩm
                </div>
            </div>
            <!-- /today's revenue -->
        </div>
    </div>

@section('script')
    <script>
        @if(Session::has('warning'))
        toastr.warning('{{ Session::get('warning') }}');
        @endif
    </script>
@endsection
@endsection
