@extends('admins.extends.master')

@section('content1')
        <!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> المندوبين</title>

    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/bootstrap.rtl.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <link href="{{asset('assets/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style-rtl.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/new-stylel.css')}}" rel="stylesheet">

</head>
@endsection
@section('content2')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title ">
                    <div class="row">
                        <div class="col-lg-4">
                            <h5 style="font-size: 30px"> المندوبين   </h5>
                        </div>
                        <form class="form-inline" action="">
                            <div class="col-lg-2">

                                <input type="text" placeholder="ابحث عن شركه  " class="form-control" name="search">

                            </div>
                            <div class="col-lg-1">
                                <button type="submit" class="btn btn-sm btn-white" style="float: left; font-size: 15px ; margin-left:-12px" >بحث</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{--<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalww">Open Modal</button>--}}

            <!-- Modal -->
            <div id="myModalww" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            {{--<h4 class="modal-title">Modal Header</h4>--}}
                        </div>
                        <div class="modal-body">

                            <form action="" method="post" class="form-horizontal" id="editform">
                                {{csrf_field()}}
                                {{method_field('PUT')}}
                                <h3>تعديل</h3>
                                <div class="form-group"><label class="col-sm-4 control-label">الاسم  </label>
                                    <div class="col-sm-8" style="margin-bottom: 1em"><input type="text" name="name" id="name" class="form-control"></div>
                                </div>
                                <div class="form-group"><label class="col-sm-4 control-label" >  الشركه   </label>
                                    <div class="col-sm-8">
                                        <select name="company_id" id="my_company_id" class="form-control">
                                            @foreach($companies as $company)
                                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group"><label class="col-sm-4 control-label" >  البريد الالكترونى   </label>
                                        <div  class="col-sm-8" style="margin-bottom: 1em" ><input type="text" name="email" id="email" class="form-control">
                                        </div>

                                        <div class="text-center" style="margin-right: 1em">
                                            <button type="submit" class="btn btn-success" >حفظ</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

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
                                        <th>#</th>
                                        <th> الاسم  </th>
                                        <th>البريد الالكتروني  </th>
                                        <th> اسم الشركه   </th>
                                        <th>العمليات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($reps as $rep)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$rep->name}}</td>
                                        <td>{{$rep->email}} </td>
                                        <td> {{($rep->company)?$rep->company->name:"--"}}</td>
                                        <td>

                                            <button type="button" class="btn btn-success edit" data-my_id="{{$rep->id}}" data-name="{{$rep->name}}" data-email="{{$rep->email}}"  data-company_id="{{$rep->company_id}}" >تعديل</button>
                                            <button type="button" class="btn btn-warning change" data-my_id="{{$rep->id}}">تغيير كلمه المرور</button>
                                            <button type="button" class="btn btn-danger stop" data-my_id="{{$rep->id}}" data-status="@if($rep->active=='active'){{'not_active'}} @else {{'active'}} @endif">@if($rep->active=='active'){{'ايقاف'}} @else {{'تفعيل'}} @endif</button>
                                            <button type="button" class="btn btn-danger delete" data-my_id="{{$rep->id}}">حذف</button>
                                        </td>
                                    </tr>
                                  @endforeach
                                    </tbody>
                                </table>
                                <div class="modal inmodal" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="delet modal-content animated bounceInRight" style="padding: 1em">
                                            <p>هل انت متاكد من الحذف</p>
                                            <form action="" method="post" id="deleteform">
                                                @csrf
                                                {{method_field('DELETE')}}
                                            <button type="submit" class="btn btn-danger">نعم</button>
                                            <button type="button" class="btn btn-warning" data-dismiss="modal">الغاء</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal inmodal" id="stopModal" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="delet modal-content animated bounceInRight" style="padding:1em;">
                                            <form action=""  method="post" class="form-horizontal" id="stopform">
                                                {{csrf_field()}}
                                                {{method_field('PUT')}}
                                                <p id="my_text"></p>
                                                <input type="hidden" name="status" id="my_status">
                                            <button type="submit" class="btn btn-danger">نعم</button>
                                            <button type="button" class="btn btn-warning" data-dismiss="modal">الغاء</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal inmodal" id="img" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="img text-center modal-content animated bounceInRight"  >
                            <div class="row">
                                <div class="col-lg-9">
                                    <div class="ibox float-e-margins  ">
                                        <div class="col-sm-12">
                                            <h3>اضافه</h3>
                                            <div class="form-group"><label class="col-sm-4 control-label">الاسم  </label>
                                                <div class="col-sm-8"style="margin-bottom: 1em"><input type="text"  class="form-control"></div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-4 control-label" >  الشركه   </label>
                                                <div  class="col-sm-8" style="margin-bottom: 1em" ><select  style="width: 100%" ><option value="">اكوافينا</option></select>
                                                </div>
                                                <div class="form-group"><label class="col-sm-4 control-label" >  البريد الالكترونى   </label>
                                                    <div  class="col-sm-8" style="margin-bottom: 1em" ><input type="text" class="form-control">
                                                    </div>
                                                    <div class="form-group"><label class="col-sm-4 control-label">  كلمه المرور   </label>
                                                        <div class="col-sm-8" style="margin-bottom: 1em"><input type="password"  class="form-control"></div>
                                                    </div>
                                                    <div class="form-group"><label class="col-sm-4 control-label">  تاكيد كلمه المرور  </label>
                                                        <div class="col-sm-8" style="margin-bottom: 1em"><input type="password"  class="form-control"></div>
                                                    </div>
                                                    <div class="text-center" style="margin-right: 1em">
                                                        <button type="button" class="btn btn-success">حفظ</button>
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
                <div class="modal inmodal" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="img text-center modal-content animated bounceInRight">
                            <div class="row">
                                <div class="col-lg-9">
                                    <div class="ibox float-e-margins">
                                        <div class="col-sm-12">
                                            <form action="" method="post" class="form-horizontal" id="editform">
                                                {{csrf_field()}}
                                                {{method_field('PUT')}}
                                            <h3>تعديل</h3>
                                            <div class="form-group"><label class="col-sm-4 control-label">الاسم  </label>
                                                <div class="col-sm-8" style="margin-bottom: 1em"><input type="text" name="name" id="name" class="form-control"></div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-4 control-label" >  الشركه   </label>
                                                <div class="col-sm-8">
                                                    <select name="company_id" id="my_company_id" class="form-control">
                                                        @foreach($companies as $company)
                                                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group"><label class="col-sm-4 control-label" >  البريد الالكترونى   </label>
                                                    <div  class="col-sm-8" style="margin-bottom: 1em" ><input type="text" name="email" id="email" class="form-control">
                                                    </div>

                                                    <div class="text-center" style="margin-right: 1em">
                                                        <button type="submit" class="btn btn-success" >حفظ</button>
                                                    </div>
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

                <div class="modal inmodal" id="changeModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="img text-center modal-content animated bounceInRight" >
                            <div class="row">
                                <div class="col-lg-9">
                                    <div class="ibox float-e-margins">
                                        <div class="col-sm-12">
                                            <form action=""  method="post" class="form-horizontal" id="changeform">
                                                {{csrf_field()}}
                                                {{method_field('PUT')}}
                                            <h3>تغير كلمه المرور</h3>
                                            <div class="form-group"><label class="col-sm-4 control-label">  كلمه المرور  </label>
                                                <div class="col-sm-8" style="margin-bottom: 1em"><input type="password" name="password"  class="form-control"></div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-4 control-label">  تاكيد كلمه المرور  </label>
                                                <div class="col-sm-8" style="margin-bottom: 1em"><input type="password" name="password_confirmation"  class="form-control"></div>
                                            </div>
                                            <div class="text-center" style="margin-right: 1em">
                                                <button type="submit" class="btn btn-success">حفظ</button>
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
            <div class="ibox float-e-margins">
                <div class="ibox-title text-center ">
                    {{$reps->onEachSide(1)->appends(Request::capture()->except('page'))->render() }}
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function () {
            //////////////////edit///////////////////
            $(".edit").click(function () {
                /* get data from button */
                var id = $(this).data("my_id")
                var name = $(this).data("name")
                var email = $(this).data("email")
                var company_id = $(this).data("company_id");


                /* set data to inputs of modal */

                $("#name").val(name);
                $("#email").val(email);

                $("#my_company_id").val(company_id);

                /* set action attribute to new url */
                $('#editform').attr('action', '{{url("/admin/representative")}}' + '/' + id);

                /* open the modal */
                $('#myModalww').modal('show');
            });
                ///////////////////delete/////////////////////////

                $(".delete").click(function () {
                    /* get data from button */
                    var id = $(this).data("my_id");
                    /* set action attribute to new url */
                    $('#deleteform').attr('action', '{{url("/admin/representative")}}' + '/' + id);
                    /* open the modal */
                    $('#deleteModal').modal('show');
                })
            ////////////////changepassword///////////////////////
            $(".change").click(function () {
                /* get data from button */
                var id = $(this).data("my_id");
                /* set action attribute to new url */
                $('#changeform').attr('action', '{{url("/admin/rep-change-password")}}' + '/' + id);
                /* open the modal */
                $('#changeModal').modal('show');
            });
                ///////////////////////stop/////////////////////////////
            $(".stop").click(function () {
                /* get data from button */
                var id = $(this).data("my_id");
                var status = $(this).data("status");
                /* set action attribute to new url */
                $('#stopform').attr('action', '{{url("admin/stoprepresentative")}}' + '/' + id );
                $('#my_status').val(status);
                if (status == 'active'){
                    $('#my_text').empty().text('هل انت متاكد من الايقاف');
                }else {
                    $('#my_text').empty().text('هل انت متاكد من التفعيل');
                }

                /* open the modal */
                $('#stopModal').modal('show');
            });

        });
    </script>
@endpush
