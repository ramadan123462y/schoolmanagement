@extends('layouts.master')
@section('css')
    <x-css-toast></x-css-toast>

@section('title')
    {{ trans('pages/invoice.Modifying tuition fees') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('pages/invoice.Modifying tuition fees') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <x-error-validation></x-error-validation>
                <x-message-toaster></x-message-toaster>
                <form action="{{ route('invoice.update','invoice') }}" method="post" autocomplete="off">
                    @method('PUT')
                    @csrf
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="inputEmail4">{{ trans('pages/invoice.Student Name') }}</label>
                            <input type="text" value="{{ $fee_invoices->student->name }}" readonly name="title_ar"
                                class="form-control">
                            <input type="hidden" value="{{ $fee_invoices->id }}" name="id" class="form-control">
                        </div>
                        <div class="form-group col">
                            <label for="inputEmail4">{{ trans('pages/invoice.Amount') }}</label>
                            <input type="number" readonly value="{{ $fee_invoices->amount }}" name="amount"
                                class="form-control mounttt">
                        </div>
                    </div>


                    <div class="form-row">

                        <div class="form-group col">
                            <label for="inputZip">{{ trans('pages/invoice.Fee Type') }}</label>
                            <select class="custom-select mr-sm-2 fee_id"  name="fee_id">

                                @foreach ($fees as $fee)
                                    <option value="{{ $fee->id }}"
                                        {{ $fee->id == $fee_invoices->fee_id ? 'selected' : '' }}>{{ $fee->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="inputAddress">{{ trans('pages/invoice.Notes') }}</label>
                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="4">{{ $fee_invoices->description }}</textarea>
                    </div>
                    <br>

                    <button type="submit" class="btn btn-primary">{{ trans('pages/invoice.Confirm') }}</button>

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
            if (fee_id) {
                $.ajax({
                    url: '/invoice/get_mount_byfees/' + fee_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('.mounttt').empty();
                        $('.mounttt').val(data);
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
