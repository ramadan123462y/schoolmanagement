@extends('layouts.master')
@section('css')
    <x-css-toast></x-css-toast>
@section('title')
{{ trans('pages/fees.Tuition Fees') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
{{ trans('pages/fees.Tuition Fees') }}
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
                            <a href="{{route('fees.create')}}" class="btn btn-success btn-sm" role="button" aria-pressed="true">{{ trans('pages/fees.Add New Fees') }}</a><br><br>
                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                    data-page-length="50" style="text-align: center">
                                    <thead>
                                        <tr class="alert-success">
                                            <th>#</th>
                                            <th>{{ trans('pages/fees.Name') }}</th>
                                            <th>{{ trans('pages/fees.Amount') }}</th>
                                            <th>{{ trans('pages/fees.Academic Level') }}</th>
                                            <th>{{ trans('pages/fees.Grade') }}</th>
                                            <th>{{ trans('pages/fees.School Year') }}</th>
                                            <th>{{ trans('pages/fees.Notes') }}</th>
                                            <th>{{ trans('pages/fees.Actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($fees as $fee)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $fee->title }}</td>
                                                <td>{{ number_format($fee->amount, 2) }}</td>
                                                <td>{{ $fee->grade->Name }}</td>
                                                <td>{{ $fee->classroom->Name_Class }}</td>
                                                <td>{{ $fee->year }}</td>
                                                <td>{{ $fee->description }}</td>
                                                <td>
                                                    <a href="{{ route('fees.edit', $fee->id) }}"
                                                        class="btn btn-info btn-sm" role="button"
                                                        aria-pressed="true"><i class="fa fa-edit"></i></a>


                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        data-toggle="modal" data-target="#Delete_Fee"
                                                        data-idfees="{{ $fee->id }}" title=""><i
                                                            class="fa fa-trash"></i></button>


                                                    <a href="#" class="btn btn-warning btn-sm" role="button"
                                                        aria-pressed="true"><i class="far fa-eye"></i></a>

                                                </td>
                                            </tr>
                                        @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                @include('pages.Students.Fees.delete')
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
<script>
    $(document).ready(function() {
        $('#Delete_Fee').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data('idfees');
            var modal = $(this);
            modal.find('#modelid').val(id);
        });
    });
</script>
@endsection
