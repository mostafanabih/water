@extends('admins.extends.master')
@section('content1')
        <!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> عرض الشركات </title>
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
                                <h5 style="font-size: 30px"> طلبات التسجيل من خلال الشركات    </h5>
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
                                    <table class=" table table-bordered" >
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>اسم الشركه   </th>
                                            <th>رقم الجوال   </th>
                                            <th> صوره السجل  لتجارى  </th>
                                            <th> صوره الشركه   </th>
                                            <th>اعدادات  </th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($companies as $company)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>  {{$company->name}} </td>
                                            <td> {{$company->mobile}} </td>
                                            <td><img src="{{asset('public/company/'.$company->commercial_register_image)}}" width="200" /></td>
                                            <td><img src="{{asset('public/company/'.$company->image)}}"  width="200"  /></td>
                                            <td>
                                                <button type="button" class="btn btn-success agree" data-my_id="{{$company->id}}" data-state="@if($company->admin_agree=='agree'){{'not_agree'}}@else{{'agree'}}@endif">@if($company->admin_agree=='agree'){{'عدم الموافقه'}} @else {{'موافق'}} @endif</button>
                                                <button type="button" class="btn btn-danger delete" data-my_id_="{{$company->id}}">حذف </button>
                                            </td>
                                        </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end-table-->
                    <div class="modal inmodal" id="agreeModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="delet modal-content animated bounceInRight" style="padding: 1em">
                                <form action=""  method="post" class="form-horizontal" id="agreeform">
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


                    <!--start-delet-->
                    <div class="modal inmodal" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="delet modal-content animated bounceInRight" style="padding: 1em">
                                <form action="" method="post" id="deleteform">
                                    @csrf
                                    {{method_field('DELETE')}}
                                    <p>هل انت متاكد من الحذف</p>
                                    <button type="submit" class="btn btn-danger">نعم</button>
                                    <button type="button" class="btn btn-warning" data-dismiss="modal">الغاء</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--end-delet-->
                    <!--start-stop-->
                    <div class="modal inmodal" id="stop" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="delet modal-content animated bounceInRight" style="padding: 1em">
                                <p>هل انت متاكد من الغاء العرض</p>
                                <button type="button" class="btn btn-danger">نعم</button>
                                <button type="button" class="btn btn-warning" data-dismiss="modal">الغاء</button>
                            </div>
                        </div>
                    </div>
                    <!--end-stop-->
                </div>
                <!--start-end-->
                <div class="ibox float-e-margins">
                    <div class="ibox-title text-center ">
                        {{$companies->onEachSide(1)->appends(Request::capture()->except('page'))->render() }}
                    </div>
                </div>
                <!--end-end-->
            </div>
        </div>
    </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function () {
            $(".delete").click(function () {
                /* get data from button */
                var id = $(this).data("my_id_");
                /* set action attribute to new url */
                $('#deleteform').attr('action', '{{url("/admin/company_register")}}' + '/' + id);
                /* open the modal */
                $('#deleteModal').modal('show');
            });

            /////////////////agree//////////////////////////
            $(".agree").click(function () {
                /* get data from button */
                var id = $(this).data("my_id");
                var status = $(this).data("state");
                /* set action attribute to new url */
                $('#agreeform').attr('action', '{{url("/admin/agreecompany")}}' + '/' + id );
                $('#my_status').val(status);
                if (status == 'agree'){
                    $('#my_text').empty().text('هل انت متاكد من الموافقه');
                }else {
                    $('#my_text').empty().text('هل انت متاكد من  عدم الموافقه');
                }
                /* open the modal */
                $('#agreeModal').modal('show');
            });
        });

    </script>
@endpush