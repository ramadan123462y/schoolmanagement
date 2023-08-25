@extends('layouts.master')
@section('css')
    <x-css-toast></x-css-toast>
@section('title')
    {{ trans('pages/question.Add New Question') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('pages/question.Add New Question') }}
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
                <div class="col-xs-12">
                    <div class="col-md-12">
                        <br>
                        <form action="{{ route('Question.store') }}" method="post" autocomplete="on">
                            @csrf
                            <div class="form-row">

                                <div class="col">
                                    <label for="title">{{ trans('pages/question.Question Name') }}</label>
                                    <input type="text" name="title" id="input-name"
                                        class="form-control form-control-alternative" autofocus>
                                </div>
                            </div>
                            <br>

                            <div class="form-row">
                                <div class="col">
                                    <label for="title">{{ trans('pages/question.Answers') }} <span style="color:red" >{{ trans('dashboardes/teacher.Please - between question') }} </span> </label>
                                    <textarea name="answers" class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
                                </div>
                            </div>
                            <br>

                            <div class="form-row">
                                <div class="col">
                                    <label for="title">{{ trans('pages/question.Correct Answer') }}</label>
                                    <input type="text" name="right_answer" id="input-name"
                                        class="form-control form-control-alternative" autofocus>
                                </div>
                            </div>
                            <br>

                            <div class="form-row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="Grade_id">{{ trans('pages/question.Test Name') }}: <span class="text-danger">*</span></label>
                                        <input type="text" name="quizze_name" readonly id="input-name"
                                            value="{{ $quize->name }}" class="form-control form-control-alternative"
                                            autofocus>
                                        <input type="hidden" name="quizze_id" value="{{ $quize->id }}">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <option disabled>{{ trans('pages/question.Select Test Name.') }}..</option>
                                        <select class="custom-select mr-sm-2" name="score">
                                            <option selected disabled>{{ trans('pages/question.Select Grade') }}...</option>
                                            <option value="5">5</option>
                                            <option value="10">10</option>
                                            <option value="15">15</option>
                                            <option value="20">20</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{ trans('pages/question.Save Data') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
