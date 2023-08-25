@extends('layouts.master')
@section('css')
    <x-css-toast></x-css-toast>
@section('title')
   {{ trans('pages/attendance.Attendance and Absence.') }}:

@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
  {{ trans('pages/attendance.Attendance and Absence.') }}:

@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

            </div>

            <x-error-validation></x-error-validation>

            <x-message-toaster type="success"></x-message-toaster>
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="accordion gray plus-icon round">


                        <div class="acd-group">


                            {{-- --???---------- --}}
                            @foreach ($list_Grades as $grade)
                                <a href="#" class="acd-heading">{{ $grade->Name }}</a>
                                <div class="acd-des">

                                    <div class="row">
                                        <div class="col-xl-12 mb-30">
                                            <div class="card card-statistics h-100">
                                                <div class="card-body">
                                                    <div class="d-block d-md-flex justify-content-between">
                                                        <div class="d-block">
                                                        </div>
                                                    </div>
                                                    <div class="table-responsive mt-15">
                                                        <table class="table center-aligned-table mb-0">
                                                            <thead>
                                                                <tr class="text-dark">
                                                                    <th>#</th>
                                                                    <th> {{ trans('pages/sections.Name_Section') }}
                                                                    </th>
                                                                    <th>{{ trans('pages/sections.Name_Class') }}</th>
                                                                    <th>{{ trans('pages/sections.Status') }}</th>
                                                                    <th>{{ trans('pages/sections.Processes') }}</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($grade->sections as $section)
                                                                    <tr>
                                                                        <td>{{ $loop->iteration }}</td>
                                                                        <td>{{ $section->Name_Section }}</td>
                                                                        <td>{{ \App\Models\Classroom::find($section->classroom_id)->Name_Class }}
                                                                        </td>

                                                                        <td>
                                                                            @if ($section->Status == 1)
                                                                                <label
                                                                                    class="badge badge-success">{{ trans('pages/sections.Status_Section_AC') }}</label>
                                                                            @else
                                                                                <label
                                                                                    class="badge badge-danger">{{ trans('pages/sections.Status_Section_No') }}</label>
                                                                            @endif





                                                                        </td>
                                                                        <td>


                                                                            <a href="{{ route('attendance.show', $section->id) }}"
                                                                                class="btn btn-warning btn-sm"
                                                                                role="button" aria-pressed="true">{{ trans('pages/attendance.Student List') }}
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
                            @endforeach
                            {{-- ---??---------- --}}

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
<script>
    $(document).ready(function() {

        $('select[name="Grade_id"]').change(function() {
            var grade_id = $(this).val();
            if (grade_id) {
                $.ajax({
                    url: '/section/getClasses/' + grade_id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('select[name="Class_id"]').empty();

                        $.each(data, function(key, value) {
                            $('select[name="Class_id"]').append('<option value="' +
                                key +
                                '">' + value + '</option>');
                        });
                    }
                });
            } else {
                // Clear Class select box if no Grade is selected
                $('select[name="Class_id"]').empty();
            }
        });
    });
</script>


@endsection
