@extends('company.template')
@section('title')اشعار عام@endsection
@section('style')
    <style>
        .notify_text_me{
            border: 1px solid #c5c5c5;
            padding: 25px 35px;
            background-color: #6284AF;
        }
    </style>
@endsection
@section('content')
    <div class="wrapper wrapper-content">
        @include('alerts')
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h4>
                    <span>اشعار عام بتاريخ</span>&nbsp;
                    <span class="text-danger">{{date('Y-m-d', strtotime($notification->created_at))}}</span>&nbsp;
                </h4>
            </div>
            <div class="ibox-content">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 col-xs-12">
                        <div class="notify_text_me">{{$notification->data['text']}}</div>
                    </div>
                </div>
            </div>
        </div>

@endsection