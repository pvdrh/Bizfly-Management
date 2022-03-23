<div class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{route('dashboard')}}"><img src="{{ URL::to('assets/images/logo_light.png') }}" alt=""></a>

        <ul class="nav navbar-nav visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
            <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>
    </div>

    <div class="navbar-collapse collapse" id="navbar-mobile">
        <ul class="nav navbar-nav">
            <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a>
            </li>
        </ul>

        <p class="navbar-text"><span class="label bg-success-400">Online</span></p>

        <ul class="nav navbar-nav navbar-right">

            <li class="dropdown dropdown-user">
                <a class="dropdown-toggle" data-toggle="dropdown">
                    <span>{{\Illuminate\Support\Facades\Auth::user()->info->name}}</span>
                    <i class="caret"></i>
                </a>

                <ul class="dropdown-menu dropdown-menu-right">
                    <li>
                        <form role="form" class="row" action="{{ route('logout') }}" method="post">
                            @csrf
                            <button style="display: flex; margin: 0 auto"><i class="icon-switch2"></i> Đăng xuất</button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
