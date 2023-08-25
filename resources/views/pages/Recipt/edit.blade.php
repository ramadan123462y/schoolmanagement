@extends('layouts.master')
@section('css')
    <x-css-toast></x-css-toast>
@section('title')
    {{ trans('pages/recipt.Modified receipt document') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
{{ trans('pages/recipt.Modified receipt document:') }} <label style="color: red">{{ $receipt_student->student->name }}</label>
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

                <form action="{{ route('recipt.update','recipt') }}" method="post" autocomplete="off">
                    @method('PUT')
                    @csrf
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{ trans('pages/recipt.Amount') }} : <span class="text-danger">*</span></label>
                                <input class="form-control" name="Debit" value="{{ $receipt_student->Debit }}"
                                    type="number">
                                <input type="hidden" name="student_id" value="{{ $receipt_student->student->id }}"
                                    class="form-control">
                                <input type="hidden" name="id" value="{{ $receipt_student->id }}"
                                    class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{ trans('pages/recipt.Statement') }} : <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{ $receipt_student->description }}</textarea>
                            </div>
                        </div>

                    </div>

                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right"
                        type="submit">{{ trans('pages/recipt.Submit') }}</button>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
