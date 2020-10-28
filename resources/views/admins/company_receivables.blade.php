@extends('admins.extends.master')

@section('content1')
        <!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>مستحقات الشركات</title>

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
                                <h5 style="font-size: 30px">مستحقات الشركات</h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <div class="ibox-tools">
                            <label class="pull-right">عرض الاحصائيات لكل الشركات : </label>
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="panel panel-success">
                                    <div class="panel-heading">اجمالى المستحقات</div>
                                    <div class="panel-body">
                                        <p>
                                            <i class="fa fa-money"></i>&nbsp;
                                            <span>اجمالي المبلغ</span>&nbsp;
                                            <span style="font-weight: bold">{{$all_receivables_}}</span>&nbsp;
                                            <span>ر.س</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">اجمالى المدفوع حتى الأن</div>
                                    <div class="panel-body">
                                        <p>
                                            <i class="fa fa-money"></i>&nbsp;
                                            <span>اجمالي المبلغ</span>&nbsp;
                                            <span style="font-weight: bold">{{(int)$paid_receivables_}}</span>&nbsp;
                                            <span>ر.س</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="panel panel-danger">
                                    <div class="panel-heading">اجمالى المتبقى دفعه</div>
                                    <div class="panel-body">
                                        <p>
                                            <i class="fa fa-money"></i>&nbsp;
                                            <span>اجمالي المبلغ</span>&nbsp;
                                            <span style="font-weight: bold">{{(int)$all_receivables_ - $paid_receivables_}}</span>&nbsp;
                                            <span>ر.س</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <label class="pull-right">عرض الشركات : </label>
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
                                <th>اسم الشركه</th>
                                <th>اجمالى المستحقات</th>
                                <th>المدفوع حتى الأن</th>
                                <th>المتبقى دفعه</th>
                                <th>دفع</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($companies as $company)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$company->name ?? '-----'}}</td>
                                <td>{{$company->all_receivables ?? 0}} ر.س</td>
                                <td>{{$company->paid_receivables ?? 0}} ر.س</td>
                                <td>{{($company->all_receivables - $company->paid_receivables) ?? 0}} ر.س</td>
                                <td>
                                    <a target="_blank" class="btn btn-success" href="{{url('admin/commission/'.$company->id)}}">دفع المستحقات</a>
                                </td>
                            </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="col-xs-12 text-center">
                            {{$companies->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script></script>
@endpush