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
                                <h5 style="font-size: 30px"> تقرير طلبات المندوبين    </h5>
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
                                <th>اسم المندوب</th>
                                <th>عدد الطلبات   </th>
                                <th>الاجمالي   </th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($reps as $rep)
                            <tr>
                                <td>{{$rep->name}}</td>
                                <td>{{$rep->OrderWithoutCancel->count()}} </td>
                                <td>{{$rep->OrderWithoutCancel->sum('net')}}</td>
                            </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="text-center">
                        {{$reps->links()}}
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="ibox-title ">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <i class="fa fa-cc-mastercard"></i> اجمالي العمليات المسدده بالفيزا
                                    </div>
                                    <div class="panel-body">
                                        <p> اجمالي العمليات المسدده بالفيزا<span style="font-weight: bold"> {{DB::table("orders")->where('status', '!=', 'cancel')->where('payment_way','visa')->get()->count()}} </span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <i class="fa fa-handshake-o"></i>اجمالي العمليات المسدده يدويا
                                    </div>
                                    <div class="panel-body">
                                        <p> اجمالي العمليات المسدده يدويا<span style="font-weight: bold"> {{DB::table("orders")->where('status', '!=', 'cancel')->where('payment_way', '!=' ,'visa')->get()->count()}} </span> </p>
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