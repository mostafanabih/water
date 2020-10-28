@extends('admins.extends.master')

@section('content1')
        <!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> العموله </title>

    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/bootstrap.rtl.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style-rtl.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/new-stylel.css')}}" rel="stylesheet">

    <style>
        .imageContainer > img:hover {
            width: 100% !important;
            height: 100% !important;
        }
    </style>
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
                                <h5 style="font-size: 30px"> عمليات سداد العموله   </h5>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="panel panel-success">
                                    <div class="panel-heading">اجمالى العمولات :</div>
                                    <div class="panel-body">
                                        <p>
                                            <i class="fa fa-money"></i>&nbsp;
                                            <span>اجمالي المبلغ</span>&nbsp;
                                            <span style="font-weight: bold">{{(int)$all_receivables}}</span>&nbsp;
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
                                            <span style="font-weight: bold">{{(int)$paid_receivables}}</span>&nbsp;
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
                                            <span style="font-weight: bold">{{(int)($all_receivables - $paid_receivables)}}</span>&nbsp;
                                            <span>ر.س</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('alerts')
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <div class="ibox-tools">
                            <label class="pull-right">عرض العمولات المدفوعة لى من قبل الشركات :</label>
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
                                <th>التاريخ</th>
                                <th>اسم الشركة</th>
                                <th>المبلغ المدفوع</th>
                                <th>طريقة الدفع</th>
                                <th>صورة التحويل</th>
                                <th>موافقة / رفض</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($receivables as $receivable)
                                <tr>
                                    <td>{{date('Y-m-d', strtotime($receivable->created_at))}}</td>
                                    <td>{{$receivable->Company->name ?? '-----'}}</td>
                                    <td>{{$receivable->money_paid}} ر.س</td>
                                    <td>{{$receivable->show_payment_way()}}</td>
                                    <td>
                                        @if($receivable->payment_way == 'bank')
                                            <div class="imageContainer">
                                                <img src="{{$receivable->getConvertImgDisplay()}}" alt="convert image"
                                                     class="img-preview-sm img-responsive">
                                            </div>
                                        @else
                                            {{'-----'}}
                                        @endif
                                    </td>
                                    <td>
                                        @if(in_array($receivable->to_agree, ['not_agree', null]))
                                            <form action="{{url("/admin/confirmcommission/".$receivable->id)}}"
                                                  method="post">
                                                {{method_field('PUT')}}
                                                @csrf
                                                <input type="hidden" name="status" value="agree">
                                                <button type="submit" class="btn btn-primary">موافقة</button>
                                            </form>
                                        @endif
                                        @if(in_array($receivable->to_agree, ['agree', null]))
                                            <form action="{{url("/admin/confirmcommission/".$receivable->id)}}"
                                                  method="post">
                                                {{method_field('PUT')}}
                                                @csrf
                                                <input type="hidden" name="status" value="not_agree">
                                                <button type="submit" class="btn btn-danger">رفض</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="col-xs-12">
                            <div class="text-center">
                                {{$receivables->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
    </script>
@endpush