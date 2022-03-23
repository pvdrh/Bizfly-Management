<div style="font-size: 16px" class="sidebar sidebar-main">
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user">
            <div class="category-content">
                <div class="media">
                    <a href="#" class="media-left"><img src="{{ URL::to('assets/images/placeholder.jpg') }}"
                                                        class="img-circle img-sm" alt=""></a>
                    <div class="media-body">
                        <span
                            class="media-heading text-semibold">{{\Illuminate\Support\Facades\Auth::user()->info->name}}</span>
                        <div class="text-size-mini text-muted">
                            <i class="icon-pin text-size-small"></i>
                            &nbsp;{{\Illuminate\Support\Facades\Auth::user()->info->address}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /user menu -->


        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">

                    <!-- Main -->
                    </li>
                    <li class="active"><a href="{{route('dashboard')}}"><i class="icon-home4"></i>
                            <span>Trang Chủ</span></a></li>
                    <li>
                        <a href="#"><i class="icon-stack2"></i> <span>Sản Phẩm</span></a>
                        <ul>
                            <li><a href="layout_navbar_fixed.html">Fixed navbar</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-copy"></i> <span>Danh Mục</span></a>
                        <ul>
                            <li><a href="index.html" id="layout1">Layout 1 <span
                                        class="label bg-warning-400">Current</span></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-droplet2"></i> <span>Đơn Hàng</span></a>
                        <ul>
                            <li><a href="colors_primary.html">Primary palette</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-stack"></i> <span>Khách Hàng</span></a>
                        <ul>
                            <li><a href="starters/horizontal_nav.html">Horizontal navigation</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-stack"></i> <span>Công Ty</span></a>
                        <ul>
                            <li><a href="starters/horizontal_nav.html">Horizontal navigation</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-stack"></i> <span>Nhân Viên</span></a>
                        <ul>
                            <li><a href="starters/horizontal_nav.html">Horizontal navigation</a></li>
                        </ul>
                    </li>
                    <!-- /main -->
                </ul>
            </div>
        </div>
        <!-- /main navigation -->

    </div>
</div>
