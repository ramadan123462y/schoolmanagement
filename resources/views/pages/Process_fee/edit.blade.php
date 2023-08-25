@extends('layouts.master')
@section('css')
    <x-css-toast></x-css-toast>
@section('title')
    {{ trans('pages/process.Modification of Fee Processing') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
{{ trans('pages/process.Modification of Fee Processing') }}: <label style="color: red">{{ $ProcessingFee->student->name }}</label>
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
                <form action="{{ route('process_fee.update','process_fee') }}" method="post" autocomplete="off">
                    @method('PUT')
                    @csrf
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{ trans('pages/process.Amount') }} : <span class="text-danger">*</span></label>
                                <input class="form-control" name="Debit" value="{{ $ProcessingFee->amount }}"
                                    type="number">
                                <input type="hidden" name="student_id" value="{{ $ProcessingFee->student->id }}"
                                    class="form-control">
                                <input type="hidden" name="id" value="{{ $ProcessingFee->id }}"
                                    class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{ trans('pages/process.Statement') }} : <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{ $ProcessingFee->description }}</textarea>
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
