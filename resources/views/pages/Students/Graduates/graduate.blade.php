@extends('layouts.master')
@section('css')
    <x-css-toast></x-css-toast>
@section('title')
    {{ trans('pages/graduate.list_Graduate') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('pages/graduate.list_Graduate') }} <i class="fas fa-user-graduate"></i>
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <x-message-toaster></x-message-toaster>
                <x-error-validation></x-error-validation>
                <div class="col-xl-12 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                    data-page-length="50" style="text-align: center">
                                    <thead>
                                        <tr class="alert-success">
                                            <th>#</th>
                                            <th>{{ trans('pages/graduate.name') }}</th>
                                            <th>{{ trans('pages/graduate.email') }}</th>
                                            <th>{{ trans('pages/graduate.gender') }}</th>
                                            <th>{{ trans('pages/graduate.Grade') }}</th>
                                            <th>{{ trans('pages/graduate.classrooms') }}</th>
                                            <th>{{ trans('pages/graduate.section') }}</th>
                                            <th>{{ trans('pages/graduate.Processes') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($students as $student)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $student->name }}</td>
                                                <td>{{ $student->email }}</td>
                                                <td>{{ $student->gender->Name }}</td>
                                                <td>{{ $student->grade->Name }}</td>
                                                <td>{{ $student->classroom->Name_Class }}</td>
                                                <td>{{ $student->section->Name_Section }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-success btn-sm"
                                                        data-toggle="modal" data-target="#Return_Student"
                                                        data-idstudent="{{ $student->id }}"
                                                        data-namestudent="{{ $student->name }}"
                                                        title="Retrieve Student">{{ trans('pages/graduate.Retrieve') }}
                                                        <button type="button" class="btn btn-danger btn-sm"
                                                            data-toggle="modal" data-target="#Delete_Student"
                                                            data-idstudentd="{{ $student->id }}"
                                                            data-namestudentd="{{ $student->name }}"
                                                            title="Delete Student">{{ trans('pages/graduate.Delete Student') }}</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('pages.Students.Graduates.return')
            @include('pages.Students.Graduates.delete')
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
{{-- model return --}}
<script>
    $(document).ready(function() {
        $('#Return_Student').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); //

            var id = button.data('idstudent');
            var namestudent = button.data('namestudent');
            var modal = $(this);
            // console.log(id)
            modal.find('#id_model').val(id);
            modal.find('#namestudent_model').val(namestudent);

        });
    });
</script>

{{-- model delete --}}
<script>
    $(document).ready(function() {
        $('#Delete_Student').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); //

            var id = button.data('idstudentd');
            var namestudent = button.data('namestudentd');
            var modal = $(this);
            // console.log(id)
            modal.find('#model_id').val(id);
            modal.find('#model_name').val(namestudent);

        });
    });
</script>
@endsection
