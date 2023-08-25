@extends('layouts.master')
@section('css')
    <x-css-toast></x-css-toast>

@section('title')
    {{ trans('pages/fees.Add Fees') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('pages/fees.Add Fees') }}
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

                <form method="post" action="{{ route('fees.store') }}" autocomplete="on">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="inputEmail4"> {{ trans('pages/fees.Name') }}(ar)</label>
                            <input type="text" value="{{ old('title_ar') }}" name="title_ar" class="form-control">
                        </div>

                        <div class="form-group col">
                            <label for="inputEmail4">{{ trans('pages/fees.Name') }}(en) </label>
                            <input type="text" value="{{ old('title_en') }}" name="title_en" class="form-control">
                        </div>


                        <div class="form-group col">
                            <label for="inputEmail4">{{ trans('pages/fees.mount') }}</label>
                            <input type="number" value="{{ old('amount') }}" name="amount" class="form-control">
                        </div>

                    </div>


                    <div class="form-row">

                        <div class="form-group col">
                            <label for="inputState">{{ trans('pages/fees.grade') }} </label>
                            <select class="custom-select mr-sm-2" name="Grade_id">
                                <option selected disabled>{{ trans('pages/fees.Choose') }}...</option>
                                @foreach ($Grades as $Grade)
                                    <option value="{{ $Grade->id }}">{{ $Grade->Name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col">
                            <label for="inputZip">{{ trans('pages/fees.Classroom') }}: </label>
                            <select class="custom-select mr-sm-2" name="Classroom_id">

                            </select>
                        </div>
                        <div class="form-group col">
                            <label for="inputZip">{{ trans('pages/fees.Year') }} </label>
                            <select class="custom-select mr-sm-2" name="year">
                                <option selected disabled>{{ trans('pages/fees.Choose') }}...</option>
                                @php
                                    $current_year = date('Y');
                                @endphp
                                @for ($year = $current_year; $year <= $current_year + 1; $year++)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputAddress">{{ trans('pages/fees.Notes') }}</label>
                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="4"></textarea>
                    </div>
                    <br>

                    <button type="submit" class="btn btn-primary">{{ trans('pages/fees.submit') }}</button>

                </form>

            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
@include('pages.Students.Ajax.ajax1')
@endsection
