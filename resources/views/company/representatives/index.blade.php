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
                                <h5 style="font-size: 30px"> المندوبين </h5>
                            </div>
                            <form class="form-inline" action="">
                                <div class="col-lg-2">
                                    <input type="text" placeholder="ابحث عن مندوب  " class="form-control"
                                           name="search" value="{{request('search') ?? ''}}">
                                </div>
                                <div class="col-lg-1">
                                    <button type="submit" class="btn btn-sm btn-white"
                                            style="float: left; font-size: 15px ; margin-left:-12px">بحث
                                    </button>
                                </div>
                            </form>
                            <div class="col-lg-4 text-left">
                                <button type="submit" class="btn btn-sm btn-info" data-toggle="modal"
                                        data-target="#img ">اضافه
                                </button>
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
                                            <th> الاسم</th>
                                            <th>رقم الجوال</th>
                                            <th>العمليات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($reps as $rep)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$rep->name}}</td>
                                                <td> {{$rep->mobile}}</td>
                                                <td>
                                                    <button type="button" class="btn btn-success edit"
                                                            data-my_id="{{$rep->id}}" data-name="{{$rep->name}}"
                                                            data-mobile="{{$rep->mobile}}">تعديل
                                                    </button>
                                                    <button type="button" class="btn btn-warning change"
                                                            data-my_id="{{$rep->id}}">تغيير كلمه المرور
                                                    </button>
                                                    <button type="button" class="btn btn-danger stop"
                                                            data-my_id="{{$rep->id}}"
                                                            data-status="@if($rep->active=='active'){{'not_active'}}@else{{'active'}}@endif">@if($rep->active=='active'){{'ايقاف'}} @else {{'تفعيل'}} @endif</button>
                                                    <button type="button" class="btn btn-danger delete"
                                                            data-my_id="{{$rep->id}}">حذف
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <div class="modal inmodal" id="deleteModal" tabindex="-1" role="dialog"
                                         aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="delet modal-content animated bounceInRight"
                                                 style="padding: 1em">
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
                                    <div class="modal inmodal" id="stopModal" tabindex="-1" role="dialog"
                                         aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="delet modal-content animated bounceInRight"
                                                 style="padding:1em;">
                                                <form action="" method="post" class="form-horizontal" id="stopform">
                                                    {{csrf_field()}}
                                                    {{method_field('PUT')}}
                                                    <p id="my_text"></p>
                                                    <input type="hidden" name="status" id="my_status">
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
                    <div class="modal inmodal" id="img" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="img text-center modal-content animated bounceInRight">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <div class="ibox float-e-margins  ">
                                            <div class="col-sm-12">
                                                <form action="{{route('representative.store')}}" method="post"
                                                      class="form-horizontal">
                                                    {{csrf_field()}}
                                                    <h3>اضافه</h3>

                                                    <div class="form-group"><label
                                                                class="col-sm-4 control-label">الاسم </label>

                                                        <div class="col-sm-8" style="margin-bottom: 1em"><input
                                                                    type="text" name="name" class="form-control"></div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-4 control-label"> رقم الجوال </label>

                                                        <div class="col-sm-8" style="margin-bottom: 1em">
                                                            <input type="text" name="mobile" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-4 control-label">البريد الالكتروني </label>

                                                        <div class="col-sm-8" style="margin-bottom: 1em"><input
                                                                    type="email" name="email" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group"><label class="col-sm-4 control-label">اسم
                                                            المستخدم </label>

                                                        <div class="col-sm-8" style="margin-bottom: 1em"><input
                                                                    type="text" name="user_name" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group"><label class="col-sm-4 control-label"> كلمه
                                                            المرور </label>

                                                        <div class="col-sm-8" style="margin-bottom: 1em"><input
                                                                    type="password" name="password"
                                                                    class="form-control"></div>
                                                    </div>
                                                    <div class="form-group"><label class="col-sm-4 control-label"> تاكيد
                                                            كلمه المرور </label>

                                                        <div class="col-sm-8" style="margin-bottom: 1em"><input
                                                                    type="password" name="password_confirmation"
                                                                    class="form-control"></div>
                                                    </div>
                                                    <div class="text-center" style="margin-right: 1em">
                                                        <button type="submit" class="btn btn-success">حفظ</button>
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

                                            <div class="form-group"><label class="col-sm-4 control-label">الاسم </label>

                                                <div class="col-sm-8" style="margin-bottom: 1em"><input type="text"
                                                                                                        id="name"
                                                                                                        name="name"
                                                                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-4 control-label"> رقم
                                                    الجوال </label>

                                                <div class="col-sm-8" style="margin-bottom: 1em"><input type="text"
                                                                                                        id="mobile"
                                                                                                        name="mobile"
                                                                                                        class="form-control">
                                                </div>

                                                <div class="text-center" style="margin-right: 1em">
                                                    <button type="submit" class="btn btn-success" onclick="myUpd()">
                                                        حفظ
                                                    </button>
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
        </div>

        <div class="modal inmodal" id="changeModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="img text-center modal-content animated bounceInRight">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="ibox float-e-margins">
                                <div class="col-sm-12">
                                    <form action="" method="post" class="form-horizontal" id="changeform">
                                        {{csrf_field()}}
                                        {{method_field('PUT')}}
                                        <h3>تغير كلمه المرور</h3>

                                        <div class="form-group"><label class="col-sm-4 control-label"> كلمه
                                                المرور </label>

                                            <div class="col-sm-8" style="margin-bottom: 1em"><input type="password"
                                                                                                    name="password"
                                                                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group"><label class="col-sm-4 control-label"> تاكيد كلمه
                                                المرور </label>

                                            <div class="col-sm-8" style="margin-bottom: 1em"><input type="password"
                                                                                                    name="password_confirmation"
                                                                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="text-center" style="margin-right: 1em">
                                            <button type="submit" class="btn btn-success">حفظ</button>
                                        </div>
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

@endsection
@section('script')
    <script>
        $(document).ready(function () {
            //////////////////edit///////////////////
            $(".edit").click(function () {
                /* get data from button */
                var id = $(this).data("my_id")
                var name = $(this).data("name")
                var mobile = $(this).data("mobile")


                /* set data to inputs of modal */

                $("#name").val(name);
                $("#mobile").val(mobile);


                /* set action attribute to new url */
                $('#editform').attr('action', '{{url("/company/representative")}}' + '/' + id);

                /* open the modal */
                $('#editModal').modal('show');
            });
            ///////////////////delete/////////////////////////

            $(".delete").click(function () {
                /* get data from button */
                var id = $(this).data("my_id");
                /* set action attribute to new url */
                $('#deleteform').attr('action', '{{url("/company/representative")}}' + '/' + id);
                /* open the modal */
                $('#deleteModal').modal('show');
            });
            /////////////////changepassword//////////////////////////
            $(".change").click(function () {
                /* get data from button */
                var id = $(this).data("my_id");
                /* set action attribute to new url */
                $('#changeform').attr('action', '{{url("/company/rep-change-password")}}' + '/' + id);
                /* open the modal */
                $('#changeModal').modal('show');
            });
            ///////////////////////stop/////////////////////////////
            $(".stop").click(function () {
                /* get data from button */
                var id = $(this).data("my_id");
                var status = $(this).data("status");
                /* set action attribute to new url */
                $('#stopform').attr('action', '{{url("company/stoprepresentative")}}' + '/' + id);
                $('#my_status').val(status);
                if (status == 'not_active') {
                    $('#my_text').empty().text('هل انت متاكد من الايقاف');
                } else {
                    $('#my_text').empty().text('هل انت متاكد من التفعيل');
                }

                /* open the modal */
                $('#stopModal').modal('show');
            });


        });
    </script>
@endsection

@section('styles')

@endsection