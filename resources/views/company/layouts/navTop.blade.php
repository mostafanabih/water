<div class="row border-bottom">
    <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i>
            </a>
        </div>
        <ul class="nav navbar-top-links navbar-right  " style="margin-right: 1em">
            <li class="dropdown">
                <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                    <i class="fa fa-bell"></i> <span class="label label-primary">2</span>
                </a>
                <ul class="dropdown-menu dropdown-alerts notify_scrollable" style="">
                    @forelse(auth()->guard('company')->user()->Company->notifications as $notify)
                        <li class="custom_notify">
                            <div>
                                <span class="pull-right text-muted small">{{\Carbon\Carbon::parse($notify->created_at)->diffForHumans()}}</span><br>
                                <i class="fa fa-lightbulb-o"></i>&nbsp;{{$notify->data['text']}}
                            </div>
                        </li>
                    @empty
                        <li>
                            <div>
                                <span class="text-center">لا يوجد اشعارت حتى الأن</span>
                            </div>
                        </li>
                    @endforelse
                </ul>
            </li>
        </ul>
        <ul class="nav navbar-top-links navbar-left">
            <li>
                <a href="{{url('/company/logout')}}">
                    <i class="fa fa-sign-out"></i>خروج
                </a>
            </li>

        </ul>
    </nav>
</div>