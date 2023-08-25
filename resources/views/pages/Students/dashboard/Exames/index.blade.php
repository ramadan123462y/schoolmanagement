@extends('layouts.master')
@section('css')
    <x-css-toast></x-css-toast>
@section('title')
   {{ trans('dashboardes/studentDashboard.List Exercise') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
   {{ trans('dashboardes/studentDashboard.List Exercise') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="col-xl-12 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <x-message-toaster></x-message-toaster>
                            <x-error-validation></x-error-validation>
                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                    data-page-length="50" style="text-align: center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ trans('dashboardes/studentDashboard.Subject') }} </th>
                                            <th>{{ trans('dashboardes/studentDashboard.Name Exercise ') }}</th>
                                            <th>{{ trans('dashboardes/studentDashboard.Go / Degree') }} </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($quizzes as $quizze)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $quizze->subject->name }}</td>
                                                <td>{{ $quizze->name }}</td>
                                                <td>
                                                    @if ($degree = \App\Models\Degree::where('student_id', Auth::guard('student')->user()->id)->where('quize_id', $quizze->id)->first())
                                                        {{ $degree->score }}
                                                    @else
                                                        <a href="{{ url('student/question', $quizze->id) }}"
                                                            class="btn btn-outline-success btn-sm" role="button"
                                                            aria-pressed="true">
                                                            <i class="fas fa-person-booth"></i></a>
                                                    @endif


                                                </td>
                                            </tr>
                                        @endforeach
                                </table>
                            </div>
                        </div>
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
