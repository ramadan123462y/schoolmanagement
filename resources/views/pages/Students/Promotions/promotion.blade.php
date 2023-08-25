@extends('layouts.master')
@section('css')
    <x-css-toast></x-css-toast>
@section('title')
    {{ trans('pages/promotion.list_students') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('pages/promotion.list_students') }}
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
                <div class="col-xl-12 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">

                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Delete_all">
                                {{ trans('pages/promotion.Undo All') }}
                            </button>
                            <br><br>


                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                    data-page-length="50" style="text-align: center">
                                    <thead>
                                        <tr>
                                            <th class="alert-info">#</th>
                                            <th class="alert-info">{{ trans('pages/promotion.Name') }}</th>
                                            <th class="alert-danger">{{ trans('pages/promotion.Previous Educational Stage') }}</th>
                                            <th class="alert-danger">{{ trans('pages/promotion.Academic Year') }}</th>
                                            <th class="alert-danger">{{ trans('pages/promotion.Previous Grade') }}</th>
                                            <th class="alert-danger">{{ trans('pages/promotion.Previous Section') }}</th>
                                            <th class="alert-success">{{ trans('pages/promotion.Current Educational Stage') }}</th>
                                            <th class="alert-success">{{ trans('pages/promotion.Current Academic Year') }}</th>
                                            <th class="alert-success">{{ trans('pages/promotion.Current Grade') }}</th>
                                            <th class="alert-success">{{ trans('pages/promotion.Current Section') }}</th>
                                            <th>{{ trans('pages/promotion.Processes') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($promotions as $promotion)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $promotion->student->name }}</td>
                                                <td>{{ $promotion->f_grade->Name }}</td>
                                                <td>{{ $promotion->academic_year }}</td>
                                                <td>{{ $promotion->f_classroom->Name_Class }}</td>
                                                <td>{{ $promotion->f_section->Name_Section }}</td>
                                                <td>{{ $promotion->t_grade->Name }}</td>
                                                <td>{{ $promotion->academic_year_new }}</td>
                                                <td>{{ $promotion->t_classroom->Name_Class }}</td>
                                                <td>{{ $promotion->t_section->Name_Section }}</td>
                                                <td>

                                                    <button type="button" class="btn btn-outline-danger"
                                                        data-toggle="modal"
                                                        data-id="{{ $promotion->id }}"
                                                        data-studentname="{{ $promotion->student->name }}"


                                                        data-target="#Delete_one">
                                                       {{ trans('pages/promotion.Retrieve Student') }}</button>
                                                    <button type="button" class="btn btn-outline-success"
                                                        data-toggle="modal" data-target="#">{{ trans('pages/promotion.Graduate Student') }} </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                </table>
                            </div>
                        </div>
                        <!-- Deleted inFormation Student -->
                        @include('pages.Students.Promotions.Delete_all')
                        <!-- Deleted inFormation Student -->
                      @include('pages.Students.Promotions.Delete_one')

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
        $('#Delete_one').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); //
            var id = button.data('id');
            var namestudent = button.data('studentname');
            var modal = $(this);
            $('#id_model').val(id);
            $('#namestudent_model').text(namestudent);
        });
    });
</script>
@endsection
