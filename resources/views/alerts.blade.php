<div class="col-md-12 col-xs-12">
    {{--@if(request('msg'))--}}
        {{--<div class="flash alert alert-danger" align="center" role="alert">يجب تسجيل الدخول أولا حتى تتم العملية--}}
            {{--بنجاح--}}
        {{--</div>--}}
    {{--@endif--}}
    @if(session('error'))
        <div class="flash alert alert-danger" align="center" role="alert">{{ session('error') }}</div>
    @endif
    @if(session('success'))
        <div class="flash alert alert-success" align="center" role="alert">{{ session('success') }}</div>
    @endif
    {{--@if(session('resend'))--}}
        {{--<div class="alert alert-danger" align="center" role="alert">--}}
            {{--{{ session('resend').' ... ' }}<a class="color-light-blue"--}}
                                              {{--href="{{ url('/resend_active_code/'.session('msg1')) }}">التفعيل--}}
                {{--الان</a>--}}
        {{--</div>--}}
    {{--@endif--}}
    @if ($errors->any())
        <div class="text-center alert alert-danger">
            <ul class="list-unstyled">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>