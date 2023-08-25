@extends('layouts.master')
@section('css')
<link rel="stylesheet" href="{{ URL::asset('assets/css/inputanswer.css') }}">

    <x-css-toast></x-css-toast>
    @livewireStyles
@section('title')
   {{ trans('dashboardes/studentDashboard.List Exercise') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
   {{ trans('dashboardes/studentDashboard.List Exercise') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')


@livewire('show-question', ['quize' => $quize, 'questions' => $questions, 'student' => $student])


@endsection
@section('js')


@livewireScripts
@endsection
