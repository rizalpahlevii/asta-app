@extends('layouts.template')

@section('page','Create Supplier')
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
                                    action="{{ route('franchise.material.store') }}" novalidate>
                                    @csrf
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-2 col-form-label">Stock Name</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="name"
                                                class="form-control @error('name') is-invalid @enderror" id="name"
                                                placeholder="Name" value="{{ old('name') }}">
                                            @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="supplier_id" class="col-sm-2 col-form-label">Supplier</label>
                                        <div class="col-sm-6">
                                            <select name="supplier_id" id="supplier_id"
                                                class="form-control  @error('name') is-invalid @enderror">
                                                <option disabled selected>--Choose Option--</option>
                                                @foreach ($suppliers as $item)
                                                <option value="{{ $item->supplier->id }}"
                                                    data-phone="{{ $item->supplier->phone }}"
                                                    data-address="{{ $item->supplier->address }}"
                                                    data-owner="{{ $item->supplier->owner }}">
                                                    {{ $item->supplier->name }}</option>
                                                @endforeach
                                            </select>

                                            @error('supplier_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="amount" class="col-sm-2 col-form-label">Amount</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="amount"
                                                class="form-control @error('amount') is-invalid @enderror" id="amount"
                                                placeholder="Amount" value="{{ old('amount') }}">
                                            @error('amount')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="expired" class="col-sm-2 col-form-label">Expired</label>
                                        <div class="col-sm-6">
                                            <input type="date" name="expired"
                                                class="form-control @error('expired') is-invalid @enderror" id="expired"
                                                placeholder="expired" value="{{ old('expired') }}">
                                            @error('expired')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="unit" class="col-sm-2 col-form-label">Unit</label>
                                        <div class="col-sm-6">
                                            <select name="unit" id="unit"
                                                class="form-control  @error('name') is-invalid @enderror">
                                                <option disabled selected>--Choose Option--</option>
                                                <option value="pcs">PCS</option>
                                                <option value="gram">Gram</option>
                                            </select>

                                            @error('unit')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="information" class="col-sm-2 col-form-label">Information</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="information"
                                                class="form-control @error('information') is-invalid @enderror"
                                                id="information" placeholder="information"
                                                value="{{ old('information') }}">
                                            @error('information')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="deductions_per_transaction"
                                            class="col-sm-2 col-form-label">Deductions per transaction</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="deductions_per_transaction"
                                                class="form-control @error('deductions_per_transaction') is-invalid @enderror"
                                                id="deductions_per_transaction" placeholder="deductions_per_transaction"
                                                value="{{ old('deductions_per_transaction') }}">
                                            @error('deductions_per_transaction')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <input type="submit" name="submit" value="Create Supplier "
                                        class="btn btn-primary btn-sm">
                                    <a href="{{ route('franchise.material.index') }}"
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
