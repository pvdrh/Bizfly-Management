@extends('layouts.master')

@section('title')
    Danh sách sản phẩm
@endsection

@section('content')

    <!-- Content Header -->
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Danh sách sản phẩm</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
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
                        <a href="{{route('products.create')}}" type="submit" style="text-decoration: none; color: white"
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
                                <th style="text-align: center">Tên sản phẩm</th>
                                <th style="text-align: center">Ảnh</th>
                                <th>Danh mục</th>
                                <th>Giá bán</th>
                                <th style="text-align: center">Số lượng</th>
                                <th style="text-align: center">Đã bán</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td style="overflow: hidden;white-space: nowrap;text-overflow: ellipsis;max-width: 200px;text-align: center">{{ $product->name }}</td>
                                    <td style="text-align: center">
                                        @if($product->image)
                                            <img
                                                style="width: 150px; height: 150px; object-fit: cover"
                                                src="storage/{{ $product->image }}">
                                        @else
                                            <img    style="width: 150px; height: 150px; object-fit: cover" src="/backend/dist/img/default.jpg">
                                        @endif
                                    </td>
                                    <td>{{ $product->category_id }}</td>
                                    <td>{{ number_format($product->price) }} VND</td>
                                    <td style="text-align: center">{!! $product->quantity !!}</td>
                                    <td style="text-align: center">{!! $product->total_sold !!}</td>
                                    <td>
                                        <a href="{{route('products.edit',$product->id)}}" type="submit"
                                           class="btn btn-info">
                                            <i class="fa fa-btn fa-edit"></i>Chỉnh Sửa
                                        </a>
                                    </td>

                                    <!-- //Nút xóa-->
                                    <td>
                                        <form action="{{ route('products.destroy',$product['id']) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-btn fa-trash"></i>Xoá
                                            </button>
                                        </form>
                                    </td>
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
