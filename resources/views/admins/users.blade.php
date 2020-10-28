@extends('admins.extends.master')

@section('content1')
        <!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> المستخدمين</title>

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
                            <h5 style="font-size: 30px"> المستخدمين  </h5>
                        </div>
                        <form class="form-inline" action="">
                            <div class="col-lg-2">

                                <input type="text" placeholder="ابحث عن مستخدم  " class="form-control" name="search">

                            </div>
                            <div class="col-lg-1">
                                <button type="submit" class="btn btn-sm btn-white" style="float: left; font-size: 15px ; margin-left:-12px" >بحث</button>
                            </div>
                        </form>
                        <div class="col-lg-5 text-center">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#add">اضافه </button>
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
                                        <th>العمليات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$user->name}}</td>
                                        <td> {{$user->email}}</td>
                                        <td>
                                            <button type="button" class="btn btn-info edit" data-my_id="{{$user->id}}" data-name="{{$user->name}}" data-email="{{$user->email}}" data-mobile="{{$user->mobile}}">تعديل</button>
                                            <button type="button" class="btn btn-success change" data-my_id="{{$user->id}}">تغيير كلمه المرور</button>
                                            @if(auth()->guard('admin')->user()->role_id == 1 and $user->id != auth()->guard('admin')->id())
                                                <button type="button" class="btn btn-danger delete" data-my_id="{{$user->id}}">حذف</button>
                                            @endif
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
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal inmodal" id="add" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="img text-center modal-content animated bounceInRight"   >
                            <div class="row">
                                <div class="col-lg-9">
                                    <div class="ibox float-e-margins  ">
                                        <div class="col-sm-12">
                                            <form action="{{route('user.store')}}" method="post">
                                                @csrf

                                            <h3>اضافه</h3>
                                            <div class="form-group"><label class="col-sm-4 control-label">الاسم  </label>
                                                <div class="col-sm-8"style="margin-bottom: 1em"><input name="name" type="text" value="{{old('name')}}" class="form-control"></div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-4 control-label" > البريد الالكتروني   </label>
                                                <div class="col-sm-8" style="margin-bottom: 1em"><input name="email" type="text" value="{{old('email')}}" class="form-control"></div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-4 control-label" >الهاتف</label>
                                                <div class="col-sm-8" style="margin-bottom: 1em"><input name="mobile" type="tel" value="{{old('mobile')}}" class="form-control"></div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-4 control-label">  كلمه المرور  </label>
                                                <div class="col-sm-8" style="margin-bottom: 1em"><input name="password" type="password"  class="form-control"></div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-4 control-label">  تاكيد كلمه المرور  </label>
                                                <div class="col-sm-8" style="margin-bottom: 1em"><input name="password_confirmation" type="password"  class="form-control"></div>
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
                <div class="modal inmodal" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="img text-center modal-content animated bounceInRight"   >
                            <div class="row">
                                <div class="col-lg-9">
                                    <div class="ibox float-e-margins  ">
                                        <div class="col-sm-12">
                                            <form action=""  method="post" class="form-horizontal" id="editform">
                                                {{csrf_field()}}
                                                {{method_field('PUT')}}
                                            <h3>تعديل </h3>
                                            <div class="form-group"><label class="col-sm-4 control-label">الاسم  </label>
                                                <div class="col-sm-8" style="margin-bottom: 1em"><input type="text" name="name" id="name"  class="form-control"></div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-4 control-label" > البريد الالكتروني   </label>
                                                <div class="col-sm-8" style="margin-bottom: 1em"><input type="text" name="email" id="email"  class="form-control"></div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-4 control-label" >الهاتف</label>
                                                <div class="col-sm-8" style="margin-bottom: 1em"><input type="tel" name="mobile" id="mobile"  class="form-control"></div>
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
                                                <div class="col-sm-8" style="margin-bottom: 1em"><input name="password" type="password"  class="form-control"></div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-4 control-label">  تاكيد كلمه المرور  </label>
                                                <div class="col-sm-8" style="margin-bottom: 1em"><input name="password_confirmation" type="password"  class="form-control"></div>
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
                    {{$users->onEachSide(1)->appends(Request::capture()->except('page'))->render() }}
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
                var id = $(this).data("my_id");
                var name = $(this).data("name");
                var email = $(this).data("email");
                var mobile = $(this).data("mobile");



                /* set data to inputs of modal */

                $("#name").val(name);
                $("#email").val(email);
                $("#mobile").val(mobile);


                /* set action attribute to new url */
                $('#editform').attr('action', '{{url("/admin/user")}}' + '/' + id);

                /* open the modal */
                $('#editModal').modal('show');
            });
            ///////////////////delete/////////////////////////

            $(".delete").click(function () {
                /* get data from button */
                var id = $(this).data("my_id");
                /* set action attribute to new url */
                $('#deleteform').attr('action', '{{url("/admin/user")}}' + '/' + id);
                /* open the modal */
                $('#deleteModal').modal('show');
            });

            //////////////////changepassword//////////////////
            $(".change").click(function () {
                /* get data from button */
                var id = $(this).data("my_id");
                /* set action attribute to new url */
                $('#changeform').attr('action', '{{url("/admin/user-change-password")}}' + '/' + id);
                /* open the modal */
                $('#changeModal').modal('show');
            });
        });
    </script>
@endpush
