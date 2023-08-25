@extends('layouts.master')
@section('css')
  <x-css-toast></x-css-toast>
@section('title')
{{ trans('pages/graduate.add_Graduate') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
{{ trans('pages/graduate.add_Graduate') }}
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
                        <form action="{{ url('graduate/soft_delete') }}" method="post">
                        @csrf
                        @csrf
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="inputState">{{ trans('pages/graduate.Grade') }}</label>
                                <select class="custom-select mr-sm-2" name="Grade_id" required>
                                    <option selected disable>{{ trans('pages/graduate.Choose') }}...</option>
                                    @foreach($Grades as $Grade)
                                        <option value="{{$Grade->id}}">{{$Grade->Name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="Classroom_id">{{ trans('pages/graduate.classrooms') }} : <span
                                        class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="Classroom_id" required>

                                </select>
                            </div>

                            <div class="form-group col">
                                <label for="section_id">{{ trans('pages/graduate.section') }} : </label>
                                <select class="custom-select mr-sm-2" name="section_id" required>

                                </select>
                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary">{{ trans('pages/graduate.submit') }}</button>
                    </form>

                </div>
            </div>
        </div>

    </div>
    <!-- row closed -->
@endsection
@section('js')

  @include('pages.Students.Ajax.ajax1')

@endsection
