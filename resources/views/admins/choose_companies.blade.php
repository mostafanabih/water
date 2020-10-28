@extends('admins.extends.master')
@section('content1')
        <!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>اختيار الشركات</title>

    <!-- live search -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-select.css') }}">

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
                                <h5 style="font-size: 30px">اختيار الشركات للعرض بالصفحة التعريفية :</h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ibox-content">
                    @include('alerts')
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title" style="min-height: 500px">
                                    <form action="{{route('choose-company.store')}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label class="col-md-3">اختر الشركات للعرض :</label>
                                            <div class="col-md-9">
                                                <select class="form-control selectpicker"
                                                        name="companies[]" title="اختر الشركات ..."
                                                        data-live-search="true" multiple
                                                        data-size="10">
                                                    @foreach($companies as $company)
                                                        <option value="{{$company->id}}" @if(in_array($company->id, $arr)){{'selected'}}@endif>{{$company->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="clearfix"></div>
                                        <br>
                                        <div class="col-sm-6 col-sm-offset-3 col-xs-12">
                                            <button type="submit" class="btn btn-primary btn-block">حفظ</button>
                                        </div>
                                    </form>

                                    <div class="clearfix"></div>
                                    <hr>
                                    <div class="clearfix"></div>

                                    <div class="col-md-12">
                                        @forelse($choose_companies as $choose_company)
                                            <div class="col-md-3">
                                                <div style="margin-bottom: 10px">
                                                    <img src="{{$choose_company->Company->getImgDisplay()}}" class="img-responsive img-circle img-preview-sm" alt="company image">
                                                </div>
                                            </div>
                                        @empty
                                            <div class="text-center">
                                                <h4>لا يوجد شركات تم اختيارها حتى الأن</h4>
                                            </div>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
        <!-- live search -->
    <script src="{{ asset('assets/js/bootstrap-select.js') }}"></script>
@endpush