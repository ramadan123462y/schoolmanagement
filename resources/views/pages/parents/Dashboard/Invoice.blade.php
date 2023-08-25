@extends('layouts.master')
@section('css')
    <x-css-toast></x-css-toast>
@section('title')
{{ trans('pages/invoice.Tuition fees') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
{{ trans('pages/invoice.Tuition fees') }}
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
                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                    data-page-length="50" style="text-align: center">
                                    <thead>
                                        <tr class="alert-success">
                                            <th>#</th>
                                            <th>{{ trans('pages/invoice.Name') }}</th>
                                            <th>{{ trans('pages/invoice.Fee Type') }}</th>
                                            <th>{{ trans('pages/invoice.Amount') }}</th>
                                            <th>{{ trans('pages/invoice.Academic Stage') }}</th>
                                            <th>{{ trans('pages/invoice.Grade') }}</th>
                                            <th>{{ trans('pages/invoice.Statement') }}</th>
                                            <th>{{ trans('pages/invoice.Actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($Fee_invoices as $Fee_invoice)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $Fee_invoice->student->name }}</td>
                                                <td>{{ $Fee_invoice->fees->title }}</td>
                                                <td>{{ number_format($Fee_invoice->amount, 2) }}</td>
                                                <td>{{ $Fee_invoice->grade->Name }}</td>
                                                <td>{{ $Fee_invoice->classroom->Name_Class }}</td>
                                                <td>{{ $Fee_invoice->description }}</td>
                                                <td>
                                                    <a href="{{ url('parent/recipt',$Fee_invoice->student->id) }}"
                                                        title="المدفوعات" class="btn btn-info btn-sm" role="button"
                                                        aria-pressed="true"><i class="far fa-eye"></i></a>
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
</div>
<!-- row closed -->
@endsection
@section('js')
<script>
    @if (Session::has('error'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.error({{ session('error') }});
    @endif
</script>
@endsection
