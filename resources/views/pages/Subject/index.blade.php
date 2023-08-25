@extends('layouts.master')
@section('css')
    <x-css-toast></x-css-toast>
@section('title')
    {{ trans('pages/subject.List of Subjects') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('pages/subject.List of Subjects') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="col-xl-12 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <x-error-validation></x-error-validation>
                            <x-message-toaster></x-message-toaster>
                            <a href="{{ route('subject.create') }}" class="btn btn-success btn-sm" role="button" aria-pressed="true">{{ trans('pages/subject.Add New Subject') }}</a><br><br>
                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                    data-page-length="50" style="text-align: center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ trans('pages/subject.Subject Name') }}</th>
                                            <th>{{ trans('pages/subject.Educational Stage') }}</th>
                                            <th>{{ trans('pages/subject.Grade Level') }}</th>
                                            <th>{{ trans('pages/subject.Teacher Name') }}</th>
                                            <th>{{ trans('pages/subject.Actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subjects as $subject)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $subject->name }}</td>
                                                <td>{{ $subject->grade->Name }}</td>
                                                <td>{{ $subject->classroom->Name_Class }}</td>
                                                <td>{{ $subject->teacher->Name }}</td>
                                                <td>
                                                    <a href="{{ route('subject.edit', $subject->id) }}"
                                                        class="btn btn-info btn-sm" role="button"
                                                        aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        data-toggle="modal" data-target="#delete_subject"
                                                        data-idbutton="{{ $subject->id }}" title="حذف"><i
                                                            class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('pages.Subject.delete')
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
<script>
    $(document).ready(function() {
        $('#delete_subject').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data('idbutton');
            var modal = $(this);
            console.log(id);
            modal.find('#idmodel').val(id);
        });
    });
</script>
@endsection
