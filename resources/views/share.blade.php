<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'My Notes') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&family=Shalimar&display=swap" rel="stylesheet">

    <style>
        .not {
            font-size: 18px;
            font-family: 'Shalimar', cursive;

            border: 1px solid #EEEEEE;
            box-shadow: 1px 1px 0 #DDDDDD;
            display: block;
            margin: 2% auto;
            padding: 11px 20px 0 70px;
            resize: none;
            height: 689px;
            width: 530px;

            background-image: -moz-linear-gradient(top , transparent, transparent 49px,#E7EFF8 0px);
            background-image: -webkit-linear-gradient(top , transparent, transparent 49px,#E7EFF8 0);

            -webkit-background-size:  100% 50px;
            background-size: 100% 50px;

        }
    </style>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="container">
   <div class="row">
       <div class="col-6">
           <div class="img-fluid">
               <img src="{{asset('/uploads/'.$image)}}">
           </div>
       </div>
       <div class="col-6">
           <div class="not" style="padding-top:18px; font-size: 40px; line-height: 48px">
               {{$note}}
           </div>
       </div>
   </div>

</div>
</body>
</html>

