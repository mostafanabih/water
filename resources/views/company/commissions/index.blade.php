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
                                <h5 style="font-size: 30px"> عمليات سداد العموله </h5>
                            </div>
                        </div>
                    </div>
                </div>
                @include('alerts')
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
                                <th>نسبه العموله</th>
                                <th>العموله</th>
                                <th>طريقه السداد</th>
                                <th>موافقه الاداره</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($commissions as $commission)
                                <tr>
                                    <td>{{$commission->id}}</td>
                                    <td>{{$commission->commission_percentage}}</td>
                                    <td>{{$commission->commission_money}}</td>
                                    <td>
                                        @if(is_null($commission->commission_payment))
                                            <form action="{{route('commission.update', $commission->id)}}" method="post">
                                                @csrf
                                                {{method_field('PUT')}}
                                                <input type="hidden" name="payment_way" value="e_payment">
                                                <button type="submit" class="btn btn-success">الكترونى</button>
                                            </form>

                                            <button class="btn btn-info bank_payment" data-order_id="{{$commission->id}}">تحويل بنكى</button>
                                            @else
                                                @if($commission->commission_payment == 'e_payment')
                                                    <label class="bg-primary">تم الدفع عن طريق التحويل الالكترونى</label>
                                                @else
                                                    <label class="bg-info">تم الدفع عن طريق التحويل البنكى</label>
                                                @endif
                                        @endif
                                    </td>
                                    <td>
                                        @if($commission->admin_commission_agree=='agree')
                                            <div class="bg-success">
                                                تمت الموافقه من قبل الاداره
                                            </div>
                                        @else
                                            <div class="bg-danger">
                                                لم تتم الموافقه من قبل الاداره حتي الان
                                            </div>
                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
            <!--start-bank-payment-->
            <div class="modal inmodal" id="bank_payment" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="ibox-content modal-content animated bounceInRight">
                        <div class="ibox float-e-margins">
                            <div class="col-sm-12">
                                <h4 class="text-center">اضافة تحويل بنكى</h4>
                                <form id="paymentform" action="" method="post" enctype="multipart/form-data">
                                    @csrf
                                    {{method_field('PUT')}}
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">صورة التحويل البنكى</label>
                                        <div class="col-sm-8">
                                            <input type="file" class="form-control" name="convert_image" required/>
                                        </div>
                                    </div>

                                    <input type="hidden" name="payment_way" value="bank">

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success">ارسال</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end-bank-payment-->
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(".bank_payment").click(function (e) {
            e.preventDefault();
            let order_id = $(this).data('order_id');
            $('#paymentform').attr('action', '{{url("company/commission")}}' + '/' + order_id);
            $("#bank_payment").modal('show');
        })
    </script>
@endsection