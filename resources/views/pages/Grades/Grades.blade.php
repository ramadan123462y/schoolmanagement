@extends('layouts.master')
@section('css')
    <x-css-toast></x-css-toast>
@section('title')
  {{ trans('pages/grades.Grades') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('pages/grades.Grades') }} </h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color"> {{ trans('pages/grades.Home') }}</a></li>
                <li class="breadcrumb-item active"> {{ trans('pages/grades.Grades') }}</li>
            </ol>
        </div>
    </div>
</div>

<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<!-- main body -->
<div class="row">
    <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <x-message-toaster type="success"></x-message-toaster>
                <x-error-validation></x-error-validation>
                {{-- button   ---- --}}
                <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                     {{ trans('pages/grades.add_Grade') }}
                </button>
                <br><br>
                {{--  end  button   ---- --}}
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th> {{ trans('pages/grades.Stage name') }}</th>
                                <th> {{ trans('pages/grades.notes') }}</th>
                                <th> {{ trans('pages/grades.processes') }}</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($grades as $grade)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $grade->Name }}</td>
                                    <td>{{ $grade->Notes }}</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#edit_grade" data-edit_id="{{ $grade->id }}"
                                            data-edit_name_en="{{ $grade->getTranslation('Name', 'en') }}"
                                            data-edit_name_ar="{{ $grade->getTranslation('Name', 'ar') }}"
                                            data-edit_notes="{{ $grade->Notes }}" title="edit"><i
                                                class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#delete_grade" data-delete_id="{{ $grade->id }}"><i
                                                class="fa fa-trash"></i></button>
                                    </td>


                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th> {{ trans('pages/grades.Stage name') }}</th>
                                <th> {{ trans('pages/grades.notes') }}</th>
                                <th> {{ trans('pages/grades.processes') }}</th>
                            </tr>
                        </tfoot>

                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('pages.Grades.Models.Delete')
    @include('pages.Grades.Models.update')
    @include('pages.Grades.Models.add_Grade')
</div>
<!-- row closed -->
@endsection
@section('js')

{{-- edit model jquerey --}}
<script>
    $(document).ready(function() {
        $('#edit_grade').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data('edit_id');
            var name_en = button.data('edit_name_en');
            var name_ar = button.data('edit_name_ar');
            var notes = button.data('edit_notes');
            var modal = $(this);
            console.log(id);
            modal.find('#m_e_id').val(id);
            modal.find('#m_e_Name_en').val(name_en);
            modal.find('#m_e_Name').val(name_ar);
            modal.find('#exampleFormControlTextarea1').val(notes);
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#delete_grade').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); //

            var id = button.data('delete_id');
            var modal = $(this);
            console.log(id);
            modal.find('#m_d_id').val(id);

        });
    });
</script>

{{--  end  edit model jquerey --}}

@endsection
