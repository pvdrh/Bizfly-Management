@extends('layouts.master')

@section('title')
    Danh sách danh mục
@endsection

@section('content')
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Dashboard
                </h4>
            </div>
        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{route('categories.index')}}"><i class="icon-home2 position-left"></i> Quản lý danh
                        mục</a>
                </li>
                <li class="active">Danh sách</li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div style="margin-left: 25px;margin-right: 25px;margin-bottom: 50px" class="panel panel-flat">
                <div class="panel-heading">
                    <a href="{{route('categories.create')}}"
                       style="text-decoration: none; color: white; font-size: 16px; background: #43A047; padding: 7px 10px 7px 10px;"
                    >Thêm mới</a>
                    <!-- Example single danger button -->
                    <div class="btn-group">
                        <a  style="text-decoration: none; margin-bottom: 5px; color: white; font-size: 16px; background: #666666; padding: 7px 10px 7px 10px;" type="button" class="dropdown-toggle" data-bs-toggle="dropdown">
                            Tùy chọn
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Xóa bản ghi đã chọn</a></li>
                        </ul>
                    </div>
                    <div class="heading-elements">
                        <form class="heading-form" action="#">
                            <div class="form-group">
                                <label class="checkbox-inline checkbox-switchery checkbox-right switchery-xs">
                                    <form role="search" method="get" action="{{route('users.index')}}">
                                        <div class="input-group input-group-sm">
                                            <input style="width: 75%" value="{{$cat}}" type="text" name="search"
                                                   class="form-control float-right"
                                                   placeholder="Nhập tên danh mục">
                                            <div class="input-group-append">
                                                <button style="margin-left: 5px" type="submit" class="btn btn-default">
                                                    <i
                                                        class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </label>
                            </div>
                        </form>
                    </div>
                </div>
                @if(count($categories) > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th><input type="checkbox" id="check_all"></th>
                                <th>Tên danh mục</th>
                                <th>Mô tả</th>
                                <th class="text-center">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td ><input type="checkbox" name="category_id[]" class="checkbox" data-id="{{$category->_id}}"></td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->description}}</td>
                                    <td class="text-center">
                                        <ul class="icons-list">
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-right">
                                                    <li><a style="color: #546E7A"
                                                           href="{{ route('categories.edit',$category['_id']) }}"
                                                           type="submit">
                                                            <i class="fa fa-btn fa-edit"></i>Chỉnh Sửa
                                                        </a></li>
                                                    <li data-id="{{$category['_id']}}" class="delete-card"><a
                                                            style="padding-left: 15px;padding-bottom: 10px;padding-top: 5px; color: #F4511E"
                                                        ><i
                                                                class="fa fa-btn fa-trash"></i>
                                                            Xoá
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div style="display: flex; justify-content: center">
                        <img style="width: 50%; height: 50%" src="backend/dist/img/social-default.jpg">
                    </div>
                    <h4 style="text-align: center; padding-bottom: 50px">Không có dữ liệu</h4>
                @endif
            </div>
        </div>
    </div>
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
                            url: '/categories/delete/' + seq,
                            success: function (res) {
                                window.location.reload()
                            },
                        });
                    }
                }).catch(err => {
                    if (err) {
                        swal("Chú Ý!", "Xóa thất bại!", "error");
                    } else {
                        swal.stopLoading();
                        swal.close();
                    }
                })
            });
            $('#check_all').on('click', function(e) {
                if ($(this).is(':checked', true)) {
                    $(".checkbox").prop('checked', true);
                    //$( "#export" ).addClass("export-checkbox");
                } else {
                    $(".checkbox").prop('checked', false);
                    //$( "#export" ).removeClass("export-checkbox");
                }


            });
            $('.delete-all').on('click', function(e) {
                var idsArr = [];
                $(".checkbox:checked").each(function() {
                    idsArr.push($(this).attr('data-id'));
                });
                if (idsArr.length <= 0) {
                    alert("Vui lòng chọn bản ghi bạn muốn xóa");
                } else {
                    var idss = idsArr.length;
                    if (confirm('Bạn có chắc chắn muốn xóa ' + idss + ' bản ghi đã chọn?')) {
                        var strIds = idsArr.join(",");
                        $.ajax({
                            url: "{{route('categories.deleteAll')}}",
                            type: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: 'ids=' + strIds,
                            success: function(data) {
                                console.log(data);
                                if (data['status'] == true) {
                                    $(".checkbox:checked").each(function() {
                                        $(this).parents("tr").remove();
                                        location.reload();
                                    });
                                    alert(data['message']);
                                } else {
                                    alert('Lỗi!!');
                                }

                            },
                            error: function(data) {
                                console.log(data);
                            }
                        });
                    }
                }
            });
        });
    </script>
    <script>
        @if(Session::has('success'))
        toastr.success('{{ Session::get('success') }}');
        @elseif(Session::has('error'))
        toastr.error('{{ Session::get('error') }}');
        @endif
    </script>
@endsection
@endsection
