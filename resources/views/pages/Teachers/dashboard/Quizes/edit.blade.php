@extends('layouts.master')
@section('css')
    <x-css-toast></x-css-toast>
@section('title')
    {{ trans('pages/quize.Edit Test') }}{{ $quizz->name }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('pages/quize.Edit Test') }}{{ $quizz->name }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <x-message-toaster></x-message-toaster>
                <x-error-validation></x-error-validation>
                <div class="col-xs-12">
                    <div class="col-md-12">
                        <br>
                        <form action="{{ route('Quize.update','Quize') }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-row">

                                <div class="col">
                                    <label for="title">{{ trans('pages/quize.Test name in Arabic') }}</label>
                                    <input type="text" name="Name_ar"
                                        value="{{ $quizz->getTranslation('name', 'ar') }}" class="form-control">
                                    <input type="hidden" name="id" value="{{ $quizz->id }}">
                                    <input type="hidden" name="teacher_id" value="{{$teacher_id }}">
                                </div>

                                <div class="col">
                                    <label for="title_en">{{ trans('pages/quize.Test name in English') }}</label>
                                    <input type="text" name="Name_en"
                                        value="{{ $quizz->getTranslation('name', 'en') }}" class="form-control">
                                </div>
                            </div>
                            <br>

                            <div class="form-row">

                                <div class="col">
                                    <div class="form-group">
                                        <label for="Grade_id">{{ trans('pages/quize.Subject') }}:  <span
                                            class="text-danger">*</span></label>
                                        <select class="custom-select mr-sm-2" name="subject_id">
                                            @foreach ($subjects as $subject)
                                                <option value="{{ $subject->id }}"
                                                    {{ $subject->id == $quizz->subject_id ? 'selected' : '' }}>
                                                    {{ $subject->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>



                            </div>

                            <div class="form-row">

                                <div class="col">
                                    <div class="form-group">
                                        <label for="Grade_id">{{ trans('pages/quize.Grade') }}: <span
                                                class="text-danger">*</span></label>
                                        <select class="custom-select mr-sm-2" name="Grade_id">
                                            @foreach ($grades as $grade)
                                                <option value="{{ $grade->id }}"
                                                    {{ $grade->id == $quizz->grade_id ? 'selected' : '' }}>
                                                    {{ $grade->Name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label for="Classroom_id">{{ trans('pages/quize.classrooms') }} : <span
                                                class="text-danger">*</span></label>
                                        <select class="custom-select mr-sm-2" name="Classroom_id">
                                            <option value="{{ $quizz->classroom_id }}">
                                                {{ $quizz->classroom->Name_Class }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label for="section_id">{{ trans('pages/quize.section') }} : </label>
                                        <select class="custom-select mr-sm-2" name="section_id">
                                            <option value="{{ $quizz->section_id }}">
                                                {{ $quizz->section->Name_Section }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div><br>
                            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right"
                                type="submit">{{ trans('pages/quize.Confirm Data') }}</button>
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
