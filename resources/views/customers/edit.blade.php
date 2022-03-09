{{--@extends('layouts.master')--}}

{{--@section('title')--}}
{{--    Thêm mới nhân viên--}}
{{--@endsection--}}

{{--@section('content')--}}
{{--    <!-- Content Header -->--}}
{{--    <div class="container-fluid">--}}
{{--        <div class="row mb-2">--}}
{{--            <div class="col-sm-6">--}}
{{--                <h1 class="m-0 text-dark">Thêm mới nhân viên</h1>--}}
{{--            </div><!-- /.col -->--}}
{{--            <div class="col-sm-6">--}}
{{--                <ol class="breadcrumb float-sm-right">--}}
{{--                    <li class="breadcrumb-item"><a href="#">Home</a></li>--}}
{{--                    <li class="breadcrumb-item"><a href="#">Nhân viên</a></li>--}}
{{--                    <li class="breadcrumb-item active">Tạo mới</li>--}}
{{--                </ol>--}}
{{--            </div><!-- /.col -->--}}
{{--        </div><!-- /.row -->--}}
{{--    </div><!-- /.container-fluid -->--}}
{{--    <!-- Content -->--}}
{{--    <div class="container-fluid">--}}
{{--        <!-- Main row -->--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-12">--}}
{{--                <!-- general form elements -->--}}
{{--                <div class="card">--}}
{{--                    <!-- /.card-header -->--}}
{{--                    <!-- form start -->--}}
{{--                    <form role="form" method="post" action="{{route('users.update',$user->id)}}">--}}
{{--                        @csrf--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="exampleInputEmail1">Tên nhân viên</label>--}}
{{--                                <input type="text" name="name" value="{{$user->name}}" class="form-control" id=""--}}
{{--                                       placeholder="Nhập tên nhân viên">--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="exampleInputEmail1">Email</label>--}}
{{--                                <input type="email" name="email" value="{{$user->email}}" class="form-control" id=""--}}
{{--                                       placeholder="Email">--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="exampleInputEmail1">Số điện thoại</label>--}}
{{--                                <input type="text" name="phone" value="{{$user->phone}}" class="form-control" id="">--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="exampleInputEmail1">Địa chỉ</label>--}}
{{--                                <input type="text" name="address" value="{{$user->address}}" class="form-control" id="" placeholder="Nhập địa chỉ">--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label>Giới tính</label>--}}
{{--                                <select class="form-control select2" name="gender" style="width: 100%;">--}}
{{--                                    <option value="1" @if($user->gender == 1) selected @endif>Nam</option>--}}
{{--                                    <option value="0" @if($user->gender == 0) selected @endif>Nữ</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label>Quyền</label>--}}
{{--                                <select class="form-control  select2" name="role_id" style="width: 100%;">--}}
{{--                                    @foreach($role as $role)--}}
{{--                                        <option value="{{ $role->id }}"--}}
{{--                                                @if($role->id == $user->role_id) selected @endif>{{ $role->name }}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- /.card-body -->--}}

{{--                        <div class="card-footer">--}}
{{--                            <a href="{{route('users.index')}}" class="btn btn-danger">Huỷ bỏ</a>--}}
{{--                            <button type="submit" class="btn btn-success">Tạo mới</button>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!-- /.row (main row) -->--}}
{{--    </div><!-- /.container-fluid -->--}}
{{--@endsection--}}
