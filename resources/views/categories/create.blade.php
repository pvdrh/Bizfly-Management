@extends('layouts.master')

@section('title')
    Thêm mới danh mục
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
                <li class="active">Thêm mới</li>
            </ul>
        </div>
    </div>
    <div class="col-lg-12">
        <div style="margin-left: 15px;margin-right: 15px;margin-bottom: 50px" class="panel panel-flat">
            {{--            <div class="panel-heading">--}}
            {{--                <h5 class="panel-title">Thông tin nhân viên</h5>--}}
            {{--            </div>--}}
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="post" action="{{ route('categories.store') }}">
                    @csrf
                    <fieldset class="content-group">
                        <div class="form-group">
                            <label class="control-label col-lg-2">Tên danh mục<span style="color: red">*</span>:</label>
                            <div class="col-lg-10">
                                <input value="{{old('name')}}" type="text" name="name" class="form-control"
                                       placeholder="Nhập tên danh mục">
                                @error('name')
                                <span style="color: red; font-size: 14px">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-2">Mô tả:</label>
                            <div class="col-lg-10">
                                <input value="{{old('description')}}" type="text" name="description"
                                       class="form-control"
                                       placeholder="Nhập mô tả">
                                @error('description')
                                <span style="color: red; font-size: 14px">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </fieldset>
                    <div style="float: right">
                        <a style="font-size: 16px" href="{{ route('categories.index') }}" class="btn btn-danger">Huỷ
                            bỏ</a>
                        <button style="font-size: 16px" type="submit" class="btn btn-success">Tạo mới</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
