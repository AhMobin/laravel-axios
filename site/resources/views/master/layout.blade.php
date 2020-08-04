<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Abu Horaira Mobin">

    <title>@yield('title')</title>

    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('layout/css/bootstrap.min.css') }}" rel="stylesheet" >
    <link href="{{ asset('layout/css/custom.css') }}" rel="stylesheet" >
    <link href="{{ asset('layout/css/responsive.css') }}" rel="stylesheet" >
    <link href="{{ asset('layout/css/owl.carousel.min.css') }}" rel="stylesheet" >
    <link href="{{ asset('layout/css/fontawesome.css') }}" rel="stylesheet" >
    <link href="{{ asset('layout/css/animate.css') }}" rel="stylesheet" >

</head>
<body>

@includeIf('master.menu')

@yield('content')

@includeIf('master.footer')

<script type="text/javascript" src="{{ asset('layout/js/jquery-3.4.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('layout/js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('layout/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('layout/js/owl.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('layout/js/axios.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('layout/js/custom.js')}}"></script>

</body>
</html>
