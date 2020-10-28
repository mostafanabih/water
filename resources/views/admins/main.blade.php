@extends('admins.extends.master')
@section('content1')
        <!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> الرئيسيه</title>

    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/bootstrap.rtl.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style-rtl.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/new-stylel.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


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
                                <h5 style="font-size: 30px"> الرئيسيه </h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="ibox-title ">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        العملاء
                                    </div>
                                    <div class="panel-body">
                                        <p><i class="fa fa-group"></i> عدد العملاء <span
                                                    style="font-weight: bold">{{$clients->count()}}</span>
                                        </p>
                                    </div>
                                    <div class="panel-footer">
                                        <button class=" btn "><a href="{{url('admin/client')}}" style="color: inherit">
                                                العملاء</a></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        الشركات
                                    </div>
                                    <div class="panel-body">
                                        <p><i class="fa fa-bank"></i>عدد الشركات<span
                                                    style="font-weight: bold"> {{$companies->count()}} </span></p>
                                    </div>
                                    <div class="panel-footer">
                                        <a href="{{url('admin/company')}}" class=" btn btn-primary"
                                           style="color: #fff ">الشركات </a>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                        المنتجات
                                    </div>
                                    <div class="panel-body">
                                        <p><i class="fa fa-database"></i> عدد المنتجات <span
                                                    style="font-weight: bold">{{$products->count()}}</span></p>
                                    </div>
                                    <div class="panel-footer">
                                        <button class=" btn btn-success"><a href="{{url('admin/product')}}"
                                                                            style="color: inherit">المنتجات </a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="panel panel-info">
                                            <div class="panel-heading">
                                                الطلبات الغير منفذه
                                            </div>
                                            <div class="panel-body">
                                                <p><i class="fa fa-cubes"></i> عدد الطلبات <span
                                                            style="font-weight: bold">{{$orderscancel->count()}}</span>
                                                </p>
                                            </div>
                                            <div class="panel-footer">
                                                <button class=" btn btn-info"><a href="{{url('admin/order')}}"
                                                                                 style="color: inherit">الطلبات </a>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="panel panel-danger">
                                            <div class="panel-heading">
                                                المندوبين
                                            </div>
                                            <div class="panel-body">
                                                <p><i class="fa fa-share"></i> عدد المندوبين<span
                                                            style="font-weight: bold">{{$representative->count()}}</span>
                                                </p>
                                            </div>
                                            <div class="panel-footer">
                                                <a class=" btn btn-danger" href="{{url('admin/representative')}}"
                                                   style="color: inherit">المندوبين </a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h4>طلبات اليوم </h4>

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
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>رقم الطلب</th>
                                <th> اسم الشركه</th>
                                <th>اسم المندوب</th>
                                <th> اسم العميل</th>
                                <th> اجمالى الطلب</th>
                                <th> عموله الموقع</th>
                                <th> حاله الطلب</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse( $orderstoday as $ordertoday)
                                <tr>
                                    <td>{{$ordertoday->id}}</td>
                                    <td>{{$ordertoday->Company->name}}</td>
                                    <td>{{$ordertoday->Representative->name ?? 'لا يوجد مندوب'}}</td>
                                    <td>{{$ordertoday->Client->name}} <br><span>باسم</span>({{$ordertoday->name}})</td>
                                    <td>{{$ordertoday->net}}</td>
                                    <td>{{$ordertoday->commission_money}}</td>
                                    <td>{{$ordertoday->status}}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-danger" colspan="7">
                                        <div class="alert alert-danger text-center">لا يوجد طلبات حتى الأن ...</div>
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection