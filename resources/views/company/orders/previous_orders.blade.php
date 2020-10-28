@extends('company.template')
@section('title')
    Main Dashboard
@endsection
@section('content')
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title ">
                        <div class="row">
                            <div class="col-lg-8">
                                <h5 style="font-size: 30px">  الطلبات السابقه  </h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ibox float-e-margins">
                    <div class="ibox-title">
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
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>رقم الطلب</th>
                                <th> اسم العميل  </th>
                                <th>الكميه  </th>
                                <th>تقييم الطلب  </th>
                                <th> العنوان الواقع علي الخريطه   </th>
                                <th>  طريقه الدفع    </th>
                                <th>  معاد التسليم     </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td>{{$order->id}}</td>
                                <td> {{$order->Client->name}} </td>
                                <td>{{$order->OrderProducts->sum('quantity')}}</td>
                                <td>@if($order->rate == null) {{'لا يوجد تقييم'}} @else {{$order->rate.' نجوم'}} @endif</td>
                                <td>{{$order->location}}</td>
                                <td>{{($order->payment_way == 'visa') ? 'فيزا' : 'عند الاستلام' }}</td>
                                <td>{{$order->done_time ?? 'لا يوجد ميعاد محدد' }}  </td>
                            </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="ibox-title ">
                        <div class="row">

                            <div class="col-lg-4">
                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                        الطلبات  السابقه
                                    </div>
                                    <div class="panel-body">
                                        <p> <i class="fa fa-database"></i>  عدد الطلبات السابقه  <span style="font-weight: bold">{{$orders->count()}}</span> </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal inmodal" id="change" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="ibox-content modal-content animated bounceInRight">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="ibox float-e-margins">
                                <div class="col-sm-12">
                                    <h4 class="text-center"> تحويل الطلب الي المندوب   </h4>
                                    <form method="get" class="form-horizontal">
                                        <div class="form-group"><label class="col-sm-4 control-label"> اسم المندوب </label>
                                            <div class="col-sm-8"><input type="text" id ="userID" class="form-control"></div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection