@extends('layouts.master')
@section('css')
    <x-css-toast></x-css-toast>
@section('title')
    {{trans('pages/students.Student_details')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{trans('pages/students.Student_details')}}
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
                <div class="card-body">
                    <div class="tab nav-border">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active show" id="home-02-tab" data-toggle="tab" href="#home-02"
                                    role="tab" aria-controls="home-02" aria-selected="true">{{trans('pages/students.Student_details')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-02-tab" data-toggle="tab" href="#profile-02"
                                    role="tab" aria-controls="profile-02" aria-selected="false">{{trans('pages/students.Attachments')}}</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="home-02" role="tabpanel"
                                aria-labelledby="home-02-tab">
                                <table class="table table-striped table-hover" style="text-align:center">
                                    <tbody>
                                        <tr>
                                            <th scope="row">{{trans('pages/students.name')}}</th>
                                            <td>{{ $Student->name }}</td>
                                            <th scope="row">{{trans('pages/students.email')}}</th>
                                            <td>{{ $Student->email }}</td>
                                            <th scope="row">{{trans('pages/students.gender')}}</th>
                                            <td>{{ $Student->gender->Name }}</td>
                                            <th scope="row">{{trans('pages/students.Nationality')}}</th>
                                            <td>{{ $Student->nationalitie->Name }}</td>
                                        </tr>

                                        <tr>
                                            <th scope="row">{{trans('pages/students.Grade')}}</th>
                                            <td>{{ $Student->grade->Name }}</td>
                                            <th scope="row">{{trans('pages/students.classrooms')}}</th>
                                            <td>{{ $Student->classroom->Name_Class }}</td>
                                            <th scope="row">{{trans('pages/students.section')}}</th>
                                            <td>{{ $Student->section->Name_Section }}</td>
                                            <th scope="row">{{trans('pages/students.Date_of_Birth')}}</th>
                                            <td>{{ $Student->Date_Birth }}</td>
                                        </tr>

                                        <tr>
                                            <th scope="row">{{trans('pages/students.parent')}}</th>
                                            <td>{{ $Student->parent->Name_Father }}</td>
                                            <th scope="row">{{trans('pages/students.academic_year')}}</th>
                                            <td>{{ $Student->academic_year }}</td>
                                            <th scope="row"></th>
                                            <td></td>
                                            <th scope="row"></th>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="tab-pane fade" id="profile-02" role="tabpanel" aria-labelledby="profile-02-tab">
                                <div class="card card-statistics">
                                    <div class="card-body">
                                        <form method="post" action="{{ url('student/uploade_new_image') }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="academic_year">{{trans('pages/students.Attachments')}}
                                                        : <span class="text-danger">*</span></label>
                                                    <input type="file" accept="image/*" name="images[]" multiple
                                                        required>
                                                    <input type="hidden" name="student_name"
                                                        value="{{ $Student->name }}">
                                                    <input type="hidden" name="student_id"
                                                        value="{{ $Student->id }}">
                                                </div>
                                            </div>
                                            <br><br>
                                            <button type="submit" class="button button-border x-small">
                                                {{trans('pages/students.submit')}}
                                            </button>
                                        </form>
                                    </div>
                                    <br>
                                    <table class="table center-aligned-table mb-0 table table-hover"
                                        style="text-align:center">
                                        <thead>
                                            <tr class="table-secondary">
                                                <th scope="col">#</th>
                                                <th scope="col">{{trans('pages/students.filename')}}</th>
                                                <th scope="col">{{trans('pages/students.created_at')}}</th>
                                                <th scope="col">{{trans('pages/students.Processes')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($Student->images as $image)
                                                <tr style='text-align:center;vertical-align:middle'>
                                                    <td>{{ $loop->iteration }}</td>

                                                    <td>{{ $image->filename }}</td>
                                                    <td>{{ $image->created_at }}</td>

                                                    <td colspan="2">
                                                        <a class="btn btn-outline-info btn-sm"
                                                            href="{{ url('student/Download_image/' . $Student->id . '/' . $image->filename) }}"
                                                            role="button"><i class="fas fa-download"></i>&nbsp;
                                                            {{trans('pages/students.Download')}}</a>

                                                        <a type="button"
                                                            href="{{ url('student/delete_image/' . $image->id . '/' . $Student->id . '/' . $image->filename) }}"
                                                            class="btn btn-outline-danger btn-sm" title="Delete">{{trans('pages/students.delete')}}
                                                        </a>

                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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
