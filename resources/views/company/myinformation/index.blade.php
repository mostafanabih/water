@extends('company.template')
@section('style')
<!-- live search -->
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-select.css') }}">
@endsection
@section('title')
    Main Dashboard
@endsection
@section('content')
    @include('alerts')
    <div class="wrapper wrapper-content">
        <form action="{{url('company/mydata/'.$company->id)}}" method="post" class="form-horizontal">
            {{csrf_field()}}
            {{method_field('PUT')}}
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title ">
                        <div class="row">
                            <div class="col-lg-8">
                                <h5 style="font-size: 30px"> تعديل بياناتي</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="img text-center" >
                                <div class="row">
                                    <div class="col-lg-9">
                                        <div class="ibox float-e-margins">
                                            <input class="hidden" name="company_id" value="{{auth()->guard('company')->user()->company_id}}">
                                            <div class="col-sm-12">
                                                <div class="form-group"><label class="col-sm-4 control-label">الاسم </label>
                                                    <div class="col-sm-8"><input type="text" name="name" class="form-control" value="{{$company->name}}" style="margin-bottom: 1em"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label">المدن</label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control selectpicker" name="cities[]" data-live-search="true" multiple required data-size="5">
                                                            @foreach($cities as $city)
                                                                <option value="{{$city->id}}" @if(in_array($city->id, $city_companies)) selected @endif>{{$city->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group"><label class="col-sm-4 control-label">الجوال</label>
                                                    <div class="col-sm-8"><input type="text" name="mobile" value="{{$company->mobile}}" class="form-control"style="margin-bottom: 1em"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group"><label class="col-sm-4 control-label">كلمه المرور</label>
                                                    <div class="col-sm-8"><input type="password" name="password" class="form-control"style="margin-bottom: 1em"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group"><label class="col-sm-4 control-label">تاكيد كلمه المرور</label>
                                                    <div class="col-sm-8"><input type="password" name="password_confirmation" class="form-control"style="margin-bottom: 1em"></div>
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
                    <div class="ibox-title ">
                        <div class="row">

                            <div class="form-group col-sm-3">
                                <label class=" control-label">  ايام العمل </label>
                                <span class="help-block">*يجب اختيار يوم واحد ع الاقل</span>
                            </div>

                            <div class="form-group col-sm-3">
                                <div>  <label><input type="checkbox" name="days[]" value="saturday" @if(in_array('saturday', $comp_days)) {{'checked'}} @endif> السبت</label></div>
                                <div>  <label><input type="checkbox" name="days[]" value="sunday" @if(in_array('sunday', $comp_days)) {{'checked'}} @endif> الاحد</label></div>
                                <div>  <label><input type="checkbox" name="days[]" value="monday" @if(in_array('monday', $comp_days)) {{'checked'}} @endif > الاثنين </label></div>
                                <div>  <label><input type="checkbox" name="days[]" value="tuesday" @if(in_array('tuesday', $comp_days)) {{'checked'}} @endif > الثلاثاء</label></div>
                                <div>  <label><input type="checkbox" name="days[]" value="wednesday" @if(in_array('wednesday', $comp_days)) {{'checked'}} @endif > الاربعاء</label></div>
                                <div>  <label><input type="checkbox" name="days[]" value="thursday" @if(in_array('thursday', $comp_days)) {{'checked'}} @endif> الخميس </label></div>
                                <div>  <label><input type="checkbox" name="days[]" value="friday" @if(in_array('friday', $comp_days)) {{'checked'}} @endif > الجمعه  </label></div>
                            </div>
                            <div class="form-group col-sm-2">
                                <label class=" control-label">فتره العمل  </label>
                            </div>
                            <div class="form-group col-sm-2">
                                <label> من <input type="time" name="from_time" value="{{$from_time}}" required> </label>
                            </div>
                            <div class="form-group col-sm-2">
                                <label> الي <input type="time" name="to_time" value="{{$to_time}}" required>  </label>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="ibox float-e-margins">
                    <div class="ibox-title text-center ">
                        <button type="submit" class="btn btn-warning" >حفظ</button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#stop">الغاء </button>
                    </div>
                </div>
            </div>
        </div>
    {{--<div class="modal inmodal" id="stop" tabindex="-1" role="dialog" aria-hidden="true">--}}
        {{--<div class="modal-dialog">--}}
            {{--<div class="modal-content  animated bounceInRight"  aria-hidden="true" style=" padding: 1em;">--}}
                {{--<p>هل انت متاكد من الغاء التعديل  </p>--}}
                {{--<button type="button"class="btn btn-danger">نعم</button>--}}
                {{--<button type="button" class="btn btn-warning">الغاء</button>--}}
            {{--</div>--}}
        {{--</div>--}}

    {{--</div>--}}
        </form>
    </div>
@endsection

@section('script')
    <!-- live search -->
    <script src="{{ asset('assets/js/bootstrap-select.js') }}"></script>
@endsection