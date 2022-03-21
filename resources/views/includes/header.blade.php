<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li>
            <form role="form" class="row" action="{{ route('logout') }}" method="post">
                @csrf
                <div class="col-md-4">
                </div>
                <button type="submit" class="btn btn-outline-secondary">Đăng Xuất</button>
            </form>
        </li>
    </ul>
</nav>
