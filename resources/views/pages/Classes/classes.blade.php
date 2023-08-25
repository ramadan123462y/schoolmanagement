@extends('layouts.master')
@section('css')

    <x-css-toast></x-css-toast>

@section('title')
    {{ trans('pages/classes.ClassRomes') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('pages/classes.ClassRomes') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">

    <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                <x-error-validation></x-error-validation>
                <x-message-toaster type="success"></x-message-toaster>


                <button type="button" class="button x-small" data-toggle="modal" data-target="#add_classes">
                    {{ trans('pages/classes.add_class') }}
                </button>

                <button type="button" class="button x-small" data-toggle="modal" data-target="#delete_all"
                    id="btn_delete_all">
                    {{ trans('pages/classes.delete_checkbox') }}
                </button>


                <br><br>


                <form action="{{ url('classroom/filter_with_Grade_id') }}" method="POST">
                    @csrf
                    <select class="selectpicker" data-style="btn-info" name="Grade_id" required
                        onchange="this.form.submit()">
                        <option value="" selected disabled>{{ trans('pages/classes.Search_By_Grade') }}
                        </option>
                        @foreach ($Grades as $Grade)
                            <option value="{{ $Grade->id }}">{{ $Grade->Name }}</option>
                        @endforeach
                    </select>
                </form>




                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                        style="text-align: center">
                        <thead>
                            <tr>

                                <th><input type="checkbox" id="target-checkbox"></th>
                                <th>#</th>
                                <th>{{ trans('pages/classes.Name_class') }}</th>
                                <th>{{ trans('pages/classes.Name_Grade') }}</th>
                                <th>{{ trans('pages/classes.Processes') }}</th>
                            </tr>
                        </thead>
                        <tbody>

                            @if (session('Classesrooms'))
                                @php

                                    $Classesrooms = session('Classesrooms');

                                @endphp
                            @endif



                            @foreach ($Classesrooms as $Classesroom)
                                <tr>
                                    <td><input type="checkbox" class="check_table" value="{{ $Classesroom->id }}">
                                    </td>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $Classesroom->Name_Class }}</td>
                                    <td>{{ $Classesroom->grade->Name }}</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#edit" data-edit_id="{{ $Classesroom->id }}"
                                            data-edit_name_en="{{ $Classesroom->getTranslation('Name_Class', 'en') }}"
                                            data-edit_name_ar="{{ $Classesroom->getTranslation('Name_Class', 'ar') }}"
                                            data-edit_grade_id="{{ $Classesroom->grade->id }}"
                                            data-edit_grade_name="{{ $Classesroom->grade->Name }}" title="Edit"><i
                                                class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#delete" data-delete_id="{{ $Classesroom->id }}"
                                            title="Delete"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                            @endforeach


                    </table>
                </div>
            </div>
        </div>
    </div>


    @include('pages.Classes.Models.add')
    @include('pages.Classes.Models.delete')
    @include('pages.Classes.Models.edit')
</div>
@include('pages.Classes.Models.delete_all')



</div>

</div>

<!-- row closed -->
@endsection
@section('js')
{{-- jquery edit ---------------------- --}}

<script>
    $(document).ready(function() {
        $('#edit').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); //

            var edit_id = button.data('edit_id');
            var edit_name_en = button.data('edit_name_en');
            var edit_name_ar = button.data('edit_name_ar');
            var edit_grade_id = button.data('edit_grade_id');
            var edit_grade_name = button.data('edit_grade_name');
            var modal = $(this);
            console.log(edit_id);
            modal.find('#id').val(edit_id);
            modal.find('#m_e_Name_en').val(edit_name_en);
            modal.find('#m_e_Name').val(edit_name_ar);
            modal.find('#exampleFormControlSelect1').val(edit_grade_id);


        });
    });
</script>
{{-- jquery deelete ---------------------- --}}
<script>
    $(document).ready(function() {
        $('#delete').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); //

            var id = button.data('delete_id');
            var modal = $(this);
            console.log(id);
            modal.find('#m_d_id').val(id);

        });
    });
</script>
{{-- checked some checbox  to delete--}}
<script>
    $(document).ready(function() {
        $("#target-checkbox").click(function() {
            $("input[type='checkbox']").prop('checked', $(this).prop('checked'));
        });
    });
</script>
{{-- checked all  to delete--}}
<script>
    $(document).ready(function() {
        $("#btn_delete_all").hide();
        $("input[type='checkbox']").click(function() {
            if ($("input[type='checkbox']:checked").length > 0) {
                $("#btn_delete_all").show();
            } else {
                $("#btn_delete_all").hide();
            }
        });
    });
</script>
{{-- move value from checkboxes to button --}}
<script>
    $(document).ready(function() {
        $("#btn_delete_all").click(function() {
            var checkedValues = $("input[class='check_table']:checked").map(function() {
                return $(this).val();
            }).get();
            console.log(checkedValues);
            $('#delete_all_id').val(checkedValues);

        });
    });
</script>
@endsection
