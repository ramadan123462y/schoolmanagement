@extends('layouts.master')
@section('css')
    <x-css-toast></x-css-toast>

@section('title')
{{ trans('pages/libraryy.Adding a new book') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('pages/libraryy.Adding a new book') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                <x-message-toaster type="success"></x-message-toaster>
                <x-error-validation></x-error-validation>

                <div class="col-xs-12">
                    <div class="col-md-12">
                        <br>
                        <form action="{{ route('book.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">

                                <div class="col">
                                    <label for="title">{{ trans('pages/libraryy.Book Title') }}:</label>
                                    <input type="text" name="title" class="form-control">
                                </div>

                            </div>
                            <br>

                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="Grade_id">{{ trans('pages/libraryy.Grade') }}: <span class="text-danger">*</span></label>
                                        <select class="custom-select mr-sm-2" name="Grade_id">
                                            <option selected disabled>{{ trans('pages/libraryy.Choose') }}...</option>
                                            @foreach ($grades as $grade)
                                                <option value="{{ $grade->id }}">{{ $grade->Name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label for="Classroom_id">{{ trans('pages/libraryy.classrooms') }}: <span class="text-danger">*</span></label>
                                        <select class="custom-select mr-sm-2" name="Classroom_id">

                                        </select>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label for="section_id">{{ trans('pages/libraryy.section') }}: </label>
                                        <select class="custom-select mr-sm-2" name="section_id">

                                        </select>
                                    </div>
                                </div>

                            </div><br>
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="academic_year">{{ trans('pages/libraryy.Attachments') }}: <span
                                                class="text-danger">*</span></label>

                                        <input type="file" accept="application/pdf" name="file_name" required>
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{ trans('pages/libraryy.submit') }}</button>

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
@include('pages.Students.Ajax.ajax1')
@endsection
