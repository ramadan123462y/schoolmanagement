@extends('layouts.master')
@section('css')
    <x-css-toast></x-css-toast>
@section('title')
    حصص اونلاين
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    حصص اونلاين
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
                            <x-error-validation></x-error-validation>
                            <x-message-toaster type="success"></x-message-toaster>


                            <a href="" class="btn btn-success" role="button"
                                aria-pressed="true">اضافة حصة اونلاين جديدة</a>
                            <a class="btn btn-warning" href="">اضافة حصة اوفلاين
                                جديدة</a>
                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                    data-page-length="50" style="text-align: center">
                                    <thead>
                                        <tr class="alert-success">
                                            <th>#</th>
                                            <th>المرحلة</th>
                                            <th>الصف</th>
                                            <th>القسم</th>
                                            <th>المعلم</th>
                                            <th>عنوان الحصة</th>
                                            <th>تاريخ البداية</th>
                                            <th>وقت الحصة</th>
                                            <th>رابط الحصة</th>
                                            <th>العمليات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($online_classes as $online_classe)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $online_classe->grade->Name }}</td>
                                                <td>{{ $online_classe->classroom->Name_Class }}</td>
                                                <td>{{ $online_classe->section->Name_Section }}</td>
                                                <td>{{ $online_classe->created_by }}</td>
                                                <td>{{ $online_classe->topic }}</td>
                                                <td>{{ $online_classe->start_at }}</td>
                                                <td>{{ $online_classe->duration }}</td>
                                                <td class="text-danger"><a href=""
                                                        target="_blank">انضم الان</a></td>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        data-toggle="modal"
                                                        data-target="#Delete_receipt"><i
                                                            class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>

                                        @endforeach
                                </table>
                            </div>
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

@endsection
