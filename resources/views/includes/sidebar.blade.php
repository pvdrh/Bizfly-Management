<div style="font-size: 16px; height: 100vh" class="sidebar sidebar-main">
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user">
            <div class="category-content">
                <div class="media">
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
                {{--                    class="active"--}}
                <!-- Main -->
                    </li>
                    <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="{{route('dashboard')}}"><i
                                class="icon-home4"></i>
                            <span>Trang Chủ</span></a></li>
                    <li>
                        <a href="#"><i class="icon-stack2"></i> <span>Sản Phẩm</span></a>
                        <ul>
                            <li class="{{ request()->is('products') ? 'active' : '' }}"><a
                                    href="{{route('products.index')}}">Danh sách</a></li>
                            <li class="{{ request()->is('products/create') ? 'active' : '' }}"><a
                                    href="{{route('products.create')}}">Thêm mới</a></li>
                            <li style="display: none" class="{{ request()->is('products/update/*') ? 'active' : '' }}">
                                <a
                                >Thêm mới</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-copy"></i> <span>Danh Mục</span></a>
                        <ul>
                            <li class="{{ request()->is('categories') ? 'active' : '' }}"><a
                                    href="{{route('categories.index')}}" id="layout1">Danh sách</a></li>
                            <li class="{{ request()->is('categories/create') ? 'active' : '' }}"><a
                                    href="{{route('categories.create')}}" id="layout1">Thêm mới</a></li>
                            <li style="display: none"
                                class="{{ request()->is('categories/edit/*') ? 'active' : '' }}"><a
                                >Thêm mới</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-truck"></i> <span>Đơn Hàng</span></a>
                        <ul>
                            <li class="{{ request()->is('orders') ? 'active' : '' }}"><a
                                    href="{{route('orders.index')}}">Danh sách</a></li>
                            <li class="{{ request()->is('orders/create') ? 'active' : '' }}"><a
                                    href="{{route('orders.create')}}">Thêm mới</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class=" icon-users"></i> <span>Khách Hàng</span></a>
                        <ul>
                            <li class="{{ request()->is('customers') ? 'active' : '' }}"><a
                                    href="{{route('customers.index')}}">Danh sách</a></li>
                            <li class="{{ request()->is('customers/create') ? 'active' : '' }}"><a
                                    href="{{route('customers.create')}}">Thêm mới</a></li>
                            <li style="display: none" class="{{ request()->is('customers/edit/*') ? 'active' : '' }}">
                                <a
                                >Thêm mới</a></li>
                            <li style="display: none" class="{{ request()->is('customers/show/*') ? 'active' : '' }}"><a
                                >Thêm mới</a></li>
                            <li style="display: none" class="{{ request()->is('customers/get-history/*') ? 'active' : '' }}"><a
                                >Thêm mới</a></li>
                            <li style="display: none"
                                class="{{ request()->is('customers/get-list-orders/*') ? 'active' : '' }}"><a
                                >Thêm mới</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class=" icon-office"></i> <span>Công Ty</span></a>
                        <ul>
                            <li class="{{ request()->is('companies') ? 'active' : '' }}"><a
                                    href="{{route('companies.index')}}">Danh sách</a></li>
                            <li class="{{ request()->is('companies/create') ? 'active' : '' }}"><a
                                    href="{{route('companies.create')}}">Thêm mới</a></li>
                            <li style="display: none" class="{{ request()->is('companies/edit/*') ? 'active' : '' }}">
                                <a
                                >Thêm mới</a></li>
                        </ul>
                    </li>
                    @if(\Illuminate\Support\Facades\Auth::user()->info->role == \App\Models\UserInfo::ROLE['admin'])
                        <li>
                            <a href="#"><i class="icon-user"></i> <span>Nhân Viên</span></a>
                            <ul>
                                <li class="{{ request()->is('users') ? 'active' : '' }}"><a
                                        href="{{route('users.index')}}">Danh sách</a></li>
                                <li class="{{ request()->is('users/create') ? 'active' : '' }}"><a
                                        href="{{route('users.create')}}">Thêm mới</a></li>
                                <li style="display: none" class="{{ request()->is('users/update/*') ? 'active' : '' }}">
                                    <a
                                    >Thêm mới</a></li>
                            </ul>
                        </li>
                    @endif
                    <li class="{{ request()->is('support') ? 'active' : '' }}"><a href="{{route('support')}}"><i
                                class="icon-lifebuoy"></i> <span>Hướng dẫn sử dụng</span></a></li>
                    <!-- /main -->
                </ul>
            </div>
        </div>
        <!-- /main navigation -->

    </div>
</div>
