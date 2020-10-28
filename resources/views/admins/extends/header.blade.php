<body>
<div id="wrapper" style="background: #2f4050">
    <nav class="navbar-default navbar-static-side" role="navigation" >
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"><span>
                    {{--<img alt="image" class="img-circle" src="{{}}"/>--}}
                     </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">قطره ماء</strong></span> </span> </a>
                    </div>
                    <div class="logo-element">قطره ماء</div>
                </li>
                <li @if(Request::path() == 'admin') class="active" @endif>
                    <a href="{{route('admin')}}" > <i class="fa fa-th-large"></i> <span class="nav-label"> الرئيسيه</span></a>
                </li>
                <li @if(in_array(Request::path(), ['admin/company','admin/company_register','admin/representative','admin/commission'])) class="active" @endif>
                    <a><i class="fa fa-bank"></i> <span class="nav-label">الشركات</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level {{( request()->segment(2) =="company" || request()->segment(2) =="company_register" || request()->segment(2) =="commission" ) ?? "collapse"}} ">
                        <li @if(Request::path() == 'admin/company') class="active" @endif>
                            <a href="{{url('admin/company')}}"> عرض الشركات    </a>
                        </li>
                        <li @if(Request::path() == 'admin/company_register') class="active" @endif>
                            <a href="{{url('admin/company_register')}}"> طلبات التسجيل  </a>
                        </li>
                        <li @if(Request::path() == 'admin/representative') class="active" @endif>
                            <a href="{{url('admin/representative')}}">المندوبين  </a>
                        </li>
                        <li @if(Request::path() == 'admin/commission') class="active" @endif>
                            <a href="{{url('admin/commission')}}">عمليات سداد العموله   </a>
                        </li>
                    </ul>
                </li>
                <li @if(Request::path() == 'admin/product') class="active" @endif>
                    <a href="{{url('admin/product')}}" ><i class="fa fa-database"></i> <span class="nav-label">المنتجات</span></a>
                </li>
                <li @if(Request::path() == 'admin/client') class="active" @endif>
                    <a href="{{url('admin/client')}}"> <i class="fa fa-group"></i> <span class="nav-label"> العملاء</span></a>
                </li>
                <li @if(Request::path() == 'admin/order') class="active" @endif>
                    <a href="{{url('admin/order')}}"> <i class="fa fa-cubes"></i> <span class="nav-label"> الطلبات</span></a>
                </li>
                <li @if(in_array(Request::path(), ['admin/companyaccount','admin/representativeaccount'])) class="active" @endif>
                    <a href=""><i class="fa fa-calendar"></i> <span class="nav-label">كشف حسابات </span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level ">
                        <li @if(Request::path() == 'admin/companyaccount') class="active" @endif>
                            <a href="{{url('admin/companyaccount')}}"> كشف حسابات الشركات  </a>
                        </li>
                        <li @if(Request::path() == 'admin/representativeaccount') class="active" @endif>
                            <a href="{{url('admin/representativeaccount')}}">كشف حسابات المندوبين  </a>
                        </li>
                    </ul>
                </li>
                <li @if(Request::path() == 'admin/coupon') class="active" @endif>
                    <a href="{{url('admin/coupon')}}"> <i class="fa fa-empire"></i> <span class="nav-label"> الكوبونات  </span></a>
                </li>
                <li @if(Request::path() == 'admin/value-added') class="active" @endif>
                    <a href="{{url('admin/value-added')}}"> <i class="fa fa-money"></i> <span class="nav-label"> تقرير القيمة المضافة </span></a>
                </li>
                <li @if(Request::path() == 'admin/notices') class="active" @endif>
                    <a href="{{url('admin/notices')}}"> <i class="fa fa-podcast"></i> <span class="nav-label"> الاشعارات </span></a>
                </li>
                <li @if(Request::path() == 'admin/page') class="active" @endif>
                    <a href="{{url('admin/page')}}"><i class="fa fa-file-text"></i> <span class="nav-label">صفحات ثابته </span></a>
                </li>

                <li @if(Request::path() == 'admin/city') class="active" @endif>
                    <a href="{{url('admin/city')}}"><i class="fa fa-map-marker"></i> <span class="nav-label">المدن</span></a>
                </li>

                <li @if(Request::path() == 'admin/user') class="active" @endif>
                    <a href="{{url('admin/user')}}" class="active"> <i class="fa fa-drivers-license"></i> <span class="nav-label"> المستخدمين</span></a>
                </li>
                <li @if(Request::path() == 'admin/setting') class="active" @endif>
                    <a href="{{url('admin/setting')}}"> <i class="fa fa-gear"></i> <span class="nav-label"> الاعدادات</span></a>
                </li>
            </ul>

        </div>
    </nav>

    <div id="page-wrapper" class="gray-bg" >
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i>
                    </a>
                </div>
                <ul class="nav navbar-top-links navbar-left">

                    <li>
                        <a href="#" onclick="document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out"></i>خروج
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <form id="logout-form" action="{{ route('logout') }}" method="get" style="display: none;">
            {{ csrf_field() }}
        </form>
