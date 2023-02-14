<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        
        <style type="text/css">            
            body {
                font-family: arial, helvetica, sans-serif;
                font-size: 12px;
            }

            nav {
                background: #FFFFFF;
                color: #000000;
            }

            nav a {
                color: #000000;
            }

            ul.pagination {
                background: #FFFFFF;
                float: right !important;
                border: 0px;
            }

            ul.pagination li {
                float: left;
                width: 40px;
            }

            ul.pagination li.active {
                background: #FFFFFF;
            }

            .menu {
                list-style: none;
                border: 0px solid #FFFFFF;
                float: left;
            }

            .menu li {
                position: relative;
                float: left;
                border-right: 0px solid #FFFFFF;
            }

            .menu li a{color:#FFFFFF; text-decoration:none; display:block;}

            .menu li a:hover{
                background:#000000;
                color:#fff;
                -moz-box-shadow:0 3px 10px 0 #000000;
                -webkit-box-shadow:0 3px 10px 0 #000000;
                text-shadow:0px 0px 5px #fff;
            }

            .menu li ul{
                position: absolute;
                top: 63px;
                left: 0;
                display: none;
            }

            .menu li:hover ul, .menu li.over ul{background:#FFF;display:block;}

            .menu li ul li{
                border: 1px solid #000;
                display: block;
                width: 150px;
                height: 50px;
            }

            .menu li ul li a{
                margin: 0;
                padding: 0 0 10px 10px;
                color: #000;
                height: 50px;
            }

            .menu li ul li a:hover{
                background: #FFF;
                color: #000;
            }

            .alert-success{
                border: 1px solid;
                border-radius: 5px;
                padding: 0px 10px;
                background-color: #a5d6a7;
            }

            .alert-danger{
                border: 1px solid;
                border-radius: 5px;
                padding: 0px 10px;
                background-color: #ef5350;
            }
            
        </style>

    </head>
    <body class="antialiased">
        
        @component('components.menu')
        @endcomponent

        <div class="row container">
            @yield('content')
        </div>

        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script type="text/javascript">
            (function($){
                $(function(){
                    $('select').formSelect();
                });
            })(jQuery);
        </script>      
    </body>
</html>
