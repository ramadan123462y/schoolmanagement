@extends('layouts.master')
@section('css')
    <x-css-toast></x-css-toast>
@section('title')
    {{ trans('dashboardes/teacher.Profile') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('dashboardes/teacher.Profile') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->

<div class="card-body">
    <x-message-toaster></x-message-toaster>
    <x-error-validation></x-error-validation>
    <section style="background-color: #eee;">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <img src="{{ URL::asset('assets/images/teacher.png') }}" alt="avatar"
                            class="rounded-circle img-fluid" style="width: 150px;">
                        <h5 style="font-family: Cairo" class="my-3">{{ $information->Name }}</h5>
                        <p class="text-muted mb-1">{{ $information->Email }}</p>
                        <p class="text-muted mb-4">{{ trans('dashboardes/teacher.Teacher') }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ url('teacher/profile/update') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">{{ trans('dashboardes/teacher.Name') }}(ar) </p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">
                                        <input type="text" name="Name_ar"
                                            value="{{ $information->getTranslation('Name', 'ar') }}"
                                            class="form-control">
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">{{ trans('dashboardes/teacher.Name') }}(en) </p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">
                                        <input type="text" name="Name_en"
                                            value="{{ $information->getTranslation('Name', 'en') }}"
                                            class="form-control">
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">{{ trans('dashboardes/teacher.Password') }} </p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">
                                        <input type="password" id="password" value="{{ $information->Password }}"
                                            class="form-control" name="password">
                                    </p><br><br>
                                    <input type="checkbox" class="form-check-input" onclick="myFunction()"
                                        id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Show </label>
                                </div>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-success">{{ trans('dashboardes/teacher.Update') }} </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- row closed -->
@endsection
@section('js')
<script>
    function myFunction() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
@endsection
