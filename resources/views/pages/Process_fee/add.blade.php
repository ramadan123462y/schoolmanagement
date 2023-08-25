@extends('layouts.master')
@section('css')
 <x-css-toast></x-css-toast>
@section('title')
    استبعاد رسوم
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
{{ trans('pages/process.Fee Exemption') }}{{ $student->name }}
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
                <form method="post" action="{{ route('process_fee.store') }}" autocomplete="off">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ trans('pages/process.Amount') }} : <span class="text-danger">*</span></label>
                                <input class="form-control" name="Debit" type="number">
                                <input type="hidden" name="student_id" value="{{ $student->id }}"
                                    class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ trans('pages/process.Student balance (due)') }}:</label>
                                <input class="form-control" name="final_balance"
                                    value="{{ number_format($student->student_accounts->sum('Debit') - $student->student_accounts->sum('credit'), 2) }}"
                                    type="text" readonly>
                            </div>
                            <div class="form-group">
                                <label>{{ trans('pages/process.Balance paid by the student:') }}</label>
                                <input class="form-control" name="final_balance"
                                    value="{{ number_format($student->student_accounts->sum('credit'), 2) }}"
                                    type="text" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{ trans('pages/process.Description:') }} <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{ trans('pages/process.submit') }}</button>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
