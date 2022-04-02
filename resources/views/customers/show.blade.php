@extends('layouts.master')

@section('title')
    Thông tin khách hàng
@endsection

@section('content')
    <div class="page-header">
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{route('orders.index')}}"><i class="icon-home2 position-left"></i> Quản lý khách hàng</a>
                </li>
                <li class="active">Chi tiết khách hàng</li>
            </ul>
        </div>
    </div>
    <div style="margin-left: 25px;margin-right: 25px;margin-bottom: 50px" class="card">
        <!-- /.card-header -->
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div style="padding: 20px" class="card-header">
                <a href="{{route('customers.get-list-orders', $customer->_id)}}" type="submit"
                   style="text-decoration: none; color: white; font-size: 14px"
                   class="btn btn-success">Đơn hàng</a>
                <a href="{{route('customers.history', $customer->_id)}}" type="submit"
                   style="text-decoration: none; color: white; font-size: 14px; background: gray"
                   class="btn">Lịch sử cập nhật</a>
            </div>
            <div class="border-t border-gray-200">
                <dl>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class=" text-gray-500">Tên khách hàng</dt>
                        <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">{{$customer->name}}</dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class=" text-gray-500">Địa chỉ</dt>
                        <dd class="mt-1  text-gray-900 sm:mt-0 sm:col-span-2">{{$customer->address}}</dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class=" text-gray-500">Email</dt>
                        <dd class="mt-1  text-gray-900 sm:mt-0 sm:col-span-2">{{$customer->email}}</dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class=" text-gray-500">Số điện thoại</dt>
                        <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">{{$customer->phone}}</dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class=" text-gray-500">Giới tính</dt>
                        <dd class="mt-1  text-gray-900 sm:mt-0 sm:col-span-2">@if($customer->gender == 0)
                                Nữ @else Nam @endif</dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class=" text-gray-500">Phân loại</dt>
                        <dd class="mt-1  text-gray-900 sm:mt-0 sm:col-span-2">@if($customer->customer_type == 0)
                                Khách lạ @else Khách hàng thân thiết @endif</dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-gray-500">Tuổi</dt>
                        <dd class="mt-1text-gray-900 sm:mt-0 sm:col-span-2">{{$customer->age}}
                        </dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-gray-500">Nghề nghiệp</dt>
                        <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">{{$customer->job}}</dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class=" text-gray-500">Nhân viên hỗ trợ</dt>
                        @foreach($users as $user)
                            @if($user->info)
                                {{$user->info->name}}<br>
                            @endif
                        @endforeach
                    </div>
                </dl>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection
