@extends('layouts.master')
@section('css')
    <x-css-toast></x-css-toast>
@section('title')
    {{ trans('pages/quize.Add Test') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('pages/quize.Add Test') }}
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
                        <form action="{{ route('Quize.store') }}" method="post" autocomplete="off">
                            @csrf

                            <div class="form-row">

                                <div class="col">
                                    <label for="title">{{ trans('pages/quize.Test name in Arabic') }}</label>
                                    <input type="text" name="Name_ar" class="form-control">
                                </div>

                                <div class="col">
                                    <label for="title_en">{{ trans('pages/quize.Test name in English') }}</label>
                                    <input type="text" name="Name_en" class="form-control">
                                </div>
                            </div>
                            <br>

                            <div class="form-row">

                                <div class="col">
                                    <div class="form-group">
                                        <label for="Grade_id">{{ trans('pages/quize.Subject') }}:<span
                                            class="text-danger">*</span></label>
                                        <select class="custom-select mr-sm-2" name="subject_id">
                                            <option selected disabled>{{ trans('pages/quize.choose') }} ...</option>
                                            @foreach ($subjects as $subject)
                                                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col">
                                    <label for="Teacher_name">{{ trans('pages/quize.Teacher name') }}: <span
                                        class="text-danger">*</span></label>
                                    <input type="text" readonly value="{{ $teacher->Name }}" name="Name_en" class="form-control">
                                </div>
                                <input type="hidden" value="{{ $teacher->id }}" name="teacher_id" class="form-control">

                            </div>

                            <div class="form-row">

                                <div class="col">
                                    <div class="form-group">
                                        <label for="Grade_id">{{ trans('pages/quize.Grade') }}: <span
                                                class="text-danger">*</span></label>
                                        <select class="custom-select mr-sm-2" name="Grade_id">
                                            <option selected disabled>{{ trans('pages/quize.Choose') }}..</option>
                                            @foreach ($grades as $grade)
                                                <option value="{{ $grade->id }}">{{ $grade->Name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label for="Classroom_id">{{ trans('pages/quize.classrooms') }} : <span
                                                class="text-danger">*</span></label>
                                        <select class="custom-select mr-sm-2" name="Classroom_id">

                                        </select>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label for="section_id">{{ trans('pages/quize.section') }} : </label>
                                        <select class="custom-select mr-sm-2" name="section_id">

                                        </select>
                                    </div>
                                </div>

                            </div>
                            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{ trans('pages/quize.Confirm Data') }}</button>
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
@include('pages.Teachers.dashboard.Quizes.ajax')

@endsection
