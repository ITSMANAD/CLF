<!DOCTYPE html>
<html data-theme="light" lang="en" dir="rtl">

<head>
    @foreach($Settings['setting'] as $setting)
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="/plugins/font-awesome/css/font-awesome.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- bootstrap rtl -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <!-- template rtl version -->

    <link rel="stylesheet" href="/dist/css/custom-style.css">
        <link href="https://cdn.jsdelivr.net/npm/daisyui@4.4.19/dist/full.min.css" rel="stylesheet" type="text/css" />
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

        <script src="//cdn.ckeditor.com/4.22.1/full/ckeditor.js"></script>

</head>

<body>
<div class="loader-container">
    <div class="loader"></div>
</div>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom ">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item ">
            <a class="nav-link " data-widget="pushmenu" href="#"><i class="fa fa-bars text-dark"></i></a>
        </li>

    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="جستجو" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Right navbar links -->

</nav>
<!-- /.navbar -->



<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('admin')}}" class="brand-link bg-light">
        <img src="@foreach($Settings['setting'] as $setting) {{$setting['slogo']}} @endforeach" alt="{{$setting['sname']}} Logo" class="brand-image "
             style="opacity: .8">
        <span class="brand-text font-weight-light">{{$setting['sname']}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <div>
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="/assets/img/user.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{Auth::user()->name}}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="{{route('admin')}}" class="nav-link @if(request()->is('admin')) active @endif">
                            <i class="fa fa-circle-o nav-icon"></i>
                            <p>داشبورد</p>
                        </a>
                    </li>
                    <li class="nav-header">محتوا</li>
                    <li class="nav-item has-treeview ">
                        <a href="#" class="nav-link @if(request()->is('admin/categories')) active @endif @if(request()->is('admin/categories/add')) active @endif @if(request()->is('admin/categories/*')) active @endif">
                            <i class="nav-icon fa fa-shopping-cart"></i>
                            <p>
                                فروشگاه
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview" style="display: none;">
                            <li class="nav-item">
                                <a href="{{route('CategorySettings')}}" class="nav-link @if(request()->is('admin/categories')) active @endif @if(request()->is('admin/categories/add')) active @endif">
                                    <i class="fa fa-bookmark nav-icon"></i>
                                    <p>دسته بندی ها</p>
                                </a>
                            </li>
                            <li class="nav-item has-treeview ">
                                <a href="#" class="nav-link @if(request()->is('admin/shop/brands')) active @endif @if(request()->is('admin/shop/brands/add')) active @endif @if(request()->is('admin/shop/brands/edit')) active @endif">
                                    <i class="nav-icon fa fa-bold"></i>
                                    <p>
                                        برند ها
                                        <i class="right fa fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview" style="display: none;">
                                    <li class="nav-item">
                                        <a href="{{route('ShopBrands')}}" class="nav-link @if(request()->is('admin/shop/brands')) active @endif">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>لیست برند ها</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('ShopBrandsAdd')}}" class="nav-link @if(request()->is('admin/shop/brands/add')) active @endif">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>افزودن برند</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item has-treeview ">
                            <li class="nav-item">
                                <a href="{{route('ShopSettings')}}" class="nav-link @if(request()->is('admin/shop/settings')) active @endif">
                                    <i class="fa fa-cubes nav-icon"></i>
                                    <p>محصولات</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('CategorySettings')}}" class="nav-link @if(request()->is('admin/categories')) active @endif @if(request()->is('admin/categories/add')) active @endif">
                                    <i class="fa fa-bookmark nav-icon"></i>
                                    <p>مشخصات محصول</p>
                                </a>
                            </li>
                            
                                <a href="#" class="nav-link @if(request()->is('admin/shop/attributeGroups')) active @endif @if(request()->is('admin/shop/attributeGroups/add')) active @endif @if(request()->is('admin/shop/attributeGroups/attribute')) active @endif">
                                    <i class="nav-icon fa fa-paperclip"></i>
                                    <p>
                                        ویژگی ها
                                        <i class="right fa fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview" style="display: none;">
                                    <li class="nav-item">
                                        <a href="{{route('ShopAttributeGroups')}}" class="nav-link @if(request()->is('admin/shop/attributeGroups')) active @endif @if(request()->is('admin/shop/attributeGroups/add')) active @endif">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>لیست گروه ویژگی ها</p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{route('ShopAttributeAdd')}}" class="nav-link @if(request()->is('admin/shop/attributeGroups/attribute')) active @endif">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>ایجاد ویژگی</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('ShopSettings')}}" class="nav-link @if(request()->is('admin/shop/settings')) active @endif">
                                    <i class="fa fa-cog nav-icon"></i>
                                    <p>تنظیمات فروشگاه</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview ">
                        <a href="#" class="nav-link @if(request()->is('admin/users')) active @endif @if(request()->is('admin/users/add')) active @endif">
                            <i class="nav-icon fa fa-user"></i>
                            <p>
                                کاربران
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview" style="display: none;">
                            <li class="nav-item">
                                <a href="{{route('UsersSettings')}}" class="nav-link @if(request()->is('admin/users')) active @endif">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>لیست کاربران</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('UsersAdd')}}" class="nav-link @if(request()->is('admin/users/add')) active @endif">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>افزودن کاربر</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview ">
                        <a href="#" class="nav-link @if(request()->is('admin/blog/categories')) active @endif @if(request()->is('admin/blog/categories/add')) active @endif @if(request()->is('admin/blog/categories/*')) active @endif">
                            <i class="nav-icon fa fa-rss"></i>
                            <p>
                                وبلاگ
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview" style="display: none;">
                            <li class="nav-item">
                                <a href="{{route('BlogPosts')}}" class="nav-link @if(request()->is('admin/blog/posts')) active @endif ">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>لیست نوشته ها</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('BlogNewPost')}}" class="nav-link @if(request()->is('admin/blog/posts/new')) active @endif ">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>افزودن پست</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('BlogCategory')}}" class="nav-link @if(request()->is('admin/blog/categories')) active @endif ">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>دسته بندی ها</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="nav-header">تنظیمات</li>
                    <li class="nav-item">
                        <a href="{{route('GeneralSettings')}}" class="nav-link @if(request()->is('admin/settings')) active @endif">
                            <i class="fa fa-cog nav-icon"></i>
                            <p>تنظیمات عمومی</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('HomeSettings')}}" class="nav-link @if(request()->is('admin/settings/home')) active @endif">
                            <i class="fa fa-file-image-o nav-icon"></i>
                            <p> ویرایش صفحه اول</p>
                        </a>
                    </li>
                    <li class="nav-header">متفرقه</li>
                    <li class="nav-item">
                        <a href="/" class="nav-link">
                            <i class="fa fa-window-maximize nav-icon"></i>
                            <p> بازدید از سایت</p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
    </div>
    <!-- /.sidebar -->
</aside>


@yield('content')


@endforeach
<!-- REQUIRED SCRIPTS -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<!-- jQuery -->
<script src="/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="/dist/js/demo.js"></script>
<script src="/js/main.js"></script>

<!-- PAGE PLUGINS -->
<!-- SparkLine -->
<script src="/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jVectorMap -->
<script src="/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.2 -->
<script src="/plugins/chartjs-old/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="/dist/js/pages/dashboard2.js"></script>
</body>

</html>
