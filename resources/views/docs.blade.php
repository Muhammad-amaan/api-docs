<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        API ROCK / Docs
    </title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">
    <link href="{{asset('assets/json/jquery.json-view.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/cover/main.css" rel="stylesheet">
    <link href="assets/cover/croppic.css" rel="stylesheet">

    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

    <style>
        html, body{
            background: #f6f6f6;
        }
        .right-border{
            border-right:1px solid #ccc;
        }
        .bottom-border{
            border-bottom:1px solid #ccc;
        }
        .card-panel {
            transition: box-shadow .25s;
            padding: 20px;
            margin: 15px 0px;
            border-radius: 2px;
            background-color: #fff;
        }
        .sidebar h6{
            color: #adadad;
        }
        .sidebar ol > li{
            font-size: 14px;

        }
        .sidebar ol > li > a{
           color: #000;
            padding: 3px;
        }

        .api-content .content-frame{
            padding: 10px;
            border: 3px solid #eaeaea;
            border-radius: 4px;
            box-shadow: 0px 0px 2px #272525;
        }
        .api-content .content-frame p{
            margin: 5px 0px;
        }
        .content-frame .collapsible {
            border-top: none;
            border-right: none;
            border-left: none;
            margin: .5rem 0 1rem 0;
            background-color: transparent;
            box-shadow: none;
        }

    </style>

</head>

<body>
<header>
    <nav class="blue darken-4">
        <div class="container">
        <div class="nav-wrapper">
            <a href="#" class="brand-logo">API Rock</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                {{--<li><a href="sass.html">Amaan</a></li>--}}
                <li>
                    <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                </li>
            </ul>
            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>
        </div>
    </nav>
</header>

<!-- Page Content goes here -->
<div class="row" style="">


    <div class="container">


        {{--<h4 class="centered"> Minimal Controls </h4>--}}
        {{--<p class="centered">( define the controls available )</p>--}}
        <div id="cropContainerMinimal"></div>


        <div class="card-panel">
            <div class="row">
                <div class="col s3 right-border">
                    <!-- Promo Content 1 goes here -->
                    <div class="sidebar">
                        <h6>AUTHENTICATION</h6>
                         <ol>
                             <li> <a href="#"> SignUp </a> </li>
                             <li> <a href="#"> Login </a> </li>
                             <li> <a href="#"> Logout </a> </li>
                         </ol>

                        <h6>AUTHENTICATION</h6>
                        <ol>
                            <li> <a href="#"> SignUp </a> </li>
                            <li> <a href="#"> Login </a> </li>
                            <li> <a href="#"> Logout </a> </li>
                        </ol>

                        <h6>AUTHENTICATION</h6>
                        <ol>
                            <li> <a href="#"> SignUp </a> </li>
                            <li> <a href="#"> Login </a> </li>
                            <li> <a href="#"> Logout </a> </li>
                        </ol>

                    </div>

                </div>
                <div class="col s9">
                    <!-- Promo Content 2 goes here -->
                    <h5 style="padding-bottom: 15px;" class="bottom-border">Page Title</h5>

                    <p>
                        Most of the API endpoints require authentication. So you need to log in to gain a valid token and then add that in the following requests through the header Authentication: TokenType Token:

                    </p>

                    <div class="api-content">

                        <h6>Header</h6>
                        <div class="content-frame">
                            <p>
                                Lorem ipsum dollar sit amet.
                            </p>
                        </div>
                        <p> </p>
                        <h6>Response</h6>
                        <div class="content-frame" id="jsonResponse">

                        </div>

                    </div>

                </div>
            </div>


        </div>

    </div>

</div>
<!-- Page Content end here -->

<!-- Compiled and minified JavaScript -->
{{--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>--}}
<script src=" https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
<script src="{{asset('assets/json/jquery.json-view.js')}}"></script>

<script>
    $(function() {
        $('#jsonResponse').jsonView(JSON.stringify({demo: 'string',notSet: null,zero: 0,'true': true,'false': false}));
    });
</script>


</body>

</html>