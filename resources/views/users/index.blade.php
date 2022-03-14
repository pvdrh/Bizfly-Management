@extends('layouts.master')

@section('title')
    Danh sách nhân viên
@endsection

@section('content')
    <!-- Content Header -->
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Nhân viên</a></li>
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
                        <a href="{{route('users.create')}}" type="submit" style="text-decoration: none; color: white"
                           class="btn btn-success">Tạo mới</a>
                        <div class="card-tools">
                            <form role="search" method="get" action="{{route('users.index')}}">
                                <div class="input-group input-group-sm">
                                    <input type="text" name="search" class="form-control float-right"
                                           placeholder="Nhập mã nhân viên">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Mã NV</th>
                                <th>Họ tên</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ</th>
                                <th>Giới tính</th>
                                <th>Chức vụ</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    @if($user->info)
                                        <td style="font-weight: bold">{{$user->info->code}}</td>
                                    @endif
                                    <td>{{$user->info->name}}</td>
                                    <td>{{$user->email}}</td>
                                    @if($user->info)
                                        <td>{{$user->info->phone}}</td>
                                        <td>{{$user->info->address}}</td>
                                        @if($user->info->gender == 1)
                                            <td>Nam</td>
                                        @else
                                            <td>Nữ</td>
                                        @endif
                                        @if($user->info->role == 1)
                                            <td>Nhân viên</td>
                                        @else
                                            <td>Admin</td>
                                        @endif
                                    @endif
                                    @if(!$user->info->is_protected)
                                        <td>
                                            <a href="{{ route('users.edit',$user['_id']) }}" type="submit"
                                               class="btn btn-info">
                                                <i class="fa fa-btn fa-edit"></i>Chỉnh Sửa
                                            </a>
                                        </td>

                                        <!-- //Nút xóa-->
                                        <td>
                                            <form action="{{ route('users.destroy',$user['_id']) }}"
                                                  method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Xoá
                                                </button>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                {!! $users->links() !!}
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
