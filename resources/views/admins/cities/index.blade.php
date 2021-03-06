@extends('admins.extends.master')

@section('content1')
        <!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>المدن</title>

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
                            <div class="col-sm-4">
                                <h3>المدن</h3>
                            </div>
                            <form class="form-inline" action="">
                                <div class="col-lg-2">
                                    <input type="text" value="{{request('search') ?? ''}}" placeholder="ابحث عن مدينة ..." class="form-control" name="search">
                                </div>
                                <div class="col-lg-1">
                                    <button type="submit" class="btn btn-sm btn-white"
                                            style="float: left; font-size: 15px ; margin-left:-12px">بحث
                                    </button>
                                </div>
                            </form>
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
                                            <th>اسم المدينة</th>
                                            <th>العمليات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($cities as $city)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$city->name}}</td>
                                                <td>
                                                    <a href="{{route('city.edit', $city->id)}}" target="_blank" class="btn btn-success">تعديل</a>

                                                    <form onsubmit="return confirm('هل تريد الحذف بالفعل ؟');" action="{{ url('admin/city/'.$city->id)}}" method="post">
                                                        @csrf
                                                        {{method_field('DELETE')}}
                                                        <button type="submit" class="btn btn-danger">حذف</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr class="text-center">
                                                <td colspan="3">لا يوجد مدن حتى الأن</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 text-center">
                            {{$cities->onEachSide(1)->appends(Request::capture()->except('page'))->render() }}
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
                                    <h4 class="text-center"> اضافه مدينة جديدة</h4>

                                    <form action="{{ route('city.store') }}" method="post" class="form-horizontal">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label class="col-sm-12 pull-right">الاسم :</label>
                                            <div class="col-sm-12">
                                                <input type="text" name="name" class="form-control" required placeholder="اسم المدينة هنا ...">
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



