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
                            <div class="col-lg-4">
                                <h5 style="font-size: 30px"> الطلبات  </h5>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="ibox-title ">
                    <div  style="padding:1em;border: 2px solid #66afe9; margin-bottom: 1em ; " >
                        <form >
                        <div class="ibox float-e-margins">
                            <div class="row">
                                <div class="col-lg-4">
                                    <label class="col-sm-5 control-label">  رقم الطلب  </label>
                                    <input type="text" class="col-sm-7 form-control" placeholder="اكتب رقم الطلب" name="id" />
                                </div>
                                <div class="col-lg-4">
                                    <label class="col-sm-4 control-label">  من  </label>
                                    <input type="date" class="col-sm-8 form-control" placeholder="1-1-2019" name="from" />
                                </div>
                                <div class="col-lg-4">
                                    <label class="col-sm-4 control-label">  الى  </label>
                                    <input type="date" class="col-sm-8 form-control" placeholder="20-1-2020" name="to">
                                </div>
                            </div>
                        </div>
                        <div class="ibox float-e-margins">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label class="col-sm-4 control-label">  طريقه الدفع    </label>
                                    <select class="col-sm-8 form-control" name="payment">
                                        <option value="">كل الطرق</option>
                                        <option value="visa" @if(request('payment') == 'visa'){{'selected'}}@endif>فيزا كارت</option>
                                        <option value="on_deliver" @if(request('payment') == 'on_deliver'){{'selected'}}@endif>عند الوصول  </option>
                                    </select>
                                </div>

                                <div class="col-lg-6">
                                    <label class="col-sm-4 control-label">  العميل  </label>
                                    <select class="col-sm-8 form-control" name="client_id">
                                        <option value=""> كل العملاء</option>
                                        @foreach( $clients as $client )
                                            <option value="{{$client->id}}">  {{$client->name}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="ibox float-e-margins">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label class="col-sm-4 control-label">  حاله الطلب  </label>
                                    <select class="col-sm-8 form-control" name="status">
                                        <option value="">كل الحالات</option>
                                        <option value="wait" @if(request('status') == 'wait'){{'selected'}}@endif>قيد لانتظار</option>
                                        <option value="process" @if(request('status') == 'process'){{'selected'}}@endif>جارى التنفيذ</option>
                                        <option value="done"  @if(request('status') == 'done'){{'selected'}}@endif>تم الاستلام </option>
                                        <option value="cancel"  @if(request('status') == 'cancel'){{'selected'}}@endif>ملغى</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        {{--<div class="ibox float-e-margins">--}}
                            {{--<div class="row">--}}

                                {{--<div class="col-lg-6 text-center">--}}
                                    {{--<label class="col-sm-4 control-label">طبيعه المنتج</label>--}}
                                    {{--<select class="col-sm-8 form-control" name="">--}}
                                        {{--<option value="">  عروض  </option>--}}
                                        {{--<option value="">  عادى</option>--}}
                                        {{--<option value="">  توزيع خيرى</option>--}}
                                    {{--</select>--}}
                                {{--</div>--}}
                                {{--<div class="col-lg-6">--}}
                                    {{--<label class="col-sm-4 control-label"> الكميه   </label>--}}
                                    {{--<input type="text" class="col-sm-8 form-control" placeholder="اكتب الكميه " name="quantitly" />--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="row">--}}

                                {{--<div class="col-lg-6 text-center">--}}
                                    {{--<label class="col-sm-4 control-label">  حجم المنتج   </label>--}}
                                    {{--<select class="col-sm-8 form-control">--}}
                                        {{--<option value="">كبير   </option>--}}
                                        {{--<option value="">متوسط </option>--}}
                                        {{--<option value="">صغير  </option>--}}
                                    {{--</select>--}}
                                {{--</div>--}}


                        {{--</div>--}}
                        <div class="row">
                            <div class="col-lg-12 text-center " style="margin-top: 2em">
                                <button type="submit" class="btn btn-info" style="font-size: 20px">بحث</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h4>عرض الطلبات الحاليه   </h4>
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
                                <th>  طريقه الدفع    </th>
                                <th>  معاد التسليم     </th>
                                <th> حاله الطلب    </th>
                                <th>  العمليات     </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $currentorder)
                            <tr>
                                <td>{{$currentorder->id}}</td>
                                <td>{{$currentorder->Client->name}}  </td>
                                <td>{{$currentorder->Product->sum('quantity')}}</td>
                                <td>{{$currentorder->payment_way}} </td>
                                <td>{{$currentorder->done_time ??'لا يوجد ميعاد محدد'}}</td>
                                <td>{{$currentorder->status}}</td>

                                <td>
                                    <button type="button" class="btn btn-warning" ><a href="{{url('company/orders/'.$currentorder->id)}}" style="color: inherit"> تفاصيل الطلب </a></button>
                                    {{--<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#stop">الغاء الطلب</button>--}}
                                    {{--<button type="button" class="btn btn-info" ><a href="time-work.html" style="color: inherit"><a href="time-work.html"style="color: inherit">تاكيد الطلب </a></a></button>--}}
                                </td>
                            </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{--<div class="modal inmodal" id="stop" tabindex="-1" role="dialog" aria-hidden="true">--}}
                    {{--<div class="modal-dialog">--}}
                        {{--<div class="ibox-content modal-content animated bounceInRight">--}}
                            {{--<div class="row">--}}
                                {{--<div class="col-lg-9">--}}
                                    {{--<div class="ibox float-e-margins">--}}
                                        {{--<div class="col-sm-12">--}}
                                            {{--<label class="col-sm-4 control-label">  الغاء الطلب </label>--}}
                                            {{--<select class="col-sm-8 form-control">--}}
                                                {{--<option value="">  العميل   </option>--}}
                                                {{--<option value="">  الشركه </option>--}}
                                            {{--</select>--}}
                                            {{--<textarea  style="margin-top: 1em;" name="" id="" cols="47" rows="5" placeholder="سبب الالغاء"></textarea>--}}
                                            {{--<button class="btn-danger btn text-center" > الغاء الطلب </button>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            </div>
        </div>
    </div>
@endsection

@section('styles')

@endsection