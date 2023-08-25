@extends('layouts.master')
@section('css')
    <x-css-toast></x-css-toast>
@section('title')
    {{ trans('pages/students.Edit Student') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('pages/students.Edit Student') }}
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

                <form method="post" action="{{ url('student/update_student') }}" autocomplete="on">
                    @csrf
                    <h6 style="font-family: 'Cairo', sans-serif;color: blue">
                        {{ trans('pages/students.personal_information') }}</h6><br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ trans('pages/students.Name') }}(ar) : <span class="text-danger">*</span></label>
                                <input type="hidden" value="{{ $student->id }}" name="id" >
                                <input type="text" value="{{ $student->getTranslation('name', 'ar') }}" name="name_ar" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ trans('pages/students.Name') }}(en) : <span class="text-danger">*</span></label>
                                <input class="form-control" value="{{ $student->getTranslation('name', 'en') }}" name="name_en" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ trans('pages/students.email') }}: </label>
                                <input type="email" value="{{ $student->email }}" name="email" class="form-control">
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ trans('pages/students.password') }}:</label>
                                <input type="password" value="{{ $student->password }}" name="password" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="gender">{{ trans('pages/students.Gender') }} : <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="gender_id">
                                    <option selected value="{{ $student->gender_id }}">{{ $student->gender->Name }}</option>
                                    <option  disabled>{{ trans('pages/students.Choose') }}...</option>
                                    @foreach ($Genders as $Gender)
                                        <option value="{{ $Gender->id }}">{{ $Gender->Name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="nal_id">{{ trans('pages/students.Nationality') }} : <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="nationalitie_id">
                                    <option selected value="{{ $student->nationalitie_id }}">{{ $student->nationalitie->Name }}</option>
                                    <option  disabled>{{ trans('pages/students.Choose') }}...</option>
                                    @foreach ($nationals as $nal)
                                        <option value="{{ $nal->id }}">{{ $nal->Name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="bg_id">{{ trans('pages/students.blood_type') }}: </label>
                                <select class="custom-select mr-sm-2" name="blood_id">
                                    <option selected value="{{ $student->blood->id }}">{{ $student->blood->Name }}</option>
                                    <option  disabled>{{ trans('pages/students.Choose') }}...</option>
                                    @foreach ($bloods as $bg)
                                        <option value="{{ $bg->id }}">{{ $bg->Name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>{{ trans('pages/students.Date_of_Birth') }} :</label>
                                <input class="form-control" type="text" id="datepicker-action" value="{{ $student->Date_Birth }}" name="Date_Birth"
                                    data-date-format="yyyy-mm-dd">
                            </div>
                        </div>

                    </div>

                    <h6 style="font-family: 'Cairo', sans-serif;color: blue">
                        {{ trans('pages/students.Student_information') }}</h6><br>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="Grade_id">{{ trans('pages/students.Grade') }} : <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="Grade_id">
                                    <option  disabled>{{ trans('pages/students.Choose') }}...</option>
                                    <option selected value="{{ $student->grade->id }}">{{ $student->grade->Name }}</option>
                                    @foreach ($grades as $c)
                                        <option value="{{ $c->id }}">{{ $c->Name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="Classroom_id">{{ trans('pages/students.classrooms') }}: <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="Classroom_id">
                                    <option selected value="{{ $student->classroom->id}}">{{ $student->classroom->Name_Class }}</option>

                                </select>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="section_id">{{ trans('pages/students.section') }} : </label>
                                <select class="custom-select mr-sm-2" name="section_id">
                                    <option selected value="{{ $student->section->id}}">{{ $student->section->Name_Section }}</option>

                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="parent_id">{{ trans('pages/students.parent') }} : <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="parent_id">
                                    <option selected value="{{ $student->parent->id}}">{{ $student->parent->Name_Father }}</option>

                                    <option  disabled>{{ trans('pages/students.Choose') }}...</option>
                                    @foreach ($parents as $parent)
                                        <option value="{{ $parent->id }}">{{ $parent->Name_Father }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="academic_year">{{ trans('pages/students.Academic_year') }} : <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="academic_year">
                                    <option selected value="{{ $student->academic_year}}">{{ $student->academic_year }}</option>

                                    <option  disabled>{{ trans('pages/students.Choose') }}...</option>
                                    @php
                                        $current_year = date('Y');
                                    @endphp
                                    @for ($year = $current_year; $year <= $current_year + 1; $year++)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div><br>
                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{ trans('pages/students.submit') }}</button>
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
