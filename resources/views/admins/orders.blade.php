@extends('admins.extends.master')

@section('content1')
        <!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> الطلبات</title>

    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/bootstrap.rtl.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <link href="{{asset('assets/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style-rtl.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/new-stylel.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/new-stylel.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

</head>
@endsection
@section('content2')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title ">
                    <div class="row">
                        <div class="col-lg-4">
                            <h5 style="font-size: 30px"> الطلبات </h5>
                        </div>

                    </div>
                </div>
            </div>
            <div class="ibox-title ">
                <div style="padding:1em;border: 2px solid #66afe9; margin-bottom: 1em ; ">
                    <form>
                        <div class="ibox float-e-margins">

                            <div class="row">

                                <div class="col-lg-4">
                                    <label class="col-sm-5 control-label"> رقم الطلب </label>
                                    <input type="text" name="id" class="col-sm-7 form-control"
                                           value="@if(request('id')){{request('id')}}@endif"
                                           placeholder="اكتب رقم الطلب">
                                </div>
                                <div class="col-lg-4">
                                    <label class="col-sm-4 control-label"> من </label>
                                    <input type="text" name="from" class="col-sm-8 datepicker form-control" autocomplete="off"
                                           value="@if(request('from')){{request('from')}}@endif"
                                           placeholder="الفتره من">
                                </div>
                                <div class="col-lg-4">
                                    <label class="col-sm-4 control-label"> الى </label>
                                    <input type="text" name="to" class="col-sm-8 datepicker form-control" autocomplete="off"
                                           value="@if(request('to')){{request('to')}}@endif" placeholder="الفتره الي">
                                </div>
                            </div>
                        </div>

                        <div class="ibox float-e-margins">
                            <div class="row">
                                <div class="col-lg-4">
                                    <label class="col-sm-5 control-label"> حاله الطلب </label>
                                    <select name="status" class="col-sm-7 form-control">
                                        <option value="">كل الحالات</option>
                                        <option value="wait" @if(request('status') == 'wait'){{'selected'}}@endif>قيد
                                            لانتظار
                                        </option>
                                        <option value="process" @if(request('status') == 'process'){{'selected'}}@endif>
                                            جارى التنفيذ
                                        </option>
                                        <option value="done" @if(request('status') == 'done'){{'selected'}}@endif>تم
                                            الاستلام
                                        </option>
                                        <option value="cancel" @if(request('status') == 'cancel'){{'selected'}}@endif>
                                            ملغى
                                        </option>
                                        {{--<option value="">ملغي من الشركه  </option>--}}
                                        {{--<option value="">ملغي من المندوب </option>--}}
                                        {{--<option value="">ملغي بطلب العميل </option>--}}
                                    </select>
                                </div>

                                <div class="col-lg-4">
                                    <label class="col-sm-4 control-label"> طريقه الدفع </label>
                                    <select name="payment_way" class="col-sm-8 form-control">
                                        <option value="">كل الطرق</option>
                                        <option value="visa" @if(request('payment_way') == 'visa'){{'selected'}}@endif>
                                            فيزا كارت
                                        </option>
                                        <option value="on_deliver" @if(request('payment_way') == 'on_deliver'){{'selected'}}@endif>
                                            عند الوصول
                                        </option>
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <label class="col-sm-5 control-label"> حاله سداد العموله </label>
                                    <select name="commission_payment" class="col-sm-7 form-control">
                                        <option value=""> حالات السداد</option>
                                        <option value="e_payment" @if(request('commission_payment') == 'e_payment'){{'selected'}}@endif>
                                            الكتروني
                                        </option>
                                        <option value="bank" @if(request('bank') == 'bank'){{'selected'}}@endif>تحويل
                                            بنكي
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="ibox float-e-margins">
                            <div class="row">

                                <div class="col-lg-6">
                                    <label class="col-sm-4 control-label"> العميل </label>
                                    <select name="client_id" class="col-sm-8 form-control">
                                        <option value=""> كل العملاء</option>
                                        @foreach($clients as $client)
                                            <option value="{{$client->id}}" @if(request('client_id') == $client->id){{'selected'}}@endif> {{$client->name}}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="col-lg-6">
                                    <label class="col-sm-4 control-label"> الشركه </label>

                                    <select name="company_id" class="col-sm-8 form-control">
                                        <option value=""> كل الشركات</option>
                                        @foreach($companies as $company)
                                            <option value="{{$company->id}}" @if(request('company_id') == $company->id){{'selected'}}@endif>{{$company->name}}</option>
                                        @endforeach
                                    </select>

                                </div>

                            </div>
                        </div>
                        <div class="row">

                            {{--<div class="col-lg-6 text-center">--}}
                            {{--<label class="col-sm-4 control-label">  حجم المنتج   </label>--}}
                            {{--<select name="product_size" class="col-sm-8 form-control">--}}
                            {{--<option value="">كبير   </option>--}}
                            {{--<option value="">متوسط </option>--}}
                            {{--<option value="">صغير  </option>--}}
                            {{--</select>--}}
                            {{--</div>--}}
                            {{--<div class="col-lg-6 text-center">--}}
                            {{--<label class="col-sm-4 control-label">طبيعه المنتج</label>--}}
                            {{--<select name="product_state" class="col-sm-8 form-control">--}}
                            {{--<option value="">  عروض  </option>--}}
                            {{--<option value="">  عادى</option>--}}
                            {{--<option value="">  توزيع خيرى</option>--}}
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
            <div class="ibox-content">
                @include('alerts')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>رقم الطلب</th>
                                        <th>كميه</th>
                                        <th> سعر</th>
                                        <th>عموله الموقع</th>
                                        <th> عمليات</th>


                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $order)
                                        <tr>
                                            <td>{{$order->id}}</td>
                                            <td>{{$order->OrderProducts->sum('quantity')}}</td>
                                            <td> {{$order->net}} </td>
                                            <td>{{$order->commission_money}}</td>
                                            <td>
                                                <button type="button" class="btn btn-success"><a
                                                            href="{{url('admin/order/'.$order->id)}}"
                                                            style="color: inherit;">عرض</a></button>
                                                @if($order->status == 'wait')
                                                    <button type="button" class="btn btn-danger"
                                                            data-my_id="{{$order->id}}">حذف
                                                    </button>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="modal inmodal" id="deleteModal" tabindex="-1" role="dialog"
                                     aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="delet modal-content animated bounceInRight" style="padding: 1em">
                                            <form action="" method="post" id="deleteform">
                                                @csrf
                                                {{method_field('DELETE')}}
                                                <p>هل انت متاكد من الحذف</p>
                                                <button type="submit" class="btn btn-danger">نعم</button>
                                                <button type="button" class="btn btn-warning" data-dismiss="modal">
                                                    الغاء
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="ibox float-e-margins">
                <div class="ibox-title text-center ">
                    {{$orders->onEachSide(1)->appends(Request::capture()->except('page'))->render() }}
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(function () {
        $(".datepicker").datepicker({
            dateFormat: 'dd-mm-yy'
        });
    });
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