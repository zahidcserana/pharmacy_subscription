<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>SPE Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="SPE Admin">
    <meta name="msapplication-tap-highlight" content="no">
    <link href="css/main.css" rel="stylesheet">
    
    <script type="text/javascript" src="assets/scripts/chart.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header header-shadow">
            <div class="app-header__logo">
                <div class="logo-src"></div>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                </button>
                </span>
            </div>
            <div class="app-header__content">
                <div class="app-header-left">
                    <ul class="header-menu nav">
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}" class="nav-link">
                                <i class="nav-link-icon fa fa-home"> </i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('spe-list') }}" class="nav-link">
                                <i class="nav-link-icon fa fa-file-alt"> </i> SP List
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user-list') }}" class="nav-link">
                                <i class="nav-link-icon fa fa-address-book"> </i> User List
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('change-request') }}" class="nav-link">
                                <i class="nav-link-icon fa fa-list"> </i> Change Request
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('coupon') }}" class="nav-link">
                                <i class="nav-link-icon fa fa-barcode"> </i> Coupon
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('monthly-bill') }}" class="nav-link">
                                <i class="nav-link-icon fa fa-dollar-sign"> </i> Monthly Billing
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="btn-group">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                            <img width="42" class="rounded-circle" src="assets/images/avatars/13.png" alt="">
                                            <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                        </a>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="nav-link dropdown-menu-right"><i class="mdi mdi-home"></i>User Account</a>
                                            <a href="{{ route('logout') }}" class="nav-link dropdown-menu-right"><i class="mdi mdi-home"></i>Logout</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content-left  ml-3 header-user-info">
                                    <div class="widget-heading">
                                        {{ Auth::user()->name }}
                                    </div>
                                    <div class="widget-subheading">
                                        {{ Auth::user()->designation }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-main">
            <div class="app-sidebar sidebar-shadow">
                <div class="app-header__logo">
                    <div class="logo-src"></div>
                    <div class="header__pane ml-auto">
                        <div>
                            <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="app-header__mobile-menu">
                    <div>
                        <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                            <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="app-header__menu">
                    <span>
                      <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                          <span class="btn-icon-wrapper">
                              <i class="fa fa-ellipsis-v fa-w-6"></i>
                          </span>
                      </button>
                    </span>
                </div>
                <div class="scrollbar-sidebar">
                    <div class="app-sidebar__inner">
                        <ul class="vertical-nav-menu">
                            <li class="app-sidebar__heading">Menu</li>
                            <li>
                                <a href="{{ route('dashboard') }}">
                                    <i class="metismenu-icon pe-7s-home"></i> Dashboard
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('spe-list') }}">
                                    <i class="metismenu-icon pe-7s-note2"></i> SP List
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('user-list') }}">
                                    <i class="metismenu-icon pe-7s-users"></i> User List
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('change-request') }}">
                                    <i class="metismenu-icon pe-7s-note"></i> Change Request
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('coupon') }}">
                                    <i class="metismenu-icon pe-7s-notebook"></i> Coupon
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('monthly-bill') }}">
                                    <i class="metismenu-icon pe-7s-credit"></i> Monthly Billing
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="app-main__outer">
                <div class="app-main__inner">
                    @yield('content')
                </div>
                <div class="app-wrapper-footer">
                    <div class="app-footer">
                        <div class="app-footer__inner">
                            <div class="app-footer-right">
                                <ul class="nav">
                                    <li class="nav-item">
                                        <a href="javascript:void(0);" class="nav-link">Copyright © SPE 2019</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="assets/scripts/main.js"></script>
</body>
</html>