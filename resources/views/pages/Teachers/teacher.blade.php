@extends('layouts.master')
@section('css')
    <x-css-toast></x-css-toast>
@section('title')
    {{ trans('pages/teacher.List_Teachers') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('pages/teacher.List_Teachers') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<x-message-toaster></x-message-toaster>
<div class="row">
    <div class="col-md-12 mb-30">
        <x-error-validation></x-error-validation>
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="col-xl-12 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <a href="{{ url('teacher/add_teacher') }}" class="btn btn-success btn-sm" role="button"
                                aria-pressed="true">{{ trans('pages/teacher.Add_Teacher') }}</a><br><br>
                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                    data-page-length="50" style="text-align: center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ trans('pages/teacher.Name_Teacher') }}</th>
                                            <th>{{ trans('pages/teacher.Gender') }}</th>
                                            <th>{{ trans('pages/teacher.Joining_Date') }}</th>
                                            <th>{{ trans('pages/teacher.specialization') }}</th>
                                            <th>{{ trans('pages/teacher.processers') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($Teachers as $Teacher)
                                            <tr>

                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $Teacher->Name }}</td>
                                                <td>{{ $Teacher->gender->Name }}</td>
                                                <td>{{ $Teacher->Joining_Date }}</td>
                                                <td>{{ $Teacher->specialization->Name }}</td>
                                                <td>
                                                    <a href="{{ url('teacher/edit', $Teacher->id) }}"
                                                        class="btn btn-info btn-sm" role="button"
                                                        aria-pressed="true"><i class="fa fa-edit"></i></a>

                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        data-toggle="modal"
                                                        data-id="{{ $Teacher->id }}"
                                                        data-target="#delete_Teacher"
                                                        title="Delete"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@include('pages.Teachers.delete_model')
</div>

<!-- row closed -->
@endsection
@section('js')
<script>
    $(document).ready(function() {
        $('#delete_Teacher').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var modal = $(this);
            console.log(id);
            modal.find('input[name="id"]').val(id);
        });
    });
</script>
@endsection
