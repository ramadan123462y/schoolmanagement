@extends('layouts.master')
@section('css')
<x-css-toast></x-css-toast>
@section('title')
{{ trans('dashboardes/teacher.Report') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
{{ trans('dashboardes/teacher.Report') }}
@stop
<!-- breadcrumb -->

@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

             <x-error-validation></x-error-validation>
             <x-message-toaster></x-message-toaster>

                <form method="post"  action="{{ url('teacher/report') }}" autocomplete="off">
                    @csrf
                    <h6 style="font-family: 'Cairo', sans-serif;color: blue"> {{ trans('dashboardes/teacher.Information Searche') }}</h6><br>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="student">{{ trans('dashboardes/teacher.Students') }}</label>
                                <select class="custom-select mr-sm-2" name="student_id">
                                    <option value="0">{{ trans('dashboardes/teacher.All') }}</option>
                                    @foreach($students as $student)
                                        <option value="{{ $student->id }}">{{ $student->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="card-body datepicker-form">
                            <div class="input-group" data-date-format="yyyy-mm-dd">
                                <input type="text"  class="form-control range-from date-picker-default" placeholder="تاريخ البداية"  name="from">
                                <span class="input-group-addon"> </span>
                                <input class="form-control range-to date-picker-default" placeholder="تاريخ النهاية" type="text"  name="to">
                            </div>
                        </div>

                    </div>
                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{ trans('dashboardes/teacher.submit') }}</button>
                </form>

                @if(session('Students') )
                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                           style="text-align: center">
                        <thead>
                        <tr>
                            <th class="alert-success">#</th>
                            <th class="alert-success">{{ trans('dashboardes/teacher.name') }}</th>
                            <th class="alert-success">{{ trans('dashboardes/teacher.Grade') }}</th>
                            <th class="alert-success">{{ trans('dashboardes/teacher.section') }}</th>
                            <th class="alert-success">{{ trans('dashboardes/teacher.Date') }}</th>
                            <th class="alert-warning">{{ trans('dashboardes/teacher.Status') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(session('Students') as $studentd)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{$studentd->name}}</td>
                                <td>{{$studentd->grade->Name}}</td>
                                <td>{{$studentd->section->Name_Section}}</td>
                                <td>{{$studentd->attendence_date}}</td>
                                <td>

                                    @if($studentd->attendence_status == 0)
                                        <span class="btn-danger">{{ trans('dashboardes/teacher.Attendance') }}</span>
                                    @else
                                        <span class="btn-success">{{ trans('dashboardes/teacher.Absence') }}</span>
                                    @endif
                                </td>
                            </tr>

                        @endforeach
                    </table>
                </div>
                @endif


            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
