@extends('admins.extends.master')


@section('content1')
        <!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> تفاصيل الطلب </title>

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
            @include('alerts')
            {{--@foreach($orders as $order)--}}
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title ">
                        <div class="row">
                            <div class="col-lg-8">
                                <h5 style="font-size: 30px"> تفاصيل الطلب رقم {{$order->id}}</h5>
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
                                            <div class="col-sm-12">
                                                <div class="col-sm-4"><h4>اسم العميل </h4></div>
                                                <div class="col-sm-8"><p>{{$order->Client->name}} </p></div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="col-sm-4"><h4> رقم الجوال </h4></div>
                                                <div class="col-sm-8"><p>{{$order->Client->mobile}}</p></div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="col-sm-4"><h4>العنوان    </h4></div>
                                                <div class="col-sm-8"><p>{{$order->Client->location}}</p></div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="col-sm-4"><h4> الشركه </h4></div>
                                                <div class="col-sm-8"><p>{{$order->Company->name}}</p></div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="col-sm-4"><h4> حاله الطلب  </h4></div>
                                                <div class="col-sm-8"><p>{{$order->status}}</p></div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="col-sm-4"><h4> وقت الطلب  </h4></div>
                                                <div class="col-sm-8"><p>{{$order->done_time}}</p></div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="col-sm-4"><h4> طريقه الدفع  </h4></div>
                                                <div class="col-sm-8"><p>{{$order->payment_way}}</p></div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="col-sm-4"><h4>نسبه العموله</h4></div>
                                                <div class="col-sm-8"><p>{{$order->commission_percentage}}</p></div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="col-sm-4"><h4> القيمه المضافه </h4></div>
                                                <div class="col-sm-8"><p>{{$order->add_value}}</p></div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="col-sm-4"><h4>  المبلغ المطلوب </h4></div>
                                                <div class="col-sm-8"><p>{{$order->net}}</p></div>
                                            </div>
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
                                            <th>#</th>
                                            <th>المنتج </th>
                                            <th> الحجم   </th>
                                            <th> السعر  </th>
                                            <th>الكميه </th>
                                            <th> الاجمالي </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($order->OrderProducts as $product)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$product->Product->name}} </td>
                                            <td> {{$product->Product->size}} </td>
                                            <td>{{$product->price}}</td>
                                            <td>{{$product->quantity}}</td>
                                            <td>{{$product->after_discount}}</td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ibox float-e-margins">
                    <div class="ibox-title text-center ">
                        @if($order->status == 'wait')
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#confirm">تاكيد الطلب</button>
                        @endif
                        @if($order->status == 'wait' or $order->status == 'process')
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#stop">الغاء الطلب</button>
                        @endif
                    </div>
                </div>
            </div>
            {{--@endforeach--}}
        </div>
    </div>

    </div>
    </div>
    <div class="modal inmodal" id="stop" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content  animated bounceInRight"  aria-hidden="true" style=" padding: 1em;">
                <form action="{{url('admin/cancelorder/'.$order->id)}}"  method="post" class="form-horizontal">
                    @csrf
                    {{method_field('PUT')}}
                    <div>
                    <div class="form-group"><label>سبب الغاء الطلب</label></div>
                        <div ><textarea name="cancelreason" class="form-control"></textarea></div>
                    </div>
                <button type="submit"class="btn btn-danger">نعم</button>
                <button type="button" class="btn btn-warning" data-dismiss="modal">الغاء</button>
                </form>
            </div>
        </div>
    </div>
    <div class="modal inmodal" id="confirm" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content  animated bounceInRight"  aria-hidden="true" style=" padding: 1em;">
                <form action="{{url('admin/confirmorder/'.$order->id)}}" method="post" class="form-horizontal">
                    @csrf
                    {{method_field('PUT')}}
                    <div class="form-group"><label class="col-sm-4 control-label" > المندوب </label>
                        <div class="col-sm-8">
                            <select name="representative" id="my_representative" class="form-control">
                                @foreach($order->Company->Representative as $representative)
                                    <option value="{{$representative->id}}">{{$representative->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">حفظ </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
