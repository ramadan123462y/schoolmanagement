@extends('layouts.master')
@section('css')
    <x-css-toast></x-css-toast>
@section('title')
    {{ trans('pages/students.list_students') }}
@stop
@endsection
@section('page-header')

@section('PageTitle')
    {{ trans('pages/students.list_students') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <x-message-toaster></x-message-toaster>
        <x-error-validation></x-error-validation>
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="col-xl-12 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <a href="{{ url('student/add_student') }}" class="btn btn-success btn-sm" role="button"
                                aria-pressed="true">{{ trans('pages/students.add_student') }}</a><br><br>
                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                    data-page-length="50" style="text-align: center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ trans('pages/students.name') }}</th>
                                            <th>{{ trans('pages/students.email') }}</th>
                                            <th>{{ trans('pages/students.gender') }}</th>
                                            <th>{{ trans('pages/students.Grade') }}</th>
                                            <th>{{ trans('pages/students.classrooms') }}</th>
                                            <th>{{ trans('pages/students.section') }}</th>
                                            <th>{{ trans('pages/students.Processes') }}</th>
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
                                                    <div class="dropdown show">
                                                        <a class="btn btn-success btn-sm dropdown-toggle" href="#"
                                                            role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false">
                                                            العمليات
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                            <a class="dropdown-item"
                                                                href="{{ url('student/show_student', $student->id) }}"><i
                                                                    style="color: #ffc107"
                                                                    class="far fa-eye "></i>&nbsp; عرض بيانات الطالب</a>

                                                            <a class="dropdown-item"
                                                                href="{{ url('student/edit', $student->id) }}"><i
                                                                    style="color:green" class="fa fa-edit"></i>&nbsp;
                                                                تعديل بيانات الطالب</a>

                                                            <a class="dropdown-item"
                                                                href="{{ route('invoice.show', $student->id) }}"><i
                                                                    style="color: #0000cc"
                                                                    class="fa fa-edit"></i>&nbsp;اضافة فاتورة
                                                                رسوم&nbsp;</a>
                                                            <a class="dropdown-item"
                                                                href="{{ route('recipt.show', $student->id) }}"><i
                                                                    style="color: #9dc8e2"
                                                                    class="fas fa-money-bill-alt"></i>&nbsp; &nbsp;سند
                                                                قبض</a>
                                                            <a class="dropdown-item"
                                                                href="{{ route('process_fee.show',$student->id) }}"><i
                                                                    style="color: #9dc8e2"
                                                                    class="fas fa-money-bill-alt"></i>&nbsp; &nbsp;
                                                                استبعاد رسوم</a>
                                                            <a class="dropdown-item"
                                                                href="{{ route('payment.show',$student->id) }}"><i
                                                                    style="color: #9dc8e2"
                                                                    class="fas fa-money-bill-alt"></i>&nbsp; &nbsp;
                                                                  سند صرف</a>

                                                            <button class="dropdown-item" data-toggle="modal"
                                                                data-id="{{ $student->id }}"
                                                                data-target="#Delete_Student">

                                                                <i style="color: red" class="fa fa-trash"></i>&nbsp;
                                                                حذف بيانات الطالب
                                                            </button>

                                                        </div>
                                                    </div>
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
        @include('pages.Students.Delete')
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
{{-- move id from button to model delete --}}
<script>
    $(document).ready(function() {
        $('#Delete_Student').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); //
            var id = button.data('id');
            var modal = $(this);
            console.log(id);
            modal.find('#id_model').val(id);
        });
    });
</script>
@endsection
