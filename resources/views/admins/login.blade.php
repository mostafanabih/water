<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> صفحه الدخول</title>

    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/bootstrap.rtl.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <link href="{{asset('assets/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

    <style>
        .loginscreen.middle-box{
            width:auto;
        }
    </style>
</head>

<body class="gray-bg">

<div class="middle-box text-center loginscreen animated fadeInDown">
    @include('alerts')
    <div>
        <div>

            <h3 class="logo-name"> قطره ماء</h3>

        </div>
        <h3>اهلا بكم في قطره ماء</h3>

        <p> سجل الدخول الي حسابك   </p>
        <form class="m-t" role="form" action="{{route('post-login')}}" method="post">
            @csrf
            <div class="form-group clearfix">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __(' البريد الالكتروني  ') }}</label>

                <div class="col-md-8">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                {{--<input type="email" class="form-control"style="direction: rtl" placeholder="البريد الالكتروني / رقم الجوال " value="{{ old('email') }}">--}}
            </div>

            <div class="clearfix"></div>
            <div class="form-group  clearfix">
                <div class="col-md-4">
                <label for="password" class="col-form-label text-md-right">{{ __('كلمه المرور ') }}</label>
                </div>
                <div class="col-md-8">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                {{--<input type="password" class="form-control" style="direction: rtl" placeholder="كلمه السر" value="{{ __('Password') }}">--}}
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b"><h3> {{ __('تسجيل الدخول') }}</h3> </button>

            {{--<button class="btn btn-white" data-toggle="modal" data-target="#phone" > هل  نسيت كلمه السر ؟</button>--}}
            {{--<a class="btn btn-white" href="{{ route('password.request') }}">--}}
            {{--{{ __('Forgot Your Password?') }}--}}
            {{--</a>--}}
        </form>
    </div>
</div>
<div class="modal inmodal" id="phone" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="delet modal-content animated bounceInRight" style=" direction:rtl;padding: 1em">
            <form>
                <label> ادخل رقم الجوال وانتظر الكود الخاص بك </label>
                <input type="text" style="direction: rtl" placeholder="ادخل رقم الجوال  " class="form-control" >
                <button class="btn btn-info  text-center" style=" margin-top: 1em"> <a href=""  style="color:inherit; "><a href="password.html" style="color: inherit"> حفظ</a></button>
        </div>
    </div>
</div>
<!-- Mainly scripts -->
<script src="{{asset('assets/js/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

</body>

</html>