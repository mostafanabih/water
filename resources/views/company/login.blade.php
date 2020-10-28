<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> تسجيل الدخول</title>

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
            <h3>تسجيل الدخول  </h3>

            <form action="{{route('login-company')}}" method="post">
            @csrf
            <div class="form-group ">
                <input type="text" class="form-control @error('number') is-invalid @enderror"  style="direction: rtl" placeholder="اسم المستخدم" required="" name="user_name">
                @error('number')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input type="password" class="form-control " style="direction: rtl" placeholder="  كلمه السر" required="" name="password">
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b"><a href="login.html" style="color: inherit"><h3> سجل الدخول </h3></a></button>
            <button class="btn btn-white" data-toggle="modal" data-target="#phone"> هل  نسيت كلمه السر ؟</button>
            <button class="btn btn-info" data-toggle="modal" data-target="#phone"> <a href="{{url('company/register')}}" style="color: inherit">انشا حساب جديد </a></button>
            </form>
        </div>
    </div>
    <div class="modal inmodal" id="phone" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="delet modal-content animated bounceInRight" style=" direction:rtl;padding: 1em">
                <form>
                    <label> ادخل رقم الجوال وانتظر الكود الخاص بك </label>
                    <input type="text" style="direction: rtl" placeholder="ادخل رقم الجوال  " class="form-control" >
                    <button class="btn btn-info  text-center" style=" margin-top: 1em"> <a href="password.html" style="color: inherit"> حفظ</a></button>
                </form>
            </div>
        </div>
    </div>

<!-- Mainly scripts -->
<script src="{{asset('plugins/js/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('plugins/js/bootstrap.min.js')}}"></script>

</body>

</html>