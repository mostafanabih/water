<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>نسيان كلمة المرور</title>

    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <link href="{{asset('assets/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('assets/company/css/style.css')}}" rel="stylesheet">

</head>

<body class="gray-bg">

<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        <div>
            <h3 class="logo-name"> قطره ماء</h3>
        </div>
        @include('alerts')
        <h3>نسيان كلمة المرور</h3>

        <form action="{{url('/company/forget-password')}}" method="post">
            @csrf
            <label> ادخل رقم الجوال وانتظر الكود الخاص بك </label>

            <div class="form-group ">
                <input name="mobile" type="tel" class="form-control" style="direction: rtl"
                       required placeholder="رقم الجوال هنا ...">
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b"><h3>ارسال</h3></button>
        </form>
    </div>
</div>

<!-- Mainly scripts -->
<script src="{{asset('plugins/js/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('plugins/js/bootstrap.min.js')}}"></script>

</body>

</html>