@extends('layouts.master')
@section('css')
    <x-css-toast></x-css-toast>
@section('title')
    {{trans('pages/promotion.Students_Promotions')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{trans('pages/promotion.Students_Promotions')}}
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

                <h6 style="color: red;font-family: Cairo">{{trans('pages/promotion.Old Grade')}}</h6><br>

                <form method="post" action="{{ route('promotion.store') }}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="inputState">{{trans('pages/promotion.Grade')}}</label>
                            <select class="custom-select mr-sm-2" name="Grade_id">
                                <option selected disabled>{{trans('pages/promotion.Choose')}}...</option>
                                @foreach ($Grades as $Grade)
                                    <option value="{{ $Grade->id }}">{{ $Grade->Name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col">
                            <label for="Classroom_id">{{trans('pages/promotion.classrooms')}} : <span class="text-danger">*</span></label>
                            <select class="custom-select mr-sm-2" name="Classroom_id">

                            </select>
                        </div>

                        <div class="form-group col">
                            <label for="section_id">{{trans('pages/promotion.section')}} : </label>
                            <select class="custom-select mr-sm-2" name="section_id">

                            </select>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="academic_year">{{trans('pages/promotion.academic_year')}} : <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="academic_year">
                                    <option selected disabled>{{trans('pages/promotion.Choose')}}...</option>
                                    @php
                                        $current_year = date('Y');
                                    @endphp
                                    @for ($year = $current_year; $year <= $current_year + 1; $year++)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>



                    </div>
                    <br>
                    <h6 style="color: red;font-family: Cairo">{{trans('pages/promotion.New Grade')}}</h6><br>

                    <div class="form-row">
                        <div class="form-group col">
                            <label for="inputState">{{trans('pages/promotion.Grade')}}:</label>
                            <select class="custom-select mr-sm-2" name="Grade_id_new">
                                <option selected disabled>{{trans('pages/promotion.Choose')}}...</option>
                                @foreach ($Grades as $Grade)
                                    <option value="{{ $Grade->id }}">{{ $Grade->Name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col">
                            <label for="Classroom_id">{{trans('pages/promotion.classrooms')}}: <span class="text-danger">*</span></label>
                            <select class="custom-select mr-sm-2" name="Classroom_id_new">

                            </select>
                        </div>
                        <div class="form-group col">
                            <label for="section_id">{{trans('pages/promotion.section')}}: </label>
                            <select class="custom-select mr-sm-2" name="section_id_new">

                            </select>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="academic_year">{{trans('pages/promotion.academic_year')}}: <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="academic_year_new">
                                    <option selected disabled>{{trans('pages/promotion.Choose')}}...</option>
                                    @php
                                        $current_year = date('Y');
                                    @endphp
                                    @for ($year = $current_year; $year <= $current_year + 1; $year++)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>


                    </div>
                    <button type="submit" class="btn btn-primary">{{trans('pages/promotion.Submit')}}</button>
                </form>

            </div>
        </div>
    </div>

</div>
<!-- row closed -->
@endsection
@section('js')
@include('pages.Students.Promotions.ajax')

@endsection
