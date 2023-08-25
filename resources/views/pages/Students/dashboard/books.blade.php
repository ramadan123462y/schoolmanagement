@extends('layouts.master')
@section('css')


@section('title')

    {{ trans('pages/recipt.Bonds of receipt') }}

@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')

    {{ trans('pages/recipt.library') }}

@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                <div class="row">
                    @foreach ($books as $book)
                        <div class="col-sm-4">
                            <div class="card" style="width:15rem">
                                <img src="{{ URL::asset('assets/images/book.jpg') }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $book->title }}</h5>
                                    <p class="card-text">
                                        {{ trans('dashboardes/studentDashboard.Teacher') }}:{{ $book->teacher->Name }}
                                        <br>
                                        {{ trans('dashboardes/studentDashboard.Classroom') }}:{{ $book->classroom->Name_Class }}
                                        <br>
                                        {{ trans('dashboardes/studentDashboard.Grade') }}:{{ $book->grade->Name }}
                                        <br>

                                    </p>
                                    <a href="{{ url('student/download_book', $book->file_name) }}" title="تحميل الكتاب"
                                        class="btn btn-warning btn-sm" role="button" aria-pressed="true"><i
                                            class="fas fa-download"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                {{ $books->links() }}

            </div>

        </div>
    </div>
</div>
{{--  --}}

{{--  --}}
@endsection
@section('js')
<script src="https://cdn.tailwindcss.com"></script>
@endsection
