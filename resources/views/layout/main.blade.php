<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=yes">
    <title> Ipigeon </title>
    <!-- Icons -->
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <input type="checkbox" name="" id="sidebar-toggle">

    <div class="sidebar">
        <div class="sidebar-title">
            <img src="{{ asset('img/logo.png') }}" width="40px" alt="" style="background: white; border-radius: 50%">
            <span>Ipigeon</span>
        </div>
        <div class="sidebar-welcome">
            <span>Welcome back, {{Auth::user()->name}}!</span>
            <small>View profile</small>
        </div>

        <div class="sidebar-main">
            <div class="sidebar-menu">
                <div class="menu-head">
                    <span>General</span>
                </div>
                <ul>
                    <?php if (Auth::user()->role->id == 1) { ?>
                    <li>
                        <a href="/dashboard/overview">
                            <span class="las la-tachometer-alt"></span>
                            Dashboard
                        </a>
                    </li>
                    <?php } ?>
                    <?php if (Auth::user()->role->id == 1 || Auth::user()->role->id == 2) { ?>
                    <li>
                        <a href="#" id="order_tab">
                            <span class="las la-clipboard-list"></span>
                            Orders
                        </a>
                         <div class="submenu" id="order_submenu" style="display: none">
                            <a href="/orders/pending"><span class="las la-angle-right"></span>Pending</a>
                            <a href="/orders/completed"><span class="las la-angle-right"></span>Completed</a>
                            <a href="/orders/overview"><span class="las la-angle-right"></span>Overview</a>
                        </div>
                    </li>
                    <?php } ?>
                    <?php if (Auth::user()->role->id == 1 || Auth::user()->role->id == 3) { ?>
                    <li>
                        <a href="/reservations/overview">
                            <span class="las la-calendar"></span>
                            Reservations
                        </a>
                    </li>
                    <?php } ?>
                    <?php if (Auth::user()->role->id == 1) { ?>
                    <li>
                        <a href="/employees/overview">
                            <span class="las la-users"></span>
                            Employees
                        </a>
                    </li>
                    <?php } ?>
                    <?php if (Auth::user()->role->id == 1) { ?>
                    <li>
                        <a href="/products/overview">
                            <span class="las la-cubes"></span>
                            Products
                        </a>
                    </li>
                    <?php } ?>
                    <?php if (Auth::user()->role->id == 1) { ?>
                    <li>
                        <a href="/timesheet/overview/{{\Carbon\Carbon::now()->diffInDays('00-00-0000')}}">
                            <span class="las la-user-clock"></span>
                            Timesheet
                        </a>
                    </li>
                    <?php } ?>
                    <li>
                        <a href="/timesheet/hours/{{\Carbon\Carbon::now()->diffInDays('00-00-0000')}}">
                            <span class="las la-user-clock"></span>
                            My hours
                        </a>
                    </li>
                    <?php if (Auth::user()->role->id == 1) { ?>
                    <li>
                        <a href="/tables/overview">
                            <span class="las la-chair"></span>
                            Tables
                        </a>
                    </li>
                    <?php } ?>
                    <?php if (Auth::user()->role->id == 1) { ?>
                    <li>
                        <a href="/analytics/overview">
                            <span class="las la-chart-bar"></span>
                            Analytics
                        </a>
                    </li>
                    <?php } ?>
                    <?php if (Auth::user()->role->id == 1 || Auth::user()->role->id == 3) { ?>
                    <li>
                        <a href="/payment/overview">
                            <span class="las la-file-invoice-dollar"></span>
                            Payment
                        </a>
                    </li>
                    <?php } ?>
                    <?php if (Auth::user()->role->id == 1) { ?>
                    <li>
                        <a href="/settings/overview">
                            <span class="las la-cog"></span>
                            Settings
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>

    <div class="main-content">
        <div class="overlay"></div>
        <header>
            <div class="menu-toggle">
                <label for="sidebar-toggle">
                    <span class="las la-bars"></span>
                </label>
            </div>
            <div class="header-search">
                <input type="text" name="header-search" placeholder="Start typing to search...">
                <label for="search-key">
                    <span class="las la-search"></span>
                </label>
            </div>
        </header>
        <main>
            @yield('content')
            <div class="box" id="box" style="display: none">
                <b style="margin-right: 20px;">Loading...</b>
                <div class="loader"></div>
            </div>
        </main>
    </div>  
    <label for="sidebar-toggle" class="body-label"></label>

</body>
<script src="{{asset('js/sidebar.js')}}"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{asset('js/main.js')}}"></script>

<?php
$url = explode('/', Request::path());
$module = $url[0];
$sub = $url[1];
//Path to timesheet overview and hours is relative to date, so 
//load the javascript from from the url without the relative date. 
if ($module == 'timesheet' && ($sub == 'overview' || $sub == 'hours')) { ?>
    <script src="{{asset('js/' . $module . '/' . $sub . '.js')}}"></script> <?php
} else if (file_exists(public_path('js/' . Request::path() . '.js'))) { ?>
    <script src="{{asset('js/' . Request::path()) . '.js'}}"></script>
<?php } ?>

@stack('scripts')

</html>