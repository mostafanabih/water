@extends('admins.extends.master')


@section('content1')
        <!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> تقرير القيمه المضافة </title>

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
            @include('alerts')
            {{--@foreach($orders as $order)--}}
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title ">
                        <div class="row">
                            <div class="col-lg-8">
                                <h5 style="font-size: 30px">  تقرير القيمه المضافة  </h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="img text-center" >
                                <div class="row">
                                    <div class="col-lg-9">
                                        <div class="ibox float-e-margins">
                                            <form>
                                                <div class="ibox float-e-margins">


                                                    <div class="col-lg-5">
                                                        <label class="col-sm-4 control-label">  من  </label>
                                                        <input type="text" name="from" class="col-sm-8 datepicker form-control" value="@if(request('from')){{request('from')}}@endif" placeholder="الفتره من">
                                                    </div>
                                                    <div class="col-lg-5">
                                                        <label class="col-sm-4 control-label">  الى  </label>
                                                        <input type="text" name="to" class="col-sm-8 datepicker form-control" value="@if(request('to')){{request('to')}}@endif" placeholder="الفتره الي">
                                                    </div>
                                                    <div class="col-lg-2 text-center ">
                                                        <button type="submit" class="btn btn-info" style="font-size: 20px">بحث</button>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ibox-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>رقم الطلب</th>
                                            <th>الاجمالى ما قبل القيمة المضافة</th>
                                            <th>القيمه المضافة</th>
                                            <th>الصافى بعد القيمة المضافة</th>
                                            <th>التاريخ</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($orders as $order)
                                        <tr>
                                            <td>{{$order->id}}</td>
                                            <td>{{$order->total}} </td>
                                            <td>{{$order->add_value}} </td>
                                            <td>{{$order->add_value + $order->total}}</td>
                                            <td>{{date('Y-m-d', strtotime($order->created_at))}}</td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{--@endforeach--}}
        </div>
    </div>
@endsection
@push('scripts')

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
            $( ".datepicker" ).datepicker({
                dateFormat: 'yy-mm-dd'
            });
        } );
    </script>
    <script>
        $(document).ready(function () {
            ///////////////////delete/////////////////////////

            $(".delete").click(function () {
                /* get data from button */
                var id = $(this).data("my_id");
                /* set action attribute to new url */
                $('#deleteform').attr('action', '{{url("/admin/order")}}' + '/' + id);
                /* open the modal */
                $('#deleteModal').modal('show');
            });
        });
    </script>
@endpush