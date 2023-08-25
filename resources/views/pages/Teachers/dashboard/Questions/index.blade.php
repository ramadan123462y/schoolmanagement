@extends('layouts.master')
@section('css')
    <x-css-toast></x-css-toast>
@section('title')
    {{ trans('pages/question.Question List') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('pages/question.Question List') }}
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
                <div class="col-xl-12 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <a href="{{ route('Question.show',$quize->id) }}" class="btn btn-success btn-sm" role="button"
                                aria-pressed="true">{{ trans('pages/question.Add New Question') }}</a><br><br>
                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                    data-page-length="50" style="text-align: center">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">{{ trans('pages/question.Question') }}</th>
                                            <th scope="col">{{ trans('pages/question.Answers') }}</th>
                                            <th scope="col">{{ trans('pages/question.Correct Answer') }}</th>
                                            <th scope="col">{{ trans('pages/question.Grade') }}</th>
                                            <th scope="col">{{ trans('pages/question.Test Name') }}</th>
                                            <th scope="col">{{ trans('pages/question.Actions') }}</th>
                                        </tr>
                                    <tbody>
                                        @foreach ($questions as $question)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $question->title }}</td>
                                                <td>{{ $question->answers }}</td>
                                                <td>{{ $question->right_answer }}</td>
                                                <td>{{ $question->score }}</td>
                                                <td>{{ $question->quize->name }}</td>
                                                <td>
                                                    <a href="{{ route('Question.edit', $question->id) }}"


                                                        class="btn btn-info btn-sm" role="button"
                                                        aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        data-toggle="modal" data-target="#delete_exam"
                                                        data-idbutton="{{ $question->id }}" title="حذف"><i
                                                            class="fa fa-trash"></i></button>


                                                </td>
                                            </tr>
                                        @endforeach
                                </table>
                            </div>
                        </div>
                        @include('pages.Teachers.dashboard.Questions.destroy')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
<script>
    $(document).ready(function() {
        $('#delete_exam').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data('idbutton');
            var modal = $(this);
            console.log(id);
            modal.find('#idmodel').val(id);
        });
    });
</script>
@endsection
