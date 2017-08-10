<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('/backend/assets/images/favicon_1.ico')}}">
    <title>{{ config('blog.title') }}</title>
    <link href="{{ asset('/backend/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/backend/assets/css/core.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/backend/assets/css/icons.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/backend/assets/css/components.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/backend/assets/css/pages.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/backend/assets/css/menu.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/backend/assets/css/responsive.css')}}" rel="stylesheet" type="text/css">
    <script src="{{ asset('/backend/assets/js/modernizr.min.js')}}"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <style>
        body{
            background: none !important;
        }

        html{
            background: url(http://techrusk.menthub.com/uploads/2016-09-12-1-free-blurred-backgrounds.png);
            background-size: cover;
            background-position: center center;
        }
    </style>
</head>

<body>
<div class="wrapper-page">
    @yield('content')
</div>
<script>
    var resizefunc = [];
</script>
<!-- Main  -->
<script src="{{ asset('/backend/assets/js/jquery.min.js')}}"></script>
<script src="{{ asset('/backend/assets/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('/backend/assets/js/detect.js')}}"></script>
<script src="{{ asset('/backend/assets/js/fastclick.js')}}"></script>
<script src="{{ asset('/backend/assets/js/jquery.slimscroll.js')}}"></script>
<script src="{{ asset('/backend/assets/js/jquery.blockUI.js')}}"></script>
<script src="{{ asset('/backend/assets/js/waves.js')}}"></script>
<script src="{{ asset('/backend/assets/js/wow.min.js')}}"></script>
<script src="{{ asset('/backend/assets/js/jquery.nicescroll.js')}}"></script>
<script src="{{ asset('/backend/assets/js/jquery.scrollTo.min.js')}}"></script>
<script src="{{ asset('/backend/assets/js/jquery.app.js')}}"></script>
</body>
</html>
