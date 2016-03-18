<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie ie6 no-js" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 no-js" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 no-js" lang="en"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 no-js" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" lang="en"><!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <title>
            @section('title')
                GlobaL Trading
            @show
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link rel="stylesheet" type="text/css" href="{{ url('public/user/css/bootstrap.min.css') }}">
        <link href="{{ url('public/user/css/revolution-slider.css')}}" rel="stylesheet">
        <link href="{{ url('public/user/css/style.css')}}" rel="stylesheet">
    </head>   
    <body>
        <div class="preloader"></div>
        <!-- Main Menu -->
        @include('layouts.menu_fixed_top')
        
        <!-- Main Slider -->
        @include('layouts.slider')

        <!-- Main Container -->
        @yield('content')
        
        <!--Main Footer-->
        @include('layouts.footer')
    </body>
</html>