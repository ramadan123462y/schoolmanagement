@extends('layouts.master')
@section('css')
    <x-css-toast></x-css-toast>
@section('title')
    {{ trans('pages/libraryy.Book Editing') }}
    {{ $book->title }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('pages/libraryy.Book Editing') }}
    {{ $book->title }}
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
                        <form action="{{ route('book.update', 'book') }}" method="post" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-row">

                                <div class="col">
                                    <label for="title">{{ trans('pages/libraryy.Book Title') }}</label>
                                    <input type="text" name="title" value="{{ $book->title }}"
                                        class="form-control">
                                    <input type="hidden" name="id" value="{{ $book->id }}"
                                        class="form-control">
                                </div>

                            </div>
                            <br>

                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="Grade_id">{{ trans('pages/libraryy.Grade') }}: <span class="text-danger">*</span></label>

                                        <select class="custom-select mr-sm-2" name="Grade_id">
                                            <option disabled>{{ trans('pages/libraryy.Choose') }}...</option>

                                            @foreach ($grades as $grade)
                                                <option value="{{ $grade->id }}"
                                                    {{ $book->Grade_id == $grade->id ? 'selected' : '' }}>
                                                    {{ $grade->Name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label for="Classroom_id">{{ trans('pages/libraryy.classrooms') }} : <span
                                                class="text-danger">*</span></label>
                                        <select class="custom-select mr-sm-2" name="Classroom_id">
                                            <option value="{{ $book->classroom->id }}">
                                                {{ $book->classroom->Name_Class }}
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label for="section_id">{{ trans('pages/libraryy.section') }} : </label>
                                        <select class="custom-select mr-sm-2" name="section_id">
                                            <option value="{{ $book->section->id }}">
                                                {{ $book->section->Name_Section }}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div><br>

                            <div class="form-row">
                                <div class="col">

                                    <embed src="{{ URL::asset('Books/' . $book->file_name) }}" type="application/pdf"
                                        height="150px" width="300px"><br><br>

                                    <input type="hidden" name="oldfile_name" value="{{ $book->file_name }}">
                                    <div class="form-group">

                                        <label for="academic_year">{{ trans('pages/libraryy.Attachments') }}: <span
                                                class="text-danger">*</span></label>
                                        <input type="file" accept="application/pdf" name="file_name">
                                    </div>

                                </div>
                            </div>

                            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{ trans('pages/libraryy.Save Data') }}</button>

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
