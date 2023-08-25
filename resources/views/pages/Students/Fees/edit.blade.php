@extends('layouts.master')
@section('css')
    <x-css-toast></x-css-toast>

@section('title')
   {{trans('pages/fees.Update Fees')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
   {{trans('pages/fees.Update Fees')}}
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

                <form action="{{ route('fees.update', 'fee') }}" method="post" autocomplete="off">
                    @method('PUT')
                    @csrf
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="inputEmail4">{{trans('pages/fees.Name')}}(ar)  </label>
                            <input type="text" value="{{ $fee->getTranslation('title', 'ar') }}" name="title_ar"
                                class="form-control">
                            <input type="hidden" value="{{ $fee->id }}" name="id" class="form-control">
                        </div>

                        <div class="form-group col">
                            <label for="inputEmail4">{{trans('pages/fees.Name')}}(en)  </label>
                            <input type="text" value="{{ $fee->getTranslation('title', 'en') }}" name="title_en"
                                class="form-control">
                        </div>


                        <div class="form-group col">
                            <label for="inputEmail4">{{trans('pages/fees.Mount')}}</label>
                            <input type="number" value="{{ $fee->amount }}" name="amount" class="form-control">
                        </div>

                    </div>


                    <div class="form-row">

                        <div class="form-group col">
                            <label for="inputState">{{trans('pages/fees.Grade')}} </label>
                            <select class="custom-select mr-sm-2" name="Grade_id">
                                @foreach ($Grades as $Grade)
                                    <option value="{{ $Grade->id }}"
                                        {{ $Grade->id == $fee->Grade_id ? 'selected' : '' }}>{{ $Grade->Name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col">
                            <label for="inputZip">{{trans('pages/fees.Classrome')}} </label>
                            <select class="custom-select mr-sm-2" name="Classroom_id">
                               <option value="{{ $fee->classroom->id }}">{{ $fee->classroom->Name_Class }}</option>
                            </select>
                        </div>
                        <div class="form-group col">
                            <label for="inputZip">{{trans('pages/fees.Year')}} </label>
                            <select class="custom-select mr-sm-2" name="year">
                                @php
                                    $current_year = date('Y');
                                @endphp
                                @for ($year = $current_year; $year <= $current_year + 1; $year++)
                                    <option value="{{ $year }}" {{ $year == $fee->year ? 'selected' : ' ' }}>
                                        {{ $year }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputAddress">{{trans('pages/fees.Notes')}}</label>
                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="4">{{ $fee->description }}</textarea>
                    </div>
                    <br>

                    <button type="submit" class="btn btn-primary">{{trans('pages/fees.submit')}}</button>

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
