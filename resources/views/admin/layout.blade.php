<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>ApnaStore - Admin Panel</title>

    <!-- Fontfaces CSS-->
    <link href="{{ asset('assets/admin/css/font-face.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('assets/admin/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('assets/admin/vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('assets/admin/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{ asset('assets/admin/vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{ asset('assets/admin/vendor/animsition/animsition.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('assets/admin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('assets/admin/vendor/wow/animate.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('assets/admin/vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('assets/admin/vendor/slick/slick.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('assets/admin/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('assets/admin/vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ asset('assets/admin/css/theme.css') }}" rel="stylesheet" media="all">

</head>

<body class="animsition">
<div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="{{url('admin/dashboard')}}">
                            <h3><i class="zmdi zmdi-shopping-basket"></i>
                                {{Config::get('constants.SITE_NAME')}}</h3>
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                    <li class="has-sub @yield('dashboard_select')">
                            <a class="js-arrow" href="{{url('admin/dashboard')}}">
                                <i class="fas fa-tachometer-alt"></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="has-sub @yield('home_banner_select')">
                            <a class="js-arrow" href="{{url('admin/home_banner')}}">
                                <i class="fa fa-picture-o"></i>
                                HomeBanner
                            </a>
                        </li>
                        <li class="has-sub @yield('category_select')">
                            <a class="js-arrow" href="{{url('admin/category')}}">
                                <i class="fas fa-list"></i>
                                Category
                            </a>
                        </li>
                        <li class="has-sub @yield('size_select')">
                            <a class="js-arrow" href="{{url('admin/size')}}">
                                <i class="fas fa-sort-numeric-desc"></i>
                                Size
                            </a>
                        </li>
                        <li class="has-sub @yield('product_select')">
                            <a class="js-arrow" href="{{url('admin/product')}}">
                                <i class="fa fa-check-square"></i>
                                Product
                            </a>
                        </li>
                        <li class="has-sub @yield('tax_select')">
                            <a class="js-arrow" href="{{url('admin/tax')}}">
                                <i class="fa fa-percent"></i>
                                Tax
                            </a>
                        </li>
                        <li class="has-sub @yield('coupon_select')">
                            <a class="js-arrow" href="{{url('admin/coupon')}}">
                                <i class="zmdi zmdi-card-giftcard"></i>
                                Coupon
                            </a>
                        </li>
                        <li class="has-sub @yield('customer_select')">
                            <a class="js-arrow" href="{{url('admin/customer')}}">
                                <i class="zmdi zmdi-accounts-list"></i>
                                Customer
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="{{url('admin/dashboard')}}">
                    <h3><i class="zmdi zmdi-shopping-basket"></i>
                        {{Config::get('constants.SITE_NAME')}}</h3>
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="has-sub @yield('dashboard_select')">
                            <a class="js-arrow" href="{{url('admin/dashboard')}}">
                                <i class="fas fa-tachometer-alt"></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="has-sub @yield('home_banner_select')">
                            <a class="js-arrow" href="{{url('admin/home_banner')}}">
                                <i class="fa fa-picture-o"></i>
                                HomeBanner
                            </a>
                        </li>
                        <li class="has-sub @yield('category_select')">
                            <a class="js-arrow" href="{{url('admin/category')}}">
                                <i class="fas fa-list"></i>
                                Category
                            </a>
                        </li>
                        <li class="has-sub @yield('size_select')">
                            <a class="js-arrow" href="{{url('admin/size')}}">
                                <i class="fas fa-sort-numeric-desc"></i>
                                Size
                            </a>
                        </li>
                        <li class="has-sub @yield('product_select')">
                            <a class="js-arrow" href="{{url('admin/product')}}">
                                <i class="fa fa-check-square"></i>
                                Product
                            </a>
                        </li>
                        <li class="has-sub @yield('tax_select')">
                            <a class="js-arrow" href="{{url('admin/tax')}}">
                                <i class="fa fa-percent"></i>
                                Tax
                            </a>
                        </li>
                        <li class="has-sub @yield('coupon_select')">
                            <a class="js-arrow" href="{{url('admin/coupon')}}">
                                <i class="zmdi zmdi-card-giftcard"></i>
                                Coupon
                            </a>
                        </li>
                        <li class="has-sub @yield('customer_select')">
                            <a class="js-arrow" href="{{url('admin/customer')}}">
                                <i class="zmdi zmdi-accounts-list"></i>
                                Customer
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                            </form>
                            <div class="header-button">
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="{{ asset('assets/admin/images/icon/avatar-01.jpg') }}" alt="Admin" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">Admin</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="{{ asset('assets/admin/images/icon/avatar-01.jpg') }}" alt="Admin" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">ADMIN</a>
                                                    </h5>
                                                    <span class="email">admin@admin.com</span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-accounts-list"></i>Account</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="{{url('admin/logout')}}">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->
            @section('content')
            @show

            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="{{ asset('assets/admin/vendor/jquery-3.2.1.min.js') }}"></script>
    <!-- Bootstrap JS-->
    <script src="{{ asset('assets/admin/vendor/bootstrap-4.1/popper.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
    <!-- Vendor JS       -->
    <script src="{{ asset('assets/admin/vendor/slick/slick.min.js') }}">
    </script>
    <script src="{{ asset('assets/admin/vendor/wow/wow.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/animsition/animsition.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}">
    </script>
    <script src="{{ asset('assets/admin/vendor/counter-up/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/counter-up/jquery.counterup.min.js') }}">
    </script>
    <script src="{{ asset('assets/admin/vendor/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/chartjs/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/select2/select2.min.js') }}">
    </script>

    <!-- Main JS-->
    <script src="{{ asset('assets/admin/js/main.js') }}"></script>
</body>

</html>
<!-- end document-->
