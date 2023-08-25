@extends('layouts.master')
@section('css')

@section('title')

    {{ trans('pages/recipt.Bonds of receipt') }}

@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('pages/recipt.Bonds of receipt') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">


                <div class="row">
                    @foreach ($subjects as $subject)
                        <div class="col-sm-2">
                            <div class="card" style="width: 14rem;">
                                <img src="{{ URL::asset('assets/images/book.jpg') }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $subject->name }}</h5>
                                    <p class="card-text">
                                         {{ trans('dashboardes/studentDashboard.Teacher') }}:{{ $subject->teacher->Name }}
                                        <br>
                                         {{ trans('dashboardes/studentDashboard.Classroom') }}:{{ $subject->classroom->Name_Class }}
                                        <br>
                                        {{ trans('dashboardes/studentDashboard.Grade') }}:{{ $subject->grade->Name }}
                                        <br>

                                    </p>

                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>

        </div>
    </div>
</div>
{{--  --}}

{{--  --}}
@endsection
@section('js')

@endsection
