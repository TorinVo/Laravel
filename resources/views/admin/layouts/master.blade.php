<!DOCTYPE html>
<html>

<head>
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300,400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'>
    <!-- CSS Libs -->
    <link rel="stylesheet" type="text/css" href="{{ url('public/admin/lib/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('public/admin/lib/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('public/admin/lib/css/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('public/admin/lib/css/bootstrap-switch.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('public/admin/lib/css/checkbox3.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('public/admin/lib/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('public/admin/lib/css/dataTables.bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('public/admin/lib/css/select2.min.css') }}">
    <!-- CSS App -->
    <link rel="stylesheet" type="text/css" href="{{ url('public/admin/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('public/admin/css/themes/flat-blue.css') }}">
    <script type="text/javascript" src="{{ url('public/admin/lib/js/jquery.min.js') }}"></script>
</head>

<body class="flat-blue">
    <a href="#" title="" id="div_confirm"></a>
    <div class="app-container">
        <div class="row content-container">
            <nav class="navbar navbar-default navbar-fixed-top navbar-top">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-expand-toggle">
                            <i class="fa fa-bars icon"></i>
                        </button>
                        <ol class="breadcrumb navbar-breadcrumb">
                            <li class="active">Dashboard</li>
                        </ol>

                        <button type="button" class="navbar-right-expand-toggle pull-right visible-xs">
                            <i class="fa fa-th icon"></i>
                        </button>
                    </div>
                    <ul class="nav navbar-nav navbar-right">
                        <button type="button" class="navbar-right-expand-toggle pull-right visible-xs">
                            <i class="fa fa-times icon"></i>
                        </button>
                        <li class="dropdown profile">
                            <a style="border-bottom: 4px solid #FA2A00;" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ auth()->guard('admin')->user()->name }} <span class="caret"></span></a>
                            <ul class="dropdown-menu animated fadeInDown">
                                <li class="profile-img">
                                    <img src="{{ url('public/admin/img/profile/picjumbo.com_HNCK4153_resize.jpg') }}" class="profile-img">
                                </li>
                                <li>
                                    <div class="profile-info">
                                        <h4 class="username">{{ auth()->guard('admin')->user()->name }}</h4>
                                        <p>{{ auth()->guard('admin')->user()->email }}</p>
                                        <div class="btn-group margin-bottom-2x" role="group">
                                            <button type="button" class="btn btn-default"><i class="fa fa-user"></i> Profile</button>
                                            <a href="{{ url('/admin/logout') }}" type="button" class="btn btn-default"><i class="fa fa-sign-out"></i> Logout</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="side-menu sidebar-inverse">
                <nav class="navbar navbar-default" role="navigation">
                    <div class="side-menu-container">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="#">
                                <div class="icon fa fa-paper-plane"></div>
                                <div class="title">Admin Panel</div>
                            </a>
                            <button type="button" class="navbar-expand-toggle pull-right visible-xs">
                                <i class="fa fa-times icon"></i>
                            </button>
                        </div>
                        <ul class="nav navbar-nav">
                            <li @if(isset($cls_active) && $cls_active == "dashboard")) class="active" @endif>
                                <a href="{{ url('/admin') }}">
                                    <span class="icon fa fa-tachometer"></span><span class="title">Dashboard</span>
                                </a>
                            </li>
                            <li @if(isset($cls_active) && $cls_active == "category")) class="active" @endif>
                                <a href="{{ url('/admin/category/') }}">
                                    <span class="icon fa fa-th-list"></span><span class="title">Category</span>
                                </a>
                            </li>
                            <?php
                                $cate_parent = App\Models\Cate::where('parent', 0)->get()->toArray();

                            ?>
                            @if(!empty($cate_parent))
                                @foreach ($cate_parent as $key => $value)
                                    <?php
                                        $cate_child = App\Models\Cate::where('parent', $value['id'])->get()->toArray();
                                    ?>
                                    <li @if(!empty($cate_child)) class="panel panel-default dropdown" @endif>
                                        <a @if(!empty($cate_child)) data-toggle="collapse" href="#dropdown-{!! $key !!}" @else href="" @endif>
                                            <span class="icon fa fa-desktop"></span><span class="title">{!! $value['name'] !!}</span>
                                        </a>
                                        @if(!empty($cate_child))
                                        <!-- Dropdown level 1 -->
                                        <div id="dropdown-{!! $key !!}" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <ul class="nav navbar-nav">
                                                    @foreach ($cate_child as $key_child => $m_child)
                                                    <li>
                                                        <a href="#">{!!$m_child['name']!!}</a>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        @endif
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </nav>
            </div>
            <!-- Main Content -->
            <div class="container-fluid">
                <div class="side-body padding-top">
                    @yield('content')
                </div>
            </div>
        </div>
        <footer class="app-footer">
            <div class="wrapper">
                <span class="pull-right">2.1 <a href="#"><i class="fa fa-long-arrow-up"></i></a></span> © 2015 Copyright.
            </div>
        </footer>
        <div>
        <!-- Javascript Libs -->
        <script type="text/javascript" src="{{ url('public/admin/lib/js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('public/admin/lib/js/Chart.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('public/admin/lib/js/bootstrap-switch.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('public/admin/lib/js/jquery.matchHeight-min.js') }}"></script>
        <script type="text/javascript" src="{{ url('public/admin/lib/js/jquery.dataTables.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('public/admin/lib/js/dataTables.bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('public/admin/lib/js/select2.full.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('public/admin/lib/js/ace/ace.js') }}"></script>
        <script type="text/javascript" src="{{ url('public/admin/lib/js/ace/mode-html.js') }}"></script>
        <script type="text/javascript" src="{{ url('public/admin/lib/js/ace/theme-github.js') }}"></script>
        <script type="text/javascript" src="{{ url('public/admin/js/confirm-bootstrap.js') }}"></script>
        <!-- Javascript -->
        <script type="text/javascript" src="{{ url('public/admin/js/app.js') }}"></script>
        <script type="text/javascript" src="{{ url('public/admin/js/index.js') }}"></script>
        <script type="text/javascript">
            var APP_URL = {!! json_encode(url('/')) !!};
        </script>
</body>

</html>
