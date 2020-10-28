@extends('admins.extends.master')

@section('content1')
        <!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> الاشعارات </title>

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
                                    <h5 style="font-size: 30px"> الاشعارات  </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('alerts')
                    <div class="row">
                        <form action="{{route('post-notices')}}" method="post">
                        @csrf
                        {{method_field('POST')}}
                        <div class="col-lg-12">
                            <div class="col-sm-10">
                                <div>
                                    <h3>الاشعارات </h3>
                                    <div ><label> <input type="radio" checked="" value="1" id="optionsRadios1" name="optionsRadios"> ارسال اشعار لكل العملاء  </label></div>
                                    <div ><label class=col-sm-3> <input type="radio" value="2" id="optionsRadios2" name="optionsRadios"> ارسال اشعار لعميل معين  </label>
                                        @inject('client','App\Client')
                                        <select class="col-sm-6" name="client_id" style="margin-bottom: 1em">
                                            @foreach($clients as $client)
                                                <option value="{{ $client->id }}">{{ $client->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="ibox float-e-margins">
                                <div class="ibox-title ">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <textarea  name="text" cols="100" rows="10" ></textarea>
                                        </div>
                                        <div class="col-lg-12 text-center">
                                            <button class="btn btn-info" > ارسال </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection