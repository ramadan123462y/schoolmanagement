@extends('layouts.master')
@section('css')
    <x-css-toast></x-css-toast>
@section('title')
    {{ trans('pages/subject.update a Study Subject') }}
@stop
@endsection



@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('pages/subject.update a Study Subject') }}
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
                        <form action="{{ route('subject.update','subject') }}" method="post" autocomplete="off">
                            {{ method_field('patch') }}
                            @csrf
                            <div class="form-row">
                                <div class="col">
                                    <label for="title">{{ trans('pages/subject.Subject Name') }}</label>
                                    <input type="text" name="Name_ar"
                                        value="{{ $subject->getTranslation('name', 'ar') }}" class="form-control">
                                    <input type="hidden" name="id" value="{{ $subject->id }}">
                                </div>
                                <div class="col">
                                    <label for="title">{{ trans('pages/subject.Subject Name') }}</label>
                                    <input type="text" name="Name_en"
                                        value="{{ $subject->getTranslation('name', 'en') }}" class="form-control">
                                </div>
                            </div>
                            <br>

                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="inputState">{{ trans('pages/subject.Academic Level') }}</label>
                                    <select class="custom-select my-1 mr-sm-2" name="Grade_id">
                                        <option selected disabled>{{ trans('Parent_trans.Choose') }}...</option>
                                        @foreach ($grades as $grade)
                                            <option value="{{ $grade->id }}"
                                                {{ $grade->id == $subject->grade_id ? 'selected' : '' }}>
                                                {{ $grade->Name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col">
                                    <label for="inputState">{{ trans('pages/subject.Grade Level') }}</label>
                                    <select name="Class_id" class="custom-select">
                                        <option value="{{ $subject->classroom->id }}">
                                            {{ $subject->classroom->Name_Class }}
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group col">
                                   <label for="inputState">{{ trans('pages/subject.Teacher Name') }}</label>
                                    <select class="custom-select my-1 mr-sm-2" name="teacher_id">
                                        <option selected disabled>{{ trans('Parent_trans.Choose') }}...</option>
                                        @foreach ($teachers as $teacher)
                                            <option value="{{ $teacher->id }}"
                                                {{ $teacher->id == $subject->teacher_id ? 'selected' : '' }}>
                                                {{ $teacher->Name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{ trans('pages/subject.Upadte') }}

                            </button>
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
