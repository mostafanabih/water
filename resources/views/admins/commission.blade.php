@extends('admins.extends.master')

@section('content1')
        <!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> العموله </title>

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
                            <div class="col-lg-8">
                                <h5 style="font-size: 30px"> عمليات سداد العموله   </h5>
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
                        @include('alerts')
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>اسم الشركه</th>
                                <th>رقم الطلب</th>
                                <th>عموله</th>
                                <th>طريقة الدفع</th>
                                <th>صورة التحويل</th>
                                <th>تاكيد</th>
                                <th>اسم المستخدم</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($commissions as $commission)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{($commission->company) ? $commission->company->name : "-----"}} </td>
                                <td>{{$commission->id}}</td>
                                <td>{{$commission->commission_money}}</td>
                                <td>{{$commission->get_commission_payment_way()}}</td>
                                <td>
                                    @if($commission->commission_payment == 'bank')
                                        <img src="{{$commission->getConvertImageDisplay()}}" class="img-responsive img-preview-sm" alt="commission bank convert image">
                                        @else {{'-----'}}
                                    @endif
                                </td>
                                <td><button class="btn btn-success confirm" data-my_id="{{$commission->id}}" data-state="@if($commission->admin_commission_agree=='agree'){{'not_agree'}}@else{{'agree'}}@endif">@if($commission->admin_commission_agree=='agree'){{"غير مؤكد"}}@else{{"تاكيد"}} @endif</button> </td>
                                <td>{{($commission->admin_agree_by) ? $commission->Admin->name : '-----'}}</td>
                            </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{--\\\\\\\\\\\\\\\\\\\\\connfirm\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\--}}
                    <div class="modal inmodal" id="confirmModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="delet modal-content animated bounceInRight" style="padding: 1em">
                                <form action=""  method="post" class="form-horizontal" id="confirmform">
                                    @csrf
                                    {{method_field('PUT')}}
                                    <p id="my_text"></p>
                                    <input type="hidden" name="status" id="my_status">
                                    <button type="submit" class="btn btn-danger">نعم</button>
                                    <button type="button" class="btn btn-warning" data-dismiss="modal">الغاء</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
{{--@push('scripts')--}}
    {{--<script>--}}
        {{--$(document).ready(function () {--}}
            {{--$(".confirm").click(function () {--}}
                {{--/* get data from button */--}}
                {{--var id = $(this).data("my_id");--}}
            {{--});--}}
        {{--});--}}
    {{--</script>--}}
{{--@endpush--}}
@push('scripts')
    <script>
        $(document).ready(function () {

            ///////////////////delete/////////////////////////

            $(".confirm").click(function () {
                /* get data from button */
                var id = $(this).data("my_id");
                var status = $(this).data("state");
                /* set action attribute to new url */
                $('#confirmform').attr('action', '{{url("/admin/confirmcommission")}}' + '/' + id);
                $('#my_status').val(status);
                if (status == 'agree'){
                    $('#my_text').empty().text('هل انت متاكد من الموافقه');
                }else {
                    $('#my_text').empty().text('هل انت متاكد من  عدم الموافقه');
                }
                /* open the modal */
                $('#confirmModal').modal('show');

            });
        });
    </script>
@endpush