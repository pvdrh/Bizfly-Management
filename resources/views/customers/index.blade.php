@extends('layouts.master')

@section('title')
    Danh sách khách hàng
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
                    <li class="breadcrumb-item"><a href="#">Khách hàng</a></li>
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
                        <a href="{{route('customers.create')}}" type="submit"
                           style="text-decoration: none; color: white"
                           class="btn btn-success">Tạo mới</a>
                        <a href="{{route('customers.export')}}" type="submit"
                           style="text-decoration: none; color: white"
                           class="btn btn-info">Xuất file excel
                        </a>
                        <button type="button" class="btn btn-secondary" data-toggle="modal"
                                data-target="#exampleModalCenter">
                            Nhập file excel
                        </button>
                        <div class="card-tools">
                            <form role="search" method="get" action="{{route('customers.index')}}">
                                <div class="input-group input-group-sm">
                                    <input type="text" name="search" class="form-control float-right"
                                           placeholder="Nhập tên khách hàng">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i>
                                        </button>
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
                                <th>Họ tên</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ</th>
                                <th>Phân loại</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($customers as $customer)
                                <tr>
                                    <td><span
                                            class="d-inline-block" tabindex="0" data-bs-toggle="tooltip"
                                            title="Chi tiết khách hàng">
  <a style="font-weight: bold; color: cornflowerblue"
     href="{{route('customers.show', $customer->_id)}}">{{$customer->name}}</a>
</span>
                                    </td>
                                    <td>{{$customer->email}}</td>
                                    <td>{{$customer->phone}}</td>
                                    <td>{{$customer->address}}</td>
                                    @if($customer->customer_type == 0)
                                        <td>Khách lạ</td>
                                    @else
                                        <td>Khách hàng thân thiết</td>
                                    @endif
                                    <td>{{$customer->role_id}}</td>
                                    <td>
                                        <a href="{{ route('customers.edit',$customer['_id']) }}" type="submit"
                                           class="btn btn-info">
                                            <i class="fa fa-btn fa-edit"></i>Chỉnh Sửa
                                        </a>
                                    </td>

                                    <!-- //Nút xóa-->
                                    <td>
                                        <form action="{{ route('customers.destroy',$customer['_id']) }}"
                                              method="POST">
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
                {!! $customers->links() !!}
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row (main row) -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <form role="form" method="post" enctype="multipart/form-data"
                  action="{{ route('customers.import') }}">
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
    </div><!-- /.container-fluid -->
@section('script')
    <script>
        @if(Session::has('success'))
        toastr.success('{{ Session::get('success') }}');
        @elseif(Session::has('error'))
        toastr.error('{{ Session::get('error') }}');
        @endif
    </script>

    <script>
        var fileInput = document.getElementById('exampleInputFile');
        var listFile = document.getElementById('list_file');

        fileInput.onchange = function () {
            var files = Array.from(this.files);
            files = files.map(file => file.name);
            listFile.innerHTML = files.join('<br/>');
        }
    </script>
@endsection
@endsection
