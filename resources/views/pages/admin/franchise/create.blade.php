@extends('layouts.template')

@section('page','Create Franchise')
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
                                    action="{{ route('admin.franchise.store') }}" novalidate>
                                    @csrf
                                    <div class="form-group row">
                                        <label for="type" class="col-sm-2 col-form-label">Franchise Type</label>
                                        <div class="col-sm-6">
                                            <select name="type" id="type"
                                                class="form-control @error('type') is-invalid @enderror">
                                                <option disabled selected>--Choose option--</option>
                                                @foreach ($types as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>

                                            @error('type')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="name"
                                                class="form-control @error('name') is-invalid @enderror" id="name"
                                                placeholder="Franchise  Name" value="{{ old('name') }}">
                                            @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="owner_name" class="col-sm-2 col-form-label">Owner Name</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="owner_name"
                                                class="form-control @error('owner_name') is-invalid @enderror"
                                                id="owner_name" placeholder="Owner Name"
                                                value="{{ old('owner_name') }}">
                                            @error('owner_name')
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
                                        <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="phone"
                                                class="form-control @error('phone') is-invalid @enderror" id="phone"
                                                placeholder="phone" value="{{ old('phone') }}">
                                            @error('phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <input type="submit" name="submit" value="Save Franchise"
                                        class="btn btn-primary btn-sm">
                                    <a href="{{ route('admin.franchise.index') }}" class="btn btn-dark btn-sm">Back</a>
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
