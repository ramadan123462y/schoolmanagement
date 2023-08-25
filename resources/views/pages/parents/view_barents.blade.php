@extends('layouts.master')
@section('css')
    @livewireStyles
@section('title')
Parents
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">Parents</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">Parents</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                @livewire('viewbarent')
            </div>
        </div>
    </div>
</div>
@livewireScripts
@endsection
@section('js')
<script>
    window.addEventListener('update_parent', event => {
          toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("data Add Suceesfully");
    })
    </script>
<script>
    window.addEventListener('delete_parent', event => {
          toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("data Add Suceesfully");
    })
    </script>
@endsection
