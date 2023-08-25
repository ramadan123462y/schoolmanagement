@extends('layouts.master')
@section('css')
    <x-css-toast></x-css-toast>
@section('title')
    {{ trans('pages/sections.Sections') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('pages/sections.Sections') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <a class="button x-small" href="#" data-toggle="modal" data-target="#Add">
                    {{ trans('pages/sections.add_section') }}</a>
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


                                                                            <button class="btn btn-outline-info btn-sm"
                                                                                data-toggle="modal"
                                                                                data-namear="{{ $section->getTranslation('Name_Section', 'ar') }}"
                                                                                data-nameen="{{ $section->getTranslation('Name_Section', 'en') }}"
                                                                                data-gradeid="{{ $section->grade_id }}"
                                                                                data-classid="{{ $section->classroom_id }}"
                                                                                data-id="{{ $section->id }}"
                                                                                data-satus="{{ $section->Status }}"
                                                                                data-target="#edit{{ $section->id }}">
                                                                                {{ trans('pages/sections.Edit') }}

                                                                            </button>
                                                                            <button
                                                                                class="btn btn-outline-danger btn-sm"
                                                                                data-toggle="modal"
                                                                                data-deleteid="{{ $section->id }}"
                                                                                data-target="#delete">{{ trans('pages/sections.Delete') }}
                                                                            </button>
                                                                        </td>
                                                                    </tr>
                                                                    <!--تعديل قسم جديد -->
                                                                    <!--تعديل قسم جديد -->
                                                                    @include('pages.Sections.Models.edit')


                                                                    {{-- ------------- --}}
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






@include('pages.Sections.Models.add')




@include('pages.Sections.Models.delete')

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
<script>
    $(document).ready(function() {
        $('#edit').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var namear = button.data('namear')
            var nameen = button.data('nameen')
            var gradeid = button.data('gradeid')
            var classid = button.data('classid')
            var satus = button.data('satus')
            var id = button.data('id')

            var modal = $(this);
            modal.find('#id').val(id);
            modal.find('#m_e-Name_Section_Ar').val(namear);
            modal.find('#m_e-Name_Section_En').val(nameen);
            modal.find('#grade-select').val(gradeid);
            modal.find('#class-select').val(classid);
            modal.find('#m_e-Status').prop('checked', satus);

        });


    });
</script>
<script>
    $(document).ready(function() {
        $('#delete').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);

            var deleteid = button.data('deleteid')

            var modal = $(this);
            modal.find('#id').val(deleteid);


        });


    });
</script>






@endsection
