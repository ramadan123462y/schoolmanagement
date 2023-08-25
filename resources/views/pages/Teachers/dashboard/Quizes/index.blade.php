@extends('layouts.master')
@section('css')
    <x-css-toast></x-css-toast>
@section('title')
    {{ trans('pages/quize.Tests List') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('pages/quize.Tests List') }}
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
                <div class="col-xl-12 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <a href="{{ route('Quize.create') }}" class="btn btn-success btn-sm" role="button" aria-pressed="true">{{ trans('pages/quize.Add New Test') }}</a><br><br>
                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                    data-page-length="50" style="text-align: center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ trans('pages/quize.Test Name') }}</th>
                                            <th>{{ trans('pages/quize.Teacher Name') }}</th>
                                            <th>{{ trans('pages/quize.Academic Stage') }}</th>
                                            <th>{{ trans('pages/quize.Grade') }}</th>
                                            <th>{{ trans('pages/quize.Section') }}</th>
                                            <th>{{ trans('pages/quize.Actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($quizzes as $quizze)
                                            <tr>
                                                <td> {{ $loop->iteration }}</td>
                                                <td>{{ $quizze->name }}</td>
                                                <td>{{ $quizze->teacher->Name }}</td>
                                                <td>{{ $quizze->grade->Name }}</td>
                                                <td>{{ $quizze->classroom->Name_Class }}</td>
                                                <td>{{ $quizze->section->Name_Section }}</td>
                                                <td>
                                                    <a href="{{ route('Quize.edit',$quizze->id ) }}"
                                                        class="btn btn-info btn-sm" role="button" aria-pressed="true">
                                                        <i class="fa fa-edit"></i></a>

                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        data-toggle="modal" data-target="#delete_exam"
                                                        data-idbutton="{{ $quizze->id }}" title="حذف"><i
                                                            class="fa fa-trash"></i></button>
                                                            <a href="{{ route('Quize.show',$quizze->id) }}"
                                                            class="btn btn-info btn-sm" role="button"
                                                            aria-pressed="true"><i class="fa fa-binoculars"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                   @include('pages.Teachers.dashboard.Quizes.delete')
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
<script>
    $(document).ready(function() {
        $('#delete_exam').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data('idbutton');
            var modal = $(this);
            console.log(id);
            modal.find('#idmodel').val(id);
        });
    });
</script>
@endsection
