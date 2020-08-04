<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,400;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link href="{{asset('layout/css/bootstrap.min.css')}}" rel="stylesheet" >
    <link href="{{asset('layout/css/mdb.min.css')}}" rel="stylesheet" >
    <link href="{{asset('layout/css/sidenav.css')}}" rel="stylesheet" >
    <link href="{{asset('layout/css/style.css')}}" rel="stylesheet" >
    <link href="{{asset('layout/css/responsive.css')}}" rel="stylesheet" >
    <link href="{{asset('layout/css/datatables.min.css')}}" rel="stylesheet" >
    <link href="{{asset('layout/css/datatables-select.min.css')}}" rel="stylesheet" >
</head>
<body>




@yield('content')






</div>
</div>
<script type="text/javascript" src="{{asset('layout/js/jquery-3.4.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('layout/js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('layout/js/bootstrap.js')}}"></script>
<script type="text/javascript" src="{{asset('layout/js/mdb.min.js')}}"></script>
<script type="text/javascript" src="{{asset('layout/js/jquery.slimscroll.js')}}"></script>
<script type="text/javascript" src="{{asset('layout/js/sidebarmenu.js')}}"></script>
<script type="text/javascript" src="{{asset('layout/js/sticky-kit.min.js')}}"></script>
<script type="text/javascript" src="{{asset('layout/js/custom.min-2.js')}}"></script>
<script type="text/javascript" src="{{asset('layout/js/datatables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('layout/js/datatables-select.min.js')}}"></script>

<script type="text/javascript" src="{{asset('layout/js/custom.js')}}"></script>
<script type="text/javascript" src="{{asset('layout/js/axios.min.js')}}"></script>


@yield('script')

</body>
</html>
