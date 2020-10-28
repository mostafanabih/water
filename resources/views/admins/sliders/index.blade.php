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
                            <div class="col-sm-8">
                                <h3>اسليدر الصفحة التعريفية</h3>
                            </div>
                            <div class="col-sm-4">
                                <button type="button" class="btn btn-success pull-left" data-toggle="modal" data-target="#add">اضف
                                    جديد
                                </button>
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
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <table class="table table-bordered" id="datatable">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>العنوان</th>
                                            <th>المحتوى</th>
                                            <th>الصورة</th>
                                            <th>العمليات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($sliders as $slider)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$slider->title}}</td>
                                                <td>{{$slider->body}}</td>
                                                <td>
                                                    <img src="{{$slider->getImgDisplay()}}" class="img-responsive img-preview-sm center-block" alt="slider image">
                                                </td>
                                                <td>
                                                    <a href="{{route('slider.edit', $slider->id)}}" target="_blank" class="btn btn-success">تعديل</a>

                                                    <form onsubmit="return confirm('هل تريد الحذف بالفعل ؟');" action="{{ url('admin/slider/'.$slider->id)}}" method="post">
                                                        @csrf
                                                        {{method_field('DELETE')}}
                                                        <button type="submit" class="btn btn-danger">حذف</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr class="text-center">
                                                <td colspan="5">لا يوجد اسليدر حتى الأن</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 text-center">
                            {{$sliders->onEachSide(1)->appends(Request::capture()->except('page'))->render() }}
                        </div>

                    </div>
                </div>
                <!--end-table-->

                <!--start-up-add-->
                <div class="modal inmodal" id="add" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="ibox-content modal-content animated bounceInRight" >
                            <div class="row">
                                <div class="col-sm-12">
                                    <h4 class="text-center"> اضافه اسليدر جديد</h4>

                                    <form action="{{ route('slider.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label class="col-sm-12 pull-right">العنوان :</label>
                                            <div class="col-sm-12">
                                                <input type="text" name="title" value="{{old('title')}}" class="form-control" required placeholder="العنوان هنا ...">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-12 pull-right">المحتوى :</label>
                                            <div class="col-sm-12">
                                                <textarea name="body" rows="10" class="form-control" required placeholder="المحتوى هنا ...">{{old('body')}}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-12 pull-right">الصورة :</label>
                                            <div class="col-sm-12">
                                                <input type="file" name="image" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="text-center mt-5">
                                                <button type="submit" class="btn btn-success" >حفظ </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end-up-add-->
            </div>
        </div>
    </div>
@endsection



