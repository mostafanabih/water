@extends('admins.extends.master')

@section('content1')
        <!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>اسليدر الصفحة التعريفية</title>

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
                <!--start-title-->
                <div class="ibox float-e-margins">
                    <div class="ibox-title ">
                        <div class="row">
                            <div class="col-sm-12">
                                <h3>
                                    <span>تعديل اسليدر</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end-title-->

                <!--start-table-->
                <div class="ibox-content">
                    @include('alerts')
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="{{ route('slider.update', $slider->id) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                {{csrf_field()}}
                                {{method_field('PUT')}}
                                <div class="form-group">
                                    <label class="col-sm-12 pull-right">العنوان :</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="title" value="{{$slider->title}}" class="form-control" required placeholder="العنوان هنا ...">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-12 pull-right">المحتوى :</label>
                                    <div class="col-sm-12">
                                        <textarea name="body" rows="10" class="form-control" required placeholder="المحتوى هنا ...">{{$slider->body}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <img src="{{$slider->getImgDisplay()}}" class="img-responsive center-block" alt="slider image">
                                    </div>
                                    <label class="col-sm-12 pull-right">الصورة :</label>
                                    <div class="col-sm-12">
                                        <input type="file" name="image" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="text-center mt-5">
                                        <button type="submit" class="btn btn-success" >تعديل</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--end-table-->
            </div>
        </div>
    </div>
@endsection



