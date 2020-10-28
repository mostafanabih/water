@extends('admins.extends.master')
@section('content1')
        <!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{$page->title}}</title>

    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/bootstrap.rtl.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style-rtl.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/new-stylel.css')}}" rel="stylesheet">

</head>
@endsection
@section('content2')
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-12">
                <!--start-title-->
                <div class="ibox float-e-margins">
                    <div class="ibox-title ">
                        <div class="row">
                            <div class="col-sm-4">
                                <h3> صفحه
                                    <span class="text-danger">{{$page->title}}</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end-title-->
                <!--start-table-->
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div>
                                {!!$page->body!!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ibox-content text-center">
                    <div class="ibox-title ">
                        <div class="row">
                            <button class="btn btn-info"><a href="{{url('admin/page/'.$page->id.'/edit')}}" style="color: inherit">تعديل</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection