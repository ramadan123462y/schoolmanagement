@extends('layouts.master')
@section('css')
    <x-css-toast></x-css-toast>
@section('title')





{{ trans('pages/process.Fee processing systems') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
{{ trans('pages/process.Fee processing systems') }}
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
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr class="alert-success">
                                            <th>#</th>
                                            <th>{{ trans('pages/process.Name') }} </th>
                                            <th>{{ trans('pages/process.Amount') }}</th>
                                            <th>{{ trans('pages/process.Description') }}</th>
                                            <th>{{ trans('pages/process.Operations') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($ProcessingFees as $ProcessingFee)
                                            <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{$ProcessingFee->student->name}}</td>
                                            <td>{{ number_format($ProcessingFee->amount, 2) }}</td>
                                            <td>{{$ProcessingFee->description}}</td>
                                                <td>
                                                    <a href="{{ route('process_fee.edit',$ProcessingFee->id) }}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete_receipt"
                                                    data-idbutton="{{ $ProcessingFee->id}}"
                                                    ><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>

                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                        @include('pages.Process_fee.delete')
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
        $('#Delete_receipt').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data('idbutton');
            var modal = $(this);
            console.log(id);
            modal.find('#idmodel').val(id);
        });
    });
</script>
@endsection
