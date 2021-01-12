@extends('layouts.template')

@section('page','Create Voucher')
@section('content')
<div class="hk-pg-header">
    <h4 class="hk-pg-title">@yield('page')</h4>

</div>
<div class="row">
    <div class="col-xl-12">
        <div class="hk-row">
            <div class="col-lg-12 col-md-12">
                <div class="card card-sm">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form method="POST" class="needs-validations"
                                    action="{{ route('franchise.voucher.store') }}" novalidate>
                                    @csrf

                                    <div class="form-group row">
                                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="name"
                                                class="form-control @error('name') is-invalid @enderror" id="name"
                                                placeholder="Voucher Name" value="{{ old('name') }}">
                                            @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="code" class="col-sm-2 col-form-label">Code</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="code"
                                                class="form-control @error('code') is-invalid @enderror" id="code"
                                                placeholder="Voucher Code" value="{{ old('code') }}">
                                            @error('code')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nominal_value" class="col-sm-2 col-form-label">Nominal Value</label>
                                        <div class="col-sm-6">
                                            <input type="number" name="nominal_value"
                                                class="form-control @error('nominal_value') is-invalid @enderror"
                                                id="nominal_value" placeholder="Nominal Value"
                                                value="{{ old('nominal_value') }}">
                                            @error('nominal_value')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="percent_value" class="col-sm-2 col-form-label">Percent Value</label>
                                        <div class="col-sm-6">
                                            <input type="number" name="percent_value"
                                                class="form-control @error('percent_value') is-invalid @enderror"
                                                id="percent_value" placeholder="Percent Value"
                                                value="{{ old('percent_value') }}">
                                            @error('percent_value')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="minimum_order" class="col-sm-2 col-form-label">Minimum Order</label>
                                        <div class="col-sm-6">
                                            <input type="number" name="minimum_order"
                                                class="form-control @error('minimum_order') is-invalid @enderror"
                                                id="minimum_order" placeholder="Minimum Order"
                                                value="{{ old('minimum_order') }}">
                                            @error('minimum_order')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="initial_quota" class="col-sm-2 col-form-label">Initial Quota</label>
                                        <div class="col-sm-6">
                                            <input type="number" name="initial_quota"
                                                class="form-control @error('initial_quota') is-invalid @enderror"
                                                id="initial_quota" placeholder="Initial Quota"
                                                value="{{ old('initial_qouta') }}">
                                            @error('initial_quota')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="expired_at" class="col-sm-2 col-form-label">Expired At</label>
                                        <div class="col-sm-6">
                                            <input type="date" name="expired_at"
                                                class="form-control @error('expired_at') is-invalid @enderror"
                                                id="expired_at" placeholder="Expired At"
                                                value="{{ old('expired_at') }}">
                                            @error('expired_at')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <input type="submit" name="submit" value="Create Voucher "
                                        class="btn btn-primary btn-sm">
                                    <a href="{{ route('franchise.voucher.index') }}"
                                        class="btn btn-dark btn-sm">Back</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
<script>
    $(document).ready(function(){
        $('#nominal_value').keyup(function(){
            $('#percent_value').val(0);
        });
        $('#percent_value').keyup(function(){
            $('#nominal_value').val(0);
        });
    });
</script>
@endpush
