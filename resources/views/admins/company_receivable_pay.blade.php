@extends('admins.extends.master')

@section('content1')
        <!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>دفع مستحقات الشركات</title>

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
                <div class="ibox float-e-margins">
                    <div class="ibox-title ">
                        <div class="row">
                            <div class="col-md-9 col-sm-8">
                                <h5 style="font-size: 30px">
                                    <span>دفع مستحقات</span>&nbsp;
                                    <span class="text-danger">{{$company->name ?? ''}}</span>
                                </h5>
                            </div>
                            <div class="col-md-3 col-sm-4">
                                <button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#pay">دفع مستحقات</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <div class="ibox-tools">
                            <label class="pull-right">عرض عمليات دفع المستحقات :</label>
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    @include('alerts')
                    <div class="ibox-content">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>التاريخ</th>
                                <th>المبلغ المدفوع</th>
                                <th>طريقة الدفع</th>
                                <th>صورة التحويل</th>
                                <th>موافقة الشركة</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($all_receivables as $receivable)
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
                                                    {{'تمت الموافقة من قبل الشركة'}}
                                                </span>
                                            @else
                                                <span class="bg-danger">
                                                    {{'تم الرفض من قبل الشركة'}}
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
                                {{$all_receivables->links()}}
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
                                                <span class="text-danger">{{$company_rest}}</span>&nbsp;
                                                <span>ر.س</span>&nbsp;
                                            </h4>

                                            <form method="post" action="{{url('admin/commission')}}"
                                                  class="form-horizontal" enctype="multipart/form-data">
                                                {{csrf_field()}}
                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label">المبلغ</label>
                                                    <div class="col-sm-8">
                                                        <input type="number" min="1" max="{{$company_rest}}" class="form-control" name="money_paid" value="{{old('money_paid')}}" required placeholder="ضع المبلغ المراد دفعه هنا ...">
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

                                                <input type="hidden" name="company_id" value="{{$company->id}}">

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
@push('scripts')
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
@endpush