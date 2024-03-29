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
                                    action="{{ route('franchise.supplier.store') }}" novalidate>
                                    @csrf

                                    <div class="form-group row">
                                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-6">
                                            <select name="supplier_id" id="name"
                                                class="form-control  @error('name') is-invalid @enderror">
                                                <option disabled selected>--Choose Option--</option>
                                                @foreach ($suppliers as $item)
                                                <option value="{{ $item->id }}" data-phone="{{ $item->phone }}"
                                                    data-address="{{ $item->address }}" data-owner="{{ $item->owner }}">
                                                    {{ $item->name }}</option>
                                                @endforeach
                                            </select>

                                            @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="phone"
                                                class="form-control @error('phone') is-invalid @enderror" id="phone"
                                                placeholder="Phone" value="{{ old('phone') }}">
                                            @error('phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="address" class="col-sm-2 col-form-label">Address</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="address"
                                                class="form-control @error('address') is-invalid @enderror" id="address"
                                                placeholder="Address" value="{{ old('address') }}">
                                            @error('address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="owner" class="col-sm-2 col-form-label">Owner Name</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="owner"
                                                class="form-control @error('owner') is-invalid @enderror" id="owner"
                                                placeholder="Owner Name" value="{{ old('owner') }}">
                                            @error('owner')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <input type="submit" name="submit" value="Add Supplier "
                                        class="btn btn-primary btn-sm">
                                    <a href="{{ route('franchise.supplier.index') }}"
                                        class="btn btn-dark btn-sm">Back</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('franchise.supplier.download_pdf') }}" target="_blank" class="text-right float-right">
                    Klik Disini Untuk Melihat Suppliers
                    Berdasarkan Alamat Terdekat
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
    $(document).ready(function(){
        $('#name').change(function(){
            $('#phone').val($(this).find('option:selected').data('phone'))
            $('#address').val($(this).find('option:selected').data('address'))
            $('#owner').val($(this).find('option:selected').data('owner'))
        });
    })
</script>
@endpush
