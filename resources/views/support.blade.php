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
                            She exposed painted fifteen are noisier mistake led waiting. Surprise not wandered speedily
                            husbands although yet end. Are court tiled cease young built fat one man taken. We highest
                            ye friends is exposed equally in. Ignorant had too strictly followed. Astonished as
                            travelling assistance or unreserved oh pianoforte ye. Five with seen put need tore add neat.
                        </div>

                        <div class="panel-footer panel-footer-transparent">
                            <ul>
                                <li class="text-muted">Latest update: May 25, 2015</li>
                            </ul>

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

                        <div class="panel-footer panel-footer-transparent">
                            <ul>
                                <li class="text-muted">Latest update: May 22, 2015</li>
                            </ul>
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

                        <div class="panel-footer panel-footer-transparent">
                            <ul>
                                <li class="text-muted">Latest update: May 12, 2015</li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
