@extends('admins.extends.master')

@section('content1')
        <!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> الاعدادات</title>
    <link href="{{asset('assets/css/summernote/summernote.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/summernote/summernote-bs3.css')}}" rel="stylesheet">
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
                            <div class="col-lg-12">
                                <h5 style="font-size: 30px"> الاعدادات  </h5>
                            </div>
                        </div>
                    </div>
                </div>
                @include('alerts')

                <div class="ibox-content" id="">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox float-e-margins">
                                <div class="col-sm-6">
                                    @foreach($settings as $setting)
{{--                                        <form action="{{url('admin/setting/1')}}" method="post" class="form-horizontal">--}}
                                        <form action="{{route('setting.update', ['id'=>1])}}" method="post" class="form-horizontal">
                                            {{csrf_field()}}
                                            {{method_field('PUT')}}
                                            <div class="form-group"><label class="col-sm-4 control-label">العنوان</label>
                                                <div class="col-sm-8"><input type="text" id ="userID" name="address" class="form-control" value="{{$setting->address}}"></div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-4 control-label" > الجوال </label>
                                                <div class="col-sm-8"><input type="text"  class="form-control" name="mobile" value="{{$setting->mobile}}"></div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-4 control-label">  الفاكس</label>
                                                <div class="col-sm-8"><input type="text"  class="form-control" name="fax" value="{{$setting->fax}}"></div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-4 control-label"> البريد الالكتروني  </label>
                                                <div class="col-sm-8"><input type="email"  type="text"  class="form-control" name="email" value="{{$setting->email}}" required></div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-4 control-label">  فيس بوك </label>
                                                <div class="col-sm-8"><input type="text"  type="text"  class="form-control" name="facebook" value="{{$setting->facebook}}"></div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-4 control-label">تويتر </label>
                                                <div class="col-sm-8"><input type="text"  type="text"  class="form-control" name="twitter" value="{{$setting->twitter}}"></div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-4 control-label">انستجرام </label>
                                                <div class="col-sm-8"><input type="text"  type="text"  class="form-control" name="instagram" value="{{$setting->instagram}}"></div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-4 control-label">واتساب </label>
                                                <div class="col-sm-8"><input type="text"  type="text"  class="form-control" name="whatsapp" value="{{$setting->whatsapp}}"></div>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-danger" onclick="myChange()"> تعديل</button>
                                            </div>
                                        </form>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection