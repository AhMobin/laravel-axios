<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Abu Horaira Mobin">

    <title>@yield('title')</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="{{ asset('layout/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('layout/css/mdb.min.css') }}">
    <link rel="stylesheet" href="{{ asset('layout/css/sidenav.css') }}">
    <link rel="stylesheet" href="{{ asset('layout/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('layout/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('layout/css/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('layout/css/datatables-select.min.css') }}">

</head>
<body class="fix-header fix-sidebar">

@includeIf('master.menu')

@yield('content')



</div>
</div>


<script type="text/javascript" src="{{ asset('layout/js/jquery-3.4.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('layout/js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('layout/js/bootstrap.js')}}"></script>
<script type="text/javascript" src="{{ asset('layout/js/mdb.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('layout/js/jquery.slimscroll.js') }}"></script>
<script type="text/javascript" src="{{ asset('layout/js/sidebarmenu.js') }}"></script>
<script type="text/javascript" src="{{ asset('layout/js/sticky-kit.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('layout/js/custom.min-2.js') }}"></script>
<script type="text/javascript" src="{{ asset('layout/js/datatables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('layout/js/datatables-select.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('layout/js/axios.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('layout/js/custom.js')}}"></script>

@yield('script')

</body>
</html>
