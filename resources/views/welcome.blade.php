<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>API ROCK</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {

                color: #fff;
                font-family: 'Raleway';
                font-weight: 100;
                height: 100vh;
                margin: 0;
                /*background: rgba(20,20,20,1);*/
                /*background: -moz-linear-gradient(-45deg, rgba(20,20,20,1) 0%, rgba(26,26,26,1) 12%, rgba(28,28,28,1) 25%, rgba(20,20,20,1) 39%, rgba(13,13,13,1) 50%, rgba(0,0,0,1) 51%, rgba(5,5,5,1) 60%, rgba(13,13,13,1) 76%, rgba(8,8,8,1) 91%, rgba(5,5,5,1) 100%);*/
                /*background: -webkit-gradient(left top, right bottom, color-stop(0%, rgba(20,20,20,1)), color-stop(12%, rgba(26,26,26,1)), color-stop(25%, rgba(28,28,28,1)), color-stop(39%, rgba(20,20,20,1)), color-stop(50%, rgba(13,13,13,1)), color-stop(51%, rgba(0,0,0,1)), color-stop(60%, rgba(5,5,5,1)), color-stop(76%, rgba(13,13,13,1)), color-stop(91%, rgba(8,8,8,1)), color-stop(100%, rgba(5,5,5,1)));*/
                /*background: -webkit-linear-gradient(-45deg, rgba(20,20,20,1) 0%, rgba(26,26,26,1) 12%, rgba(28,28,28,1) 25%, rgba(20,20,20,1) 39%, rgba(13,13,13,1) 50%, rgba(0,0,0,1) 51%, rgba(5,5,5,1) 60%, rgba(13,13,13,1) 76%, rgba(8,8,8,1) 91%, rgba(5,5,5,1) 100%);*/
                /*background: -o-linear-gradient(-45deg, rgba(20,20,20,1) 0%, rgba(26,26,26,1) 12%, rgba(28,28,28,1) 25%, rgba(20,20,20,1) 39%, rgba(13,13,13,1) 50%, rgba(0,0,0,1) 51%, rgba(5,5,5,1) 60%, rgba(13,13,13,1) 76%, rgba(8,8,8,1) 91%, rgba(5,5,5,1) 100%);*/
                /*background: -ms-linear-gradient(-45deg, rgba(20,20,20,1) 0%, rgba(26,26,26,1) 12%, rgba(28,28,28,1) 25%, rgba(20,20,20,1) 39%, rgba(13,13,13,1) 50%, rgba(0,0,0,1) 51%, rgba(5,5,5,1) 60%, rgba(13,13,13,1) 76%, rgba(8,8,8,1) 91%, rgba(5,5,5,1) 100%);*/
                /*background: linear-gradient(135deg, rgba(20,20,20,1) 0%, rgba(26,26,26,1) 12%, rgba(28,28,28,1) 25%, rgba(20,20,20,1) 39%, rgba(13,13,13,1) 50%, rgba(0,0,0,1) 51%, rgba(5,5,5,1) 60%, rgba(13,13,13,1) 76%, rgba(8,8,8,1) 91%, rgba(5,5,5,1) 100%);*/
                /*filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#141414', endColorstr='#050505', GradientType=1 );*/
          /**/
                background-image: url('{{asset('assets/img/background.jpg')}}');
                background-attachment: fixed;
                background-position: center;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #fff;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    {{--<a href="{{ url('/login') }}">Login</a>--}}
                    {{--<a href="{{ url('/logs') }}">View Log</a>--}}
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                  <strong> API ROCK  </strong>
                </div>

                <div class="links">
                    <a href="{{url('docs')}}">Documentation</a>
                </div>
            </div>
        </div>
    </body>
</html>
