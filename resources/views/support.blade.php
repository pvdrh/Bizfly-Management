@extends('layouts.master')

@section('title')
    Câu Hỏi Thường Gặp
@endsection

@section('content')
    <div class="page-header">
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{route('support')}}"><i class="icon-home2 position-left"></i> Hướng dẫn sử dụng</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <h2 style="font-weight: 500; font-size: 24px; margin-bottom: 50px !important;"
                class="text-center content-group">
                Chào mừng bạn đến trang hướng dẫn
            </h2>

            <div style="margin-left: 25px;margin-right: 25px;margin-bottom: 50px"
                 class="panel-group panel-group-control panel-group-control-right">
                <div class="panel panel-white">
                    <div class="panel-heading">
                        <h6 class="panel-title">
                            <a class="collapsed" data-toggle="collapse" href="#question1">
                                <i class="icon-help position-left text-slate"></i> Đơn Hàng
                            </a>
                        </h6>
                    </div>

                    <div id="question1" class="panel-collapse collapse">
                        <div class="panel-body">
                            <h4 style="font-weight: bold">Trạng thái đơn hàng</h4>
                            <div style="padding: 20px">
                                <img src="{{ URL::to('assets/images/pending.png') }}">
                                <p><span style="font-weight: bold">Chờ duyệt:</span> đơn hàng vừa tạo có thể duyệt đơn hoặc hủy đơn.</p>
                            </div>
                            <hr>
                            <div style="padding: 20px">
                                <img src="{{ URL::to('assets/images/cancel.png') }}">
                                <p><span style="font-weight: bold">Đã hủy:</span> đơn hàng ở trạng thái đang chờ đã bị hủy. Đơn hàng đã hủy không thể thay đổi trạng thái.</p>
                            </div>
                            <hr>
                            <div style="padding: 20px">
                                <img src="{{ URL::to('assets/images/approve.png') }}">
                                <p><span style="font-weight: bold">Đã duyệt:</span> đơn hàng ở trạng thái đang chờ đã được duyệt. Đơn hàng đã duyệt có thể chuyển sang trạng thái hoàn đơn.</p>
                            </div>
                            <hr>
                            <div style="padding: 20px">
                                <img src="{{ URL::to('assets/images/return.png') }}">
                                <p><span style="font-weight: bold">Đã hoàn:</span> đơn hàng từ trạng thái đã duyệt bị hoàn trả. Đơn hàng đã hoàn không thể thay đổi trạng thái.</p>
                            </div>
                            <br>
                            <h4 style="font-weight: bold">Nhập file excel</h4>
                            <p>File excel tải lên cần phải theo mẫu</p>
                            <p style="font-size: 14px"><i>Lưu ý: Mã khách hàng không được để trống</i></p>
                        </div>
                    </div>
                </div>

                <div class="panel panel-white">
                    <div class="panel-heading">
                        <h6 class="panel-title">
                            <a class="collapsed" data-toggle="collapse" href="#question2">
                                <i class="icon-help position-left text-slate"></i> Chức Vụ
                            </a>
                        </h6>
                    </div>

                    <div id="question2" class="panel-collapse collapse">
                        <div class="panel-body">
                            There worse by an of miles civil. Manner before lively wholly am mr indeed expect. Among
                            every merry his yet has her. You mistress get dashwood children off. Met whose marry under
                            the merit. In it do continual consulted no listening. Devonshire sir sex motionless
                            travelling six themselves. So colonel as greatly shewing herself observe ashamed.
                        </div>
                    </div>
                </div>

                <div class="panel panel-white">
                    <div class="panel-heading">
                        <h6 class="panel-title">
                            <a class="collapsed" data-toggle="collapse" href="#question3">
                                <i class="icon-help position-left text-slate"></i> Khách Hàng
                            </a>
                        </h6>
                    </div>

                    <div id="question3" class="panel-collapse collapse">
                        <div class="panel-body">
                            Do ashamed assured on related offence at equally totally. Use mile her whom they its. Kept
                            hold an want as he bred of. Was dashwood landlord cheerful husbands two. Estate why theirs
                            indeed him polite old settle though she. In as at regard easily narrow roused adieus.
                            Parlors visited noisier how explain pleased his see suppose. He oppose at thrown desire.
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
