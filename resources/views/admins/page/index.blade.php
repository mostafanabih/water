@extends('admins.extends.master')

@section('content1')
        <!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> الصفحات الثابته</title>

    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/summernote/summernote.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/summernote/summernote-bs3.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/bootstrap.rtl.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style-rtl.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/new-stylel.css')}}" rel="stylesheet">
</head>
@endsection
@section('content2')
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-12">
                <!--start-title-->
                <div class="ibox float-e-margins">
                    <div class="ibox-title ">
                        <div class="row">
                            <div class="col-sm-8">
                                <h5 style="font-size: 30px"> الصفحات الثابته  </h5>
                            </div>    <div class="col-sm-4">
                                <button type="button" class="btn btn-success" ><a href="{{url('admin/page/create')}}" style="color:inherit;"> اضافه</a> </button>
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
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th> اسم المستخدم   </th>
                                            <th>العمليات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($rules as $rule)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td> {{$rule->title}} </td>
                                            <td>
                                                <button type="button" class="btn btn-info" ><a href="{{url('admin/page/'.$rule->id)}}"  style="color: inherit"> عرض</a></button>
                                                <button type="button" class="btn btn-success" ><a href="{{url('admin/page/'.$rule->id.'/edit')}}" style="color: inherit"> تعديل </a> </button>
                                                <button type="button" class="btn btn-danger delete" data-my_id="{{$rule->id}}">حذف</button>
                                            </td>
                                        </tr>
                                      @endforeach
                                        </tbody>
                                    </table>
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
                                    <!--end-table-->
                                    <!--start-end-->
                                    <div class="ibox float-e-margins">
                                        <div class="ibox-title text-center ">
                                            {{$rules->links()}}
                                        </div>
                                    </div>
                                    <!--end-end-->
                                </div>
                            </div>
                        </div>
@endsection
                        @push('scripts')
                            <script>
                                $(document).ready(function () {
                                    $(".delete").click(function () {
                                        /* get data from button */
                                        var id = $(this).data("my_id");
                                        /* set action attribute to new url */
                                        $('#deleteform').attr('action', '{{url("/admin/page")}}' + '/' + id);
                                        /* open the modal */
                                        $('#deleteModal').modal('show');
                                    });
                                });
                            </script>
                        @endpush
