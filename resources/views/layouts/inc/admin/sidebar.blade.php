<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="mdi mdi-ticket-percent menu-icon"></i>
                <span class="menu-title">Sales</span>

            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.category.index')}}">
                <i class="mdi mdi-view-headline menu-icon"></i>
                <span class="menu-title">Category</span>
            </a>

        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.product.index')}}">
                <i class="mdi mdi-plus-box menu-icon"></i>
                <span class="menu-title">Products</span>
            </a>

        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.brand.index')}}">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Brands</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.color.index')}}">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Colors</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.slider.index')}}">
                <i class="mdi mdi-view-carousel menu-icon"></i>
                <span class="menu-title">Slider</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <i class="mdi mdi-account-multiple-plus menu-icon"></i>
                <span class="menu-title">User</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/login-2.html"> Login 2 </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/register-2.html"> Register 2 </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/lock-screen.html"> Lockscreen </a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="documentation/documentation.html">
                <i class="mdi mdi-file-document-box-outline menu-icon"></i>
                <span class="menu-title">Documentation</span>
            </a>
        </li>
    </ul>
</nav>
