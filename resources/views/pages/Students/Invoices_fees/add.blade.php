@extends('layouts.master')
@section('css')
    <x-css-toast></x-css-toast>

@section('title')
{{ trans('pages/invoice.Add a new invoice') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
{{ trans('pages/invoice.Add a new invoice') }}  {{ $student->name }}
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

                <form class=" row mb-30" action="{{ route('invoice.store')}}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="repeater">
                            <div data-repeater-list="List_Fees">
                                <div data-repeater-item>
                                    <div class="row">

                                        <div class="col">
                                            <label for="Name" class="mr-sm-2">{{ trans('pages/invoice.Student Name') }}</label>
                                            <select class="fancyselect" name="student_id" required>
                                                <option selected value="{{ $student->id }}">{{ $student->name }}</option>
                                            </select>
                                        </div>

                                        <div class="col">
                                            <label for="Name_en" class="mr-sm-2">{{ trans('pages/invoice.Fee Type') }}</label>
                                            <div class="box">
                                                <select class="fancyselect fee_id" name="fee_id" required>
                                                    <option value=""> -- {{ trans('pages/invoice. Choose from the list') }}-- </option>
                                                    @foreach ($fees as $fee)
                                                        <option value="{{ $fee->id }}">{{ $fee->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>

                                        <div class="col">
                                            <label for="Name_en" class="mr-sm-2">{{ trans('pages/invoice.Amount') }}</label>
                                            <div class="box">

                                                <input class="form-control mounttt" type="text" name="amount" required>

                                                </select>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <label for="description" class="mr-sm-2">{{ trans('pages/invoice.Description') }}</label>
                                            <div class="box">
                                                <input type="text" class="form-control" name="description" required>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <label for="Name_en" class="mr-sm-2">{{ trans('pages/invoice.Processes') }}:</label>
                                            <input class="btn btn-danger btn-block" data-repeater-delete type="button"
                                                value="delete_row" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-20">
                                <div class="col-12">
                                    <input class="button" data-repeater-create type="button" value="add_row" />
                                </div>
                            </div><br>
                            <input type="hidden" name="Grade_id" value="{{ $student->grade->id }}">
                            <input type="hidden" name="Classroom_id" value="{{ $student->classroom->id }}">

                            <button type="submit" class="btn btn-primary">{{ trans('pages/invoice.Confirm Data') }}</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')



<script>
    $(document).ready(function() {
        $(document).on('change', '.fee_id', function() {
            var fee_id = $(this).val();
            var mount_element = $(this).closest('[data-repeater-item]').find('.mounttt');
            if (fee_id) {
                $.ajax({
                    url: '/invoice/get_mount_byfees/' + fee_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        mount_element.empty();
                        mount_element.val(data);
                    }
                });
            } else {
                mount_element.empty();
                console.log("bad");
            }
        });
    });
</script>

@endsection
