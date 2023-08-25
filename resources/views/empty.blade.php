@extends('layouts.master')
@section('css')
    <x-css-toast></x-css-toast>
@section('title')

    {{ trans('pages/recipt.Bonds of receipt') }}

@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('pages/recipt.Bonds of receipt') }}
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

                <div class="row">

                    <div class="col-sm-3">
                        <div class="card" style="width: 18rem; height:5rem">
                            <img src="{{ URL::asset('assets/images/book.jpg') }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Special title treatment</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional
                                    content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
</div>
{{--  --}}

{{--  --}}
@endsection
@section('js')

@endsection
