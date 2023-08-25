@extends('layouts.master')
@section('css')
    <x-css-toast></x-css-toast>

@section('title')
    {{ trans('pages/question.Edit Question') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('pages/question.Edit Question') }} :<span class="text-danger">{{ $question->title }}</span>
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
                        <form action="{{ route('question.update', 'question') }}" method="post" autocomplete="off">
                            @method('PUT')
                            @csrf
                            <div class="form-row">

                                <div class="col">
                                    <label for="title">{{ trans('pages/question.Question Name') }}</label>
                                    <input type="text" name="title" id="input-name"
                                        class="form-control form-control-alternative" value="{{ $question->title }}">
                                    <input type="hidden" name="id" value="{{ $question->id }}">
                                </div>
                            </div>
                            <br>

                            <div class="form-row">
                                <div class="col">
                                    <label for="title">{{ trans('pages/question.Answers') }}</label>
                                    <textarea name="answers" class="form-control" id="exampleFormControlTextarea1" rows="4">{{ $question->answers }}</textarea>
                                </div>
                            </div>
                            <br>

                            <div class="form-row">
                                <div class="col">
                                    <label for="title">{{ trans('pages/question.Correct Answer') }}</label>

                                    <input type="text" name="right_answer" id="input-name"
                                        class="form-control form-control-alternative"
                                        value="{{ $question->right_answer }}">
                                </div>
                            </div>
                            <br>

                            <div class="form-row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="Grade_id">{{ trans('pages/question.Test Name') }}: <span class="text-danger">*</span></label>

                                        <select class="custom-select mr-sm-2" name="quizze_id">
                                            <option disabled>{{ trans('pages/question.Select Test Name') }}...</option>
                                            @foreach ($quizzes as $quizze)
                                                <option value="{{ $quizze->id }}"
                                                    {{ $quizze->id == $question->quizze_id ? 'selected' : '' }}>
                                                    {{ $quizze->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <option disabled>{{ trans('pages/question.Select Test Name.') }}..</option>
                                        <select class="custom-select mr-sm-2" name="score">
                                            <option selected disabled>{{ trans('pages/question.Select Grade') }}...</option>
                                            <option value="5" {{ $question->score == 5 ? 'selected' : '' }}>5
                                            </option>
                                            <option value="10" {{ $question->score == 10 ? 'selected' : '' }}>10
                                            </option>
                                            <option value="15" {{ $question->score == 15 ? 'selected' : '' }}>15
                                            </option>
                                            <option value="20" {{ $question->score == 20 ? 'selected' : '' }}>20
                                            </option>
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
