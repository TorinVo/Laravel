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
</head>

<body class="flat-blue login-page">
    <div class="container">
        @yield('content')
    </div>
    <!-- Javascript Libs -->
    <script type="text/javascript" src="{{ url('public/admin/lib/js/jquery.min.js') }}"></script>
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
    <!-- Javascript -->
    <script type="text/javascript" src="{{ url('public/admin/js/app.js') }}"></script>
</body>

</html>
