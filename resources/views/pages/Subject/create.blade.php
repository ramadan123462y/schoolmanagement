@extends('layouts.master')
@section('css')
    <x-css-toast></x-css-toast>
@section('title')
     {{ trans('pages/Subject.Add a Study Subject') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
     {{ trans('pages/Subject.Add a Study Subject') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                <x-error-validation></x-error-validation>
                <x-message-toaster></x-message-toaster>
                <div class="col-xs-12">
                    <div class="col-md-12">
                        <br>
                        <form action="{{ route('subject.store') }}" method="post" autocomplete="on">
                            @csrf

                            <div class="form-row">
                                <div class="col">
                                   <label for="title">{{ trans('pages/Subject.Subject Name') }}</label>
                                    <input type="text" name="Name_ar" class="form-control">
                                </div>
                                <div class="col">
                                    <label for="title">{{ trans('pages/Subject.Subject Name') }}</label>
                                    <input type="text" name="Name_en" class="form-control">
                                </div>
                            </div>
                            <br>

                            <div class="form-row">
                                <div class="form-group col">
                                   <label for="inputState">{{ trans('pages/Subject.Academic Level') }}</label>
                                    <select class="custom-select my-1 mr-sm-2" name="Grade_id">
                                        <option selected disabled>Choose...</option>
                                        @foreach ($grades as $grade)
                                            <option value="{{ $grade->id }}">{{ $grade->Name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col">
                                    <label for="inputState">{{ trans('pages/Subject.Grade Level') }}</label>
                                    <select name="Class_id" class="custom-select"></select>
                                </div>


                                <div class="form-group col">
                                    <label for="inputState">{{ trans('pages/Subject.Teacher Name') }}</label>
                                    <select class="custom-select my-1 mr-sm-2" name="teacher_id">
                                        <option selected disabled>{{ trans('pages/Subject.Choose') }}...</option>
                                        @foreach ($teachers as $teacher)
                                            <option value="{{ $teacher->id }}">{{ $teacher->Name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">
                                {{ trans('pages/Subject.Add') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
@include('pages.Subject.aiax')

@endsection
