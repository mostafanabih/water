@extends('company.template')
@section('title')
    Main Dashboard
@endsection
@section('content')
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title ">
                        <div class="row">
                            <div class="col-lg-5">
                                <h5 style="font-size: 30px"> شاشه حساب الموقع </h5>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="ibox float-e-margins">
                    <div class="ibox-title ">
                        <div class="row">
                            <form>
                                <div class="col-lg-2">
                                    <h3> الفتره </h3>
                                </div>
                                <div class="col-lg-3">
                                    <label class="col-sm-4 control-label"> من </label>
                                    <input required type="date" name="from" class="col-sm-8 form-control"
                                           value="@if(request('from')){{request('from')}}@endif"
                                           placeholder="الفتره من">
                                </div>
                                <div class="col-lg-3">
                                    <label class="col-sm-4 control-label"> الى </label>
                                    <input required type="date" name="to" class="col-sm-8 form-control"
                                           value="@if(request('to')){{request('to')}}@endif" placeholder="الفتره الي">
                                </div>
                                <div class="col-lg-3">
                                    <button type="submit" class="btn  btn-success" style="float: left">بحث</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        @if(request('from') and request('to'))
                            <h4>
                                <span>الطلبات من الفترة</span>&nbsp;
                                <span class="text-danger">{{request('from')}}</span>&nbsp;
                                <span>الى الفترة</span>&nbsp;
                                <span class="text-danger">{{request('to')}}</span>
                            </h4>
                        @else
                            <h4>طلبات اليوم </h4>
                        @endif
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    {{--{{auth()->guard('company')->user()->company_id}}--}}
                    <div class="ibox-content">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>رقم الطلب</th>
                                <th> التاريخ</th>
                                <th>اسم المندوب</th>
                                <th>اسم العميل</th>
                                <th>اسم المنتج</th>
                                <th>الكميه</th>
                                <th>الاجمالى</th>
                                <th> المبلغ المطلوب</th>
                                <th>العموله</th>
                                <th>حاله سداد العموله</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orderstoday as $ordertoday)
                                <tr>
                                    <td>{{$ordertoday->id}} </td>
                                    <td>{{$ordertoday->created_at}} </td>
                                    <td>{{$ordertoday->Representative->name ?? 'لا يوجد مندوب'}}</td>
                                    <td>{{$ordertoday->Client->name}}</td>
                                    <td>{{$ordertoday->OrderProducts->first()->Product->name}} </td>
                                    <td>{{$ordertoday->OrderProducts->sum('quantity')}}</td>
                                    <td>{{$ordertoday->total}}</td>
                                    <td>{{$ordertoday->net}}</td>
                                    <td>{{$ordertoday->commission_money}}</td>
                                    <td>@if($ordertoday->admin_commission_agree == 'agree')  {{'تم السداد'}} @else
                                            <a href="{{url('/company/commission')}}" class="btn-info btn"> {{'سداد العموله'}} </a> @endif
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        {{--<div class="modal inmodal" id="confirmModal" tabindex="-1" role="dialog" aria-hidden="true">--}}
                            {{--<div class="modal-dialog">--}}
                                {{--<div class="delet modal-content animated bounceInRight" style="padding: 1em">--}}
                                    {{--<form action="" method="post" id="confirmform">--}}
                                        {{--@csrf--}}
                                        {{--{{method_field('PUT')}}--}}
                                        {{--<p>هل انت متاكد من سداد العموله</p>--}}
                                        {{--<button type="submit" class="btn btn-danger">نعم</button>--}}
                                        {{--<button type="button" class="btn btn-warning" data-dismiss="modal">الغاء</button>--}}
                                    {{--</form>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="ibox-title ">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        اجمالي المبلغ
                                    </div>
                                    <div class="panel-body">
                                        <p><i class="fa fa-money"></i> اجمالي المبلغ <span
                                                    style="font-weight: bold"> {{ DB::table("orders")->where('company_id', auth()->guard('company')->user()->company_id)->get()->sum('total')}} </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <i class="fa fa-cc-mastercard"></i> اجمالي العمليات المسدده بالفيزا
                                    </div>
                                    <div class="panel-body">
                                        <p> اجمالي العمليات المسدده بالفيزا<span
                                                    style="font-weight: bold">{{ DB::table("orders")->where('company_id', auth()->guard('company')->user()->company_id)->where('payment_way','visa')->get()->count()}} </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <i class="fa fa-handshake-o"></i>اجمالي العمليات المسدده يدويا
                                    </div>
                                    <div class="panel-body">
                                        <p> اجمالي العمليات المسدده يدويا<span
                                                    style="font-weight: bold"> {{ DB::table("orders")->where('company_id', auth()->guard('company')->user()->company_id)->where('payment_way','on_deliver')->get()->count()}} </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            {{--$(".confirm").click(function () {--}}
                {{--/* get data from button */--}}
                {{--var id = $(this).data("my_id");--}}
                {{--/* set action attribute to new url */--}}
                {{--$('#confirmform').attr('action', '{{url("/company/confirmcommission")}}' + '/' + id);--}}
                {{--/* open the modal */--}}
                {{--$('#confirmModal').modal('show');--}}
            {{--});--}}
        });
    </script>
@endsection