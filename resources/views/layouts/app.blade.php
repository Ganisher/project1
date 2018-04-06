<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" >
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >

    <link href="{{ asset('css/AdminLTE.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/skins/_all-skins.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootflat.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="skin-blue-light maschina-site">
<div class="wrapper">
    <!-- Main Header -->
    <header class="main-header">
        <!-- Logo -->
        <a href="{{ route('/') }}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>LT</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Admin</b>LTE</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    @auth
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            {{--<img src="https://almsaeedstudio.com/themes/AdminLTE/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">--}}
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs">{{ Auth::user()->username }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                {{--<img src="https://almsaeedstudio.com/themes/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">--}}

                                <p>
                                    {{ Auth::user()->username }}
                                    {{--Alexander Pierce - Web Developer--}}
                                    {{--<small>Member since Nov. 2012</small>--}}
                                </p>
                            </li>
                            <!-- Menu Body -->
                            {{--<li class="user-body">--}}
                                {{--<div class="row">--}}
                                    {{--<div class="col-xs-4 text-center">--}}
                                        {{--<a href="#">Followers</a>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-xs-4 text-center">--}}
                                        {{--<a href="#">Sales</a>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-xs-4 text-center">--}}
                                        {{--<a href="#">Friends</a>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<!-- /.row -->--}}
                            {{--</li>--}}
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                {{--<div class="pull-left">--}}
                                    {{--<a href="#" class="btn btn-default btn-flat">Profile</a>--}}
                                {{--</div>--}}
                                <div class="pull-right">
                                    <a href="#" class="btn btn-default btn-flat" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Sign out
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </li>
                    @endauth
                </ul>
            </div>
        </nav>
    </header>
    @auth
    <aside class="main-sidebar">
        <section class="sidebar">
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">Администрирование</li>
                <li class="drivers treeview">
                    <a href="#">
                        <i class="fa fa-car"></i> <span>Водители</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="drivers-submenu treeview-menu">
                        <li class="@if(\Request::route()->getName() == 'drivers.form') active @endif"><a href="{{ route('drivers.form') }}">Добавить водителя</a></li>
                        <li class="@if(\Request::route()->getName() == 'drivers') active @endif"><a href="{{ route('drivers') }}">Список водителей</a></li>
                        <li class="@if(\Request::route()->getName() == 'drivers.cars') active @endif"><a href="{{ route('drivers.cars') }}">Автомобили</a></li>
                    </ul>
                </li>
                <li class="header">Отчеты</li>
                <li class="treeview">
                    <a href="#">
                        <span>Штрафы</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('drivers.penalties') }}">Список водителей и штрафы</a></li>
                        <li><a href="{{ route('drivers.penaltiesCheckForm') }}">Проверить штраф</a></li>
                    </ul>
                </li>
                <li class="installments treeview">
                    <a href="#">
                        <span>Рассрочка</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="installments-submenu treeview-menu">
                        <li><a href="{{ route('installments.payments') }}">Выплаты по рассрочкам</a></li>
                        <li><a href="{{ route('installments.upload') }}">Загрузка рассрочки на выкуп</a></li>
                    </ul>
                </li>
            </ul>
        </section>
    </aside>
    @endauth
    <div class="content-wrapper">
        @yield('content')
    </div>
</div>
<!-- Scripts -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/jquery-ui.min.js') }}"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="{{ asset('js/adminlte.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/bootstrap-notify.min.js') }}"></script>
<script>
    @if(strpos(\Request::route()->getName(), 'drivers') !== false)
        $('.drivers').addClass('menu-open');
        $('.drivers-submenu').css('display', 'block');
    @endif

    @if(strpos(\Request::route()->getName(), 'installments') !== false)
    $('.installments').addClass('menu-open');
    $('.installments-submenu').css('display', 'block');
    @endif
</script>
@yield('scripts')
</body>
</html>
