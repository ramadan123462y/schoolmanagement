@extends('layouts.master')
@section('css')
    <x-css-toast></x-css-toast>
@section('title')
   {{ trans('pages/attendance.Attendance and Absence List for Students.') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
   {{ trans('pages/attendance.Attendance and Absence List for Students.') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->

<x-error-validation></x-error-validation>
<x-message-toaster></x-message-toaster>



<h5 style="font-family: 'Cairo', sans-serif;color: red"> {{ trans('pages/attendance.Current Date') }}  : {{ date('Y-m-d') }}</h5>
<form method="post" action="{{ route('attendance.store') }}">

    @csrf
    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
        style="text-align: center">
        <thead>
            <tr>
                <th class="alert-success">#</th>
                <th class="alert-success">{{ trans('pages/attendance.name') }}</th>
                <th class="alert-success">{{ trans('pages/attendance.email') }}</th>
                <th class="alert-success">{{ trans('pages/attendance.gender') }}</th>
                <th class="alert-success">{{ trans('pages/attendance.Grade') }}</th>
                <th class="alert-success">{{ trans('pages/attendance.classrooms') }}</th>
                <th class="alert-success">{{ trans('pages/attendance.section') }}</th>
                <th class="alert-success">{{ trans('pages/attendance.Processes') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->gender->Name }}</td>
                    <td>{{ $student->grade->Name }}</td>
                    <td>{{ $student->classroom->Name_Class }}</td>
                    <td>{{ $student->section->Name_Section }}</td>
                    <td>

                        @if (isset($student->attendances()->where('attendence_date', date('Y-m-d'))->first()->id))
                            <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                <input name="attendences[{{ $student->id }}]" disabled
                                    {{ $student->attendances()->where('attendence_date', date('Y-m-d'))->first()->attendence_status == 1? 'checked': '' }}
                                    class="leading-tight" type="radio" value="1">
                                <span class="text-success">{{ trans('pages/attendance.Attendance') }}</span>
                            </label>
                            <label class="ml-4 block text-gray-500 font-semibold">
                                <input name="attendences[{{ $student->id }}]" disabled
                                    {{ $student->attendances()->where('attendence_date', date('Y-m-d'))->first()->attendence_status == 0? 'checked': '' }}
                                    class="leading-tight" type="radio" value="0">
                                <span class="text-danger">{{ trans('pages/attendance.Absence') }}</span>
                            </label>

                            @else
                            <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                <input name="attendences[{{ $student->id }}]"

                                    class="leading-tight" type="radio" value="1">
                                <span class="text-success">{{ trans('pages/attendance.Attendance') }}.</span>
                            </label>
                            <label class="ml-4 block text-gray-500 font-semibold">
                                <input name="attendences[{{ $student->id }}]"

                                    class="leading-tight" type="radio" value="0">
                                <span class="text-danger">{{ trans('pages/attendance.Absence') }}..</span>
                            </label>

                        @endif
                        <input type="hidden" name="grade_id" value="{{ $student->grade_id }}">
                        <input type="hidden" name="classroom_id" value="{{ $student->classroom_id }}">
                        <input type="hidden" name="section_id" value="{{ $student->section_id }}">

                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
    <P>
        <button class="btn btn-success" type="submit">{{ trans('pages/attendance.submit') }}</button>
    </P>
</form><br>
<!-- row closed -->
@endsection
@section('js')

@endsection
