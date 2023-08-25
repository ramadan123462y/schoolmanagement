@extends('layouts.master')
@section('css')
    <x-css-toast></x-css-toast>
@section('title')

{{ trans('pages/recipt.Bonds of receipt') }}

@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
{{ trans('pages/recipt.Bonds of receipt') }}
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
                                            <th>{{ trans('pages/recipt.Name') }}</th>
                                            <th>{{ trans('pages/recipt.Amount') }}</th>
                                            <th>{{ trans('pages/recipt.Statement') }}</th>
                                            <th>{{ trans('pages/recipt.Operations') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($receipt_students as $receipt_student)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $receipt_student->student->name }}</td>
                                                <td>{{ number_format($receipt_student->Debit, 2) }}</td>
                                                <td>{{ $receipt_student->description }}</td>
                                                <td>
                                                    <a href="{{ route('recipt.edit', $receipt_student->id) }}"

                                                        class="btn btn-info btn-sm" role="button"

                                                        aria-pressed="true"><i class="fa fa-edit"></i>
                                                    </a>
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        data-toggle="modal" data-target="#Delete_receipt"
                                                        data-idbutton="{{ $receipt_student->id }}"

                                                        ><i
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
            @include('pages.Recipt.delete')
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
<script>
    $(document).ready(function() {
        $('#Delete_receipt').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('idbutton');
            var modal = $(this);
            console.log(id);
            modal.find('#idmodel').val(id);
        });
    });
</script>
@endsection
