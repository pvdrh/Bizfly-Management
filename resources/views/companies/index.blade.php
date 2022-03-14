@extends('layouts.master')

@section('title')
    Danh sách công ty
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
                    <li class="breadcrumb-item"><a href="#">Công ty</a></li>
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
                        <a href="{{route('companies.create')}}" type="submit"
                           style="text-decoration: none; color: white"
                           class="btn btn-success">Tạo mới</a>
                        <div class="card-tools">
                            <form role="search" method="get" action="{{route('companies.index')}}">
                                <div class="input-group input-group-sm">
                                    <input type="text" name="search" class="form-control float-right"
                                           placeholder="Nhập tên công ty">
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
                                <th>Tên công ty</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($companies as $company)
                                <tr>
                                    <td>{{$company->name}}</td>
                                    <td>{{$company->phone}}</td>
                                    <td>{{$company->address}}</td>
                                    <td>
                                        <a href="{{ route('companies.edit',$company['_id']) }}" type="submit"
                                           class="btn btn-info">
                                            <i class="fa fa-btn fa-edit"></i>Chỉnh Sửa
                                        </a>
                                    </td>

                                    <!-- //Nút xóa-->
                                    <td>
                                        <form action="{{ route('companies.destroy',$company['_id']) }}"
                                              method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-btn fa-trash"></i>Xoá
                                            </button>
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
