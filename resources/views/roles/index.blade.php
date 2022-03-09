@extends('layouts.master')

@section('title')
    Danh sách quyền
@endsection

@section('content')
    <!-- Content Header -->
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Danh sách quyền</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Chức vụ</a></li>
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
                        <a href="{{route('roles.create')}}" type="submit" style="text-decoration: none; color: white"
                           class="btn btn-success">Tạo mới</a>
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
                                <th>Tên chức vụ</th>
                                <th>Mô tả</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($roles as $role)
                                <tr>
                                    <td>{{$role->name}}</td>
                                    <td>{{$role->description}}</td>
                                    <td>
                                        @if($role['is_protected'] == true)
                                            <a style="display: none" href="" type="submit" class="btn btn-info">
                                                <i class="fa fa-btn fa-edit"></i>Chỉnh Sửa
                                            </a>
                                        @else
                                            <a href="{{ route('roles.update',$role['_id']) }}" type="submit"
                                               class="btn btn-info">
                                                <i class="fa fa-btn fa-edit"></i>Chỉnh Sửa
                                            </a>
                                        @endif
                                    </td>

                                    <!-- //Nút xóa-->
                                    <td>
                                        <form action="{{ route('roles.destroy',$role['_id']) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            @if($role['is_protected'] == true)
                                                <button style="display: none" type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Xoá
                                                </button>
                                            @else
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Xoá
                                                </button>
                                            @endif
                                        </form>
                                    </td>
                                </tr>
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
@endsection
