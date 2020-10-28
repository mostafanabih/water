@extends('company.template')
@section('title')دفع العمولة@endsection
@section('content')
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title ">
                        <div class="row">
                            <div class="col-md-9 col-sm-8">
                                <h5 style="font-size: 30px">دفع العمولات</h5>
                            </div>
                            <div class="col-md-3 col-sm-4">
                                <button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#pay">دفع عمولة</button>
                            </div>
                        </div>
                    </div>
                </div>
                @include('alerts')
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <div class="ibox-tools">
                            <label class="pull-right">عرض عمليات دفع العمولات :</label>
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
                                <th>التاريخ</th>
                                <th>المبلغ المدفوع</th>
                                <th>طريقة الدفع</th>
                                <th>صورة التحويل</th>
                                <th>موافقة الادارة</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($receivables as $receivable)
                                <tr>
                                    <td>{{date('Y-m-d', strtotime($receivable->created_at))}}</td>
                                    <td>{{$receivable->money_paid}} ر.س</td>
                                    <td>{{$receivable->show_payment_way()}}</td>
                                    <td>
                                        @if($receivable->payment_way == 'bank')
                                            <img src="{{$receivable->getConvertImgDisplay()}}" alt="convert image" class="img-preview-sm img-responsive">
                                        @else
                                            {{'-----'}}
                                        @endif
                                    </td>
                                    <td>
                                        @if($receivable->to_agree)
                                            @if($receivable->to_agree == 'agree')
                                                <span class="bg-primary">
                                                    {{'تمت الموافقة من قبل الادارة'}}
                                                </span>
                                            @else
                                                <span class="bg-danger">
                                                    {{'تم الرفض من قبل الادارة'}}
                                                </span>
                                            @endif
                                        @else
                                            {{'-----'}}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="col-xs-12">
                            <div class="text-center">
                                {{$receivables->links()}}
                            </div>
                        </div>

                        <!--start-up-pay-->
                        <div class="modal inmodal" id="pay" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="ibox-content modal-content animated bounceInRight">
                                    <div class="ibox float-e-margins">
                                        <div class="col-sm-12">
                                            <h4 class="text-center">
                                                <span>المبلغ المتبقى دفعه</span>&nbsp;
                                                <span class="text-danger">{{$all_rest}}</span>&nbsp;
                                                <span>ر.س</span>&nbsp;
                                            </h4>

                                            <form method="post" action="{{route('commission.store')}}"
                                                  class="form-horizontal" enctype="multipart/form-data">
                                                {{csrf_field()}}
                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label">المبلغ</label>
                                                    <div class="col-sm-8">
                                                        <input type="number" min="1" max="{{$all_rest}}" class="form-control" name="money_paid" value="{{old('money_paid')}}" required placeholder="ضع المبلغ المراد دفعه هنا ...">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label">طريقة الدفع</label>
                                                    <div class="col-sm-8">
                                                        <select name="payment_way" id="payment_way" class="form-control" required>
                                                            <option value="bank" @if(old('payment_way') == 'bank'){{'selected'}}@endif>تحويل بنكى</option>
                                                            <option value="visa" @if(old('payment_way') == 'visa'){{'selected'}}@endif>تحويل الكترونى</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group" id="convert_img_div">
                                                    <label class="col-sm-4 control-label">صورة التحويل</label>
                                                    <div class="col-sm-8">
                                                        <input type="file" class="form-control" name="convert_img" id="convert_img" required>
                                                    </div>
                                                </div>
                                                <div class="text-center">
                                                    <button type="submit" class="btn btn-success">دفع</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end-up-pay-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(function(){
            check_me($('#payment_way option:selected').val());
            $('#payment_way').on('change', function() {
                check_me(this.value);
            });

            function check_me(val){
                if(val == 'visa'){
                    $("#convert_img_div").fadeOut(500);
                    $("#convert_img").prop('disabled', true);
                }else{
                    $("#convert_img_div").fadeIn(500);
                    $("#convert_img").prop('disabled', false);
                }
            }
        });
    </script>
@endsection