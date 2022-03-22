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
                    <li class="breadcrumb-item"><a href="{{route('customers.index')}}">Khách hàng</a></li>
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
                           class="btn btn-info">Xuất excel
                        </a>
                        <button type="button" class="btn btn-secondary" data-toggle="modal"
                                data-target="#exampleModalCenter">
                            Nhập excel
                        </button>
                        <div class="card-tools">
                            <form role="search" method="get" action="{{route('customers.index')}}">
                                <div class="input-group input-group-sm">
                                    <input value="{{$cus_name}}" type="text" name="search"
                                           class="form-control float-right"
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
                    @if(count($customers) > 0)
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover table-borderless">
                                <thead>
                                <tr style="border-bottom: 1px black solid">
                                    <th>ID</th>
                                    <th>Họ tên</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>
                                    <th>Địa chỉ</th>
                                    <th>Phân loại</th>
                                    <th style="text-align: center">Hành động</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($customers as $customer)
                                    <tr>
                                        <td>{{$customer->_id}}</td>
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
                                        <td>{{$customer->customer_type}} </td>
                                        <td style="text-align: center">
                                            <a href="{{ route('customers.edit',$customer['_id']) }}" type="submit"
                                               class="btn btn-info">
                                                <i class="fa fa-btn fa-edit"></i>Chỉnh Sửa
                                            </a>
                                            <span data-id="{{$customer['_id']}}"
                                                  class="btn btn-danger delete-card"> <i
                                                    class="fa fa-btn fa-trash"></i> Xoá</span>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div style="height: 60vh; position: relative">
                            <img
                                style="height: 350px; width: 50%; object-fit: cover; top: 50%; left: 50%; margin: 0 auto;padding: 20px"
                                src="/backend/dist/img/social-default.jpg">
                            <p style="text-align: center; font-size: 20px">Không có dữ liệu</p>
                        </div>
                @endif
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
                            <p>Tải file excel mẫu <a href="{{route('customers.export-sample')}}"><u
                                        style="color: #4974b4">tại đây</u></a></p>
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
        $(document).ready(function () {
            $('.delete-card').on('click', function () {
                swal({
                    title: "Chú Ý",
                    text: "Bạn có chắc chắn muốn xóa?",
                    icon: "warning",
                    buttons: ["Đóng", "OK"],
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        let seq = $(this).data('id')
                        $.ajax({
                            type: 'post',
                            url: '/customers/delete/' + seq,
                            success: function (res) {
                                window.location.reload()
                            }
                        });
                    }
                }).catch(err => {
                    if (err) {
                        swal("Chú Ý!", "Xóa thất bại!", "error");
                    } else {
                        swal.stopLoading();
                        swal.close();
                    }
                });
            })
        });
    </script>
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
