@extends('admins.extends.master')

@section('content1')
        <!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> كشف حساب الشركات </title>

    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/bootstrap.rtl.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style-rtl.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/new-stylel.css')}}" rel="stylesheet">

</head>
@endsection
@section('content2')
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title ">
                        <div class="row">
                            <div class="col-lg-8">
                                <h5 style="font-size: 30px">   كشف حساب   <span  style="color: red">( شركه  {{$company->name}} )</span> </h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ibox float-e-margins">
                    <div class="ibox-title">

                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        @include('alerts')
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>رقم  الطلب </th>
                                <th> التاريخ  </th>
                                <th>اسم المندوب  </th>
                                <th>اسم العميل   </th>
                                <th>المبلغ المطلوب   </th>
                                <th>العموله   </th>
                                <th>الاجمالى  </th>
                                <th>حاله سداد العموله   </th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($orders as $order)

                            <tr>
                                <td>{{$order->id}}</td>
                                <td>{{$order->time}}</td>
                                <td>{{$order->Representative->name ?? 'لايوجد مندوب'}}</td>
                                <td>{{$order->Client->name ?? 'لايوجد عميل'}}</td>
                                <td>{{$order->net}}</td>
                                <td>{{$order->commission_money}}</td>
                                <td>{{$order->net + $order->commission_money}}</td>
                                <td>{{($order->commission_payment) ? 'تم سداد العمولة' : 'لم يتم سداد العمولة حتى الان'}} </td>
                            </tr>
                                @endforeach
                            </tbody>
                        </table>
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
                                        <p><i class="fa fa-money"></i> اجمالي المبلغ <span style="font-weight: bold"> {{ DB::table("orders")->where('status', '!=', 'cancel')->where('company_id', $company->id)->get()->sum('net')}} </span> </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                        اجمالي العموله
                                    </div>
                                    <div class="panel-body">
                                        <p> <i class="fa fa-yelp"></i> اجمالي العموله     <span style="font-weight: bold">{{ DB::table("orders")->where('status', '!=', 'cancel')->where('company_id', $company->id)->get()->sum('commission_money')}}</span> </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">اجمالى ما تم سداده</div>
                                    <div class="panel-body">
                                        <p> <i class="fa fa-money"></i> اجمالى ما تم سداده <span style="font-weight: bold">{{ DB::table("orders")->where('status', '!=', 'cancel')->where('commission_payment', '!=', null)->where('company_id', $company->id)->get()->sum('commission_money')}}</span> </p>
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