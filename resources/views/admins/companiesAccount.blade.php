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
                                <h5 style="font-size: 30px"> كشف حساب الشركات   </h5>
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
                                <th>#</th>
                                <th>اسم الشركه  </th>
                                <th>عدد الطلبات  </th>
                                <th>اجمالي قيمه الطبات  </th>
                                <th>اجمالي عموله الموقع   </th>
                                <th>كشف حساب الشركه </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($companies as $company)

                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$company->name}}</td>
                                <td>{{$company->OrderWithoutCancel->count()}}</td>
                                {{--<td>{{count($company->Order)}}</td>--}}
                                <td>{{$company->OrderWithoutCancel->sum('net')}}</td>
                                <td>{{$company->OrderWithoutCancel->sum('commission_money')}}</td>
                                <td><button class="btn btn-info"><a href="{{url('admin/companyaccount/'.$company->id)}}"style="color: inherit">كشف حساب الشركه </a> </button> </td>
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
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        اجمالي الطلبات
                                    </div>
                                    <div class="panel-body">
                                        <p><i class="fa fa-database"></i>  اجمالي عدد الطلبات    <span style="font-weight: bold">
{{ DB::table("orders")->where('status', '!=', 'cancel')->get()->count() }}</span> </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        اجمالي قيمه الطلبات
                                    </div>
                                    <div class="panel-body">
                                        <p><i class="fa fa-money"></i> اجمالي قيمه الطلبات<span style="font-weight: bold"> {{ DB::table("orders")->where('status', '!=', 'cancel')->get()->sum('net') }} </span> </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                        اجمالي عموله الموقع
                                    </div>
                                    <div class="panel-body">
                                        <p> <i class="fa fa-desktop"></i> اجمالي عموله الموقع    <span style="font-weight: bold">{{ DB::table("orders")->where('status', '!=', 'cancel')->get()->sum('commission_money') }}</span> </p>
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