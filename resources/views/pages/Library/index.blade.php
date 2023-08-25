@extends('layouts.master')
@section('css')
    <x-css-toast></x-css-toast>
@section('title')
    {{ trans('pages/libraryy.List of Books') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('pages/libraryy.List of Books') }}
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
                            <x-message-toaster type="success"></x-message-toaster>
                            <x-error-validation></x-error-validation>

                            <a href="{{ route('book.create') }}" class="btn btn-success btn-sm" role="button" aria-pressed="true">{{ trans('pages/libraryy.Add New Book') }}</a><br><br>
                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                    data-page-length="50" style="text-align: center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ trans('pages/libraryy.Book Name') }}</th>
                                            <th>{{ trans('pages/libraryy.Teacher Name') }}</th>
                                            <th>{{ trans('pages/libraryy.Educational Level') }}</th>
                                            <th>{{ trans('pages/libraryy.Class') }}</th>
                                            <th>{{ trans('pages/libraryy.Section') }}</th>
                                            <th>{{ trans('pages/libraryy.Actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($books as $book)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $book->title }}</td>
                                                <td>{{ $book->teacher->Name }}</td>
                                                <td>{{ $book->grade->Name }}</td>
                                                <td>{{ $book->classroom->Name_Class }}</td>
                                                <td>{{ $book->section->Name_Section }}</td>
                                                <td>
                                                    <a href="{{ url('book/download_file', $book->file_name) }}"
                                                        title="تحميل الكتاب" class="btn btn-warning btn-sm"
                                                        role="button" aria-pressed="true"><i
                                                            class="fas fa-download"></i></a>
                                                    <a href="{{ route('book.edit', $book->id) }}"
                                                        class="btn btn-info btn-sm" role="button"
                                                        aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        data-toggle="modal" data-target="#delete_book"
                                                        data-idbutton="{{ $book->id }}"
                                                        data-filenamebutton="{{ $book->file_name }}"
                                                        title="حذف"><i
                                                            class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                </table>
                            </div>
                        </div>
                        @include('pages.Library.destroy')
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
        $('#delete_book').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); //
            var id = button.data('idbutton');
            var file_name = button.data('filenamebutton');
            var modal = $(this);
            modal.find('#modelid').val(id);
            modal.find('#modelfile_name').val(file_name);


        });
    });
</script>
@endsection
