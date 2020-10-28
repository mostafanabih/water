<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    {{--{{ config('Laravel', 'app.name') }}--}}
    <title>  Water - Dashboard Company | @yield('title') </title>

    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/bootstrap.rtl.min.css')}}" rel="stylesheet">

    <link href="{{asset('assets/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style-rtl.css')}}" rel="stylesheet">
    {{--<link href="{{asset('assets/css/new-style.css')}}" rel="stylesheet">--}}

    @yield('style')

    <style>
        .notify_scrollable
        {
            max-height: 550px;
            overflow-y:auto;
        }
    </style>
</head>

<body class="gray-bg">
    <div id="wrapper" style="background: #2f4050">
        @include('company.layouts.nav')



        <div id="page-wrapper" class="gray-bg">
            @include('company.layouts.navTop')
            @yield('content')
        </div>
    </div>



<!-- Mainly scripts -->
    <script src="{{asset('assets/js/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

    <script src="{{asset('assets/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
    <script src="{{asset('assets/js/inspinia.js')}}"></script>

    <script src="{{asset('assets/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>



@yield('script')
</body>

</html>