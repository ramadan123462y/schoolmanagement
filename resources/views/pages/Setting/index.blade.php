@extends('layouts.master')
@section('css')
    <x-css-toast></x-css-toast>
@section('title')
    {{ trans('pages/setting.Settings') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('pages/setting.Settings') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                <x-message-toaster type="success"></x-message-toaster>
                <form enctype="multipart/form-data" method="post" action="{{ url('setting/update') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 border-right-2 border-right-blue-400">
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label font-weight-semibold">{{ trans('pages/setting.School Name') }}<span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input type="hidden" value="{{ $setting->id }}" name="id">
                                    <input name="school_name" value="{{ $setting->school_name }}" required
                                        type="text" class="form-control" placeholder="Name of School">
                                        <x-inline-validation  name="school_name" ></x-inline-validation>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="current_session"
                                    class="col-lg-2 col-form-label font-weight-semibold">{{ trans('pages/setting.Current Year') }}<span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <select data-placeholder="Choose..." required name="current_session"
                                        id="current_session" class="select-search form-control">
                                        <option value=""></option>
                                        @for ($y = date('Y', strtotime('- 3 years')); $y <= date('Y', strtotime('+ 1 years')); $y++)
                                            <option
                                                {{ $setting->current_session == ($y -= 1) . '-' . ($y += 1) ? 'selected' : '' }}>
                                                {{ ($y -= 1) . '-' . ($y += 1) }}</option>
                                        @endfor
                                    </select>
                                    <x-inline-validation  name="current_session" ></x-inline-validation>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label font-weight-semibold">{{ trans('pages/setting.School Abbreviation') }}</label>
                                <div class="col-lg-9">
                                    <input name="school_title" value="{{ $setting->school_title }}" type="text"
                                        class="form-control" placeholder="School Acronym">
                                        <x-inline-validation  name="school_title" ></x-inline-validation>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label font-weight-semibold">{{ trans('pages/setting.Phone Number') }}</label>
                                <div class="col-lg-9">
                                    <input name="phone" value="{{ $setting->phone }}" type="text"
                                        class="form-control" placeholder="Phone">
                                        <x-inline-validation  name="phone" ></x-inline-validation>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label font-weight-semibold">{{ trans('pages/setting.Email Address') }}</label>
                                <div class="col-lg-9">
                                    <input name="school_email" value="{{ $setting->school_email }}" type="email"
                                        class="form-control" placeholder="School Email">
                                        <x-inline-validation  name="school_email" ></x-inline-validation>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label font-weight-semibold">{{ trans('pages/setting.School Address') }}<span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input required name="address" value="{{ $setting->address }}" type="text"
                                        class="form-control" placeholder="School Address">
                                        <x-inline-validation  name="address" ></x-inline-validation>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label font-weight-semibold">{{ trans('pages/setting.End of First Term') }}</label>
                                <div class="col-lg-9">
                                    <input name="end_first_term" value="{{ $setting->end_first_term }}" type="text"
                                        class="form-control date-pick" placeholder="Date Term Ends">
                                        <x-inline-validation  name="end_first_term" ></x-inline-validation>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label font-weight-semibold">{{ trans('pages/setting.End of Second Term') }}</label>
                                <div class="col-lg-9">
                                    <input name="end_second_term" value="{{ $setting->end_second_term }}"
                                        type="text" class="form-control date-pick" placeholder="Date Term Ends">
                                        <x-inline-validation  name="end_second_term" ></x-inline-validation>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label font-weight-semibold">{{ trans('pages/setting.School Logo') }}</label>
                                <div class="col-lg-9">
                                    <div class="mb-3">
                                        <img style="width: 100px" height="100px"
                                            src="{{ URL::asset('Logo/' . $setting->logo) }}" alt="">
                                    </div>
                                    <input type="hidden" name="old_file" value="{{ $setting->logo }}">
                                    <input name="New_file" accept="image/*" type="file" class="file-input"
                                        data-show-caption="false" data-show-upload="false" data-fouc>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{ trans('pages/setting.submit') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
