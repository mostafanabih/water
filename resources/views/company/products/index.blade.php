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
                            <div class="col-lg-5">
                                <h5 style="font-size: 30px"> المنتجات</h5>
                            </div>
                            <form class="form-inline" action="">
                                <div class="col-lg-2">

                                    <input value="{{request('search') ?? ''}}" type="search" name="search"
                                           placeholder="ابحث عن منتج معين   "
                                           class="form-control">

                                </div>
                                <div class="col-lg-1">
                                    <button type="submit" class="btn btn-sm btn-white"
                                            style="float: left; font-size: 15px ; margin-left:-12px">بحث
                                    </button>
                                </div>
                            </form>
                            <div class="col-lg-4 text-left">
                                <button type="submit" class="btn btn-warning" data-toggle="modal" data-target="#add">اضف
                                    جديد
                                </button>
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
                                    <table class=" table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>اسم المنتج</th>
                                            <th>الصوره</th>
                                            <th>السعر العادى</th>
                                            <th>سعر العروض</th>
                                            <th>سعر المساجد و الجمعيات الخيريه</th>
                                            <th> العمليات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach( $products as $product )
                                            <tr>
                                                <td>1</td>
                                                <td> {{$product->name}} </td>
                                                <td><img src="{{$product->getImgDisplay()}}" width="100" height="100"/>
                                                </td>
                                                <td> {{($product->normal_price > 0) ? $product->normal_price : '-----'}} </td>
                                                <td> {{($product->mosque_price > 0) ? $product->mosque_price : '-----'}} </td>
                                                <td> {{($product->offer_price > 0) ? $product->offer_price : '-----'}} </td>
                                                <td>
                                                    <button type="button" class="btn btn-success edit_btn"
                                                            data-image="{{$product->getImgDisplay()}}"
                                                            data-name="{{$product->name}}"
                                                            data-mosque-price="{{$product->mosque_price}}"
                                                            data-mosque="{{$product->mosque}}"
                                                            data-offer-price="{{$product->offer_price}}"
                                                            data-offer="{{$product->offer}}"
                                                            data-id="{{$product->id}}"

                                                            data-normal-price="{{$product->normal_price}}"
                                                            data-normal="{{$product->normal}}"

                                                            data-size="{{$product->size}}"
                                                            >تعديل
                                                    </button>
                                                    {{--<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delet">حذف</button>--}}

                                                    <form action="{{route('products.destroy', $product->id)}}"
                                                          method="post">
                                                        @csrf
                                                        {{method_field('DELETE')}}
                                                        {{--{!! Form::open([--}}

                                                        {{--'method' => 'DELETE',--}}
                                                        {{--'route' => ['products.destroy', $product->id]--}}
                                                        {{--]) !!}--}}
                                                        {{--{!! Form::submit('<i class="fa fa-remove fa-2x"></i>', ['class' => 'fa fa-remove fa-2x']) !!}--}}
                                                        <button type="submit"
                                                                onclick="return confirm(' هل تريد المسح ؟ ')"
                                                                class="no-btn btn btn-danger"> حذف
                                                        </button>
                                                    </form>
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
                    <div class="ibox-title">
                        <!--start-up-add-->
                        <div class="modal inmodal" id="add" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="ibox-content modal-content animated bounceInRight">
                                    <div class="ibox float-e-margins">
                                        <div class="col-sm-12">
                                            <h4 class="text-center">اضافه منتج</h4>

                                            <form method="post" action="{{route('products.store')}}"
                                                  class="form-horizontal" enctype="multipart/form-data">
                                                {{csrf_field()}}
                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label">اسم المنتج</label>

                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="name"/>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label">حجم المنتج</label>

                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="size"/>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label">الصوره </label>

                                                    <div class="col-sm-8">
                                                        <input type="file" class="form-control" name="image"/>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label"> عادى </label>
                                                    <input type="checkbox" class="col-sm-2 control-label" name="normal"
                                                           value="1"/>

                                                    <div class="col-sm-6"><label
                                                                class="col-sm-4 control-label">السعر</label>
                                                        <input type="text" class="form-control col-sm-8"
                                                               placeholder="السعر " name="normal_price">
                                                    </div>
                                                </div>
                                                <div class="form-group"><label class="col-sm-4 control-label">
                                                        عروض</label>
                                                    <input type="checkbox" class="col-sm-2 control-label" name="offer"
                                                           value="1"/>

                                                    <div class="col-sm-6">
                                                        <label class="col-sm-4 control-label">السعر</label>
                                                        <input type="text" class="form-control col-sm-8"
                                                               placeholder="السعر " name="offer_price"/>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label"> مساجد و جمعيات خيريه </label>
                                                    <input type="checkbox" class="col-sm-2 control-label" name="mosque"
                                                           value="1"/>

                                                    <div class="col-sm-6">
                                                        <label class="col-sm-4 control-label">السعر</label>
                                                        <input type="text" class="form-control col-sm-8"
                                                               placeholder="السعر " name="mosque_price">
                                                    </div>
                                                </div>
                                                <div class="text-center">
                                                    <button type="submit" class="btn btn-success">حفظ</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end-up-add-->

                        <!--start-up-update-->
                        <div class="modal inmodal" id="update" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="ibox-content modal-content animated bounceInRight">
                                    <div class="ibox float-e-margins">
                                        <div class="col-sm-12">
                                            <h4 class="text-center"> تعديل منتج</h4>

                                            <form method="post" class="form-horizontal" id="editform"
                                                  enctype="multipart/form-data">
                                                {{csrf_field()}}
                                                {{method_field('PUT')}}
                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label">اسم المنتج</label>

                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="name" id="name">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label">حجم المنتج</label>

                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="size" id="size">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12 text-center" id="product_image"></div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label">الصوره </label>

                                                    <div class="col-sm-8"><input type="file" class="form-control"
                                                                                 name="file" id="file"></div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label">
                                                        عادى
                                                    </label>
                                                    <input type="checkbox" class="col-sm-2 control-label" id="normal"
                                                           name="normal"/>

                                                    <div class="col-sm-6">
                                                        <label class="col-sm-4 control-label">السعر</label>
                                                        <input type="text" class="form-control col-sm-8"
                                                               id="normal_price" name="normal_price"
                                                               placeholder="السعر ">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label">
                                                        عروض</label>
                                                    <input type="checkbox" class="col-sm-2 control-label" id="offer"/>

                                                    <div class="col-sm-6">
                                                        <label class="col-sm-4 control-label">السعر</label>
                                                        <input type="text" class="form-control col-sm-8"
                                                               name="offer_price" id="offer_price" placeholder="السعر ">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label">
                                                        مساجد و

                                                        جمعيات خيريه </label>
                                                    <input type="checkbox" name="mosque" class="col-sm-2 control-label"
                                                           id="mosque"/>

                                                    <div class="col-sm-6">
                                                        <label class="col-sm-4 control-label">السعر</label>
                                                        <input type="text" class="form-control col-sm-8"
                                                               placeholder="السعر " id="mosque_price"
                                                               name="mosque_price">
                                                    </div>
                                                </div>
                                                <div class="text-center">
                                                    <button type="submit" class="btn btn-success">
                                                        حفظ
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--end-up-update-->
                        <!--start-up-change-->
                        <div class="modal inmodal" id="change" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="ibox-content modal-content animated bounceInRight">
                                    <div class="col-sm-6 ">
                                        <h5 class="text-center">اكوافينا</h5>

                                        <form method="get" class="form-horizontal">
                                            <div class="form-group"><label class="col-sm-4 control-label">Normal</label>

                                                <div class="col-sm-6"><input type="text" class="form-control"></div>
                                                <strong class="col-sm-2">%</strong>
                                            </div>
                                        </form>
                                        <div class="text-center">
                                            <button type="button" class="btn btn-warning text-center"> حفظ</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end-up-change-->
                        <!--start-delet-->
                        <div class="modal inmodal" id="delet" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="delet modal-content animated bounceInRight" style="padding: 1em">
                                    <p>هل انت متاكد من الحذف</p>
                                    <button type="button" class="btn btn-danger">نعم</button>
                                    <button type="button" class="btn btn-warning" data-dismiss="modal">الغاء</button>
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
                            {!! $products->links() !!}
                        </div>
                    </div>
                    <!--end-end-->
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(".edit_btn").click(function (e) {
//            alert("DFdfdf")
            e.preventDefault();
            let image = $(this).data('image'),
                    offerPrice = $(this).data('offer-price'),
                    offer = $(this).data('offer'),
                    normalPrice = $(this).data('normal-price'),
                    normal = $(this).data('normal'),
                    mosquePrice = $(this).data('mosque-price'),
                    mosque = $(this).data('mosque'),
                    id = $(this).data('id'),
                    name = $(this).data('name'),
                    size = $(this).data('size');


            $("#product_image").empty().append('<img src="' + image + '" class="center-block img-preview-sm img-responsive" >');

            $("#name").val(name);
            $("#size").val(size);
            $("#normal").val(normal);
            $("#offer").val(offer);
            $("#mosque").val(mosque);
            $("#normal_price").val(normalPrice);
            $("#mosque_price").val(mosquePrice);
            $("#offer_price").val(offerPrice);


            if (offer == 1) {
                $("#offer").prop("checked", true);
            } else {
                $("#offer").prop("checked", false);
            }
            if (normal == 1) {
                $("#normal").prop("checked", true);
            } else {
                $("#normal").prop("checked", false);
            }

            if (mosque == 1) {
                $("#mosque").prop("checked", true);
            } else {
                $("#mosque").prop("checked", false);
            }


            $('#editform').attr('action', '{{url("company/products")}}' + '/' + id);


            $("#update").modal('show');

        })
    </script>
@endsection

@section('styles')

@endsection