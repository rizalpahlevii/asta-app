@extends('layouts.template')

@section('page','Create Product')
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
                                    action="{{ route('franchise.product.store') }}" novalidate>
                                    @csrf
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-2 col-form-label">Product Name</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="name"
                                                class="form-control @error('name') is-invalid @enderror" id="name"
                                                placeholder="Product Name" value="{{ old('name') }}">
                                            @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-2 col-form-label">Product Name</label>
                                        <div class="col-sm-6">
                                            <select name="category_id" id="category_id"
                                                class="form-control @error('name') is-invalid @enderror">
                                                <option disabled selected>--Choose Option--</option>
                                                @foreach ($categories as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="price" class="col-sm-2 col-form-label">Price</label>
                                        <div class="col-sm-6">
                                            <input type="number" name="price"
                                                class="form-control @error('name') is-invalid @enderror" id="price"
                                                placeholder="Product price" value="{{ old('price') }}">
                                            @error('price')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="discount" class="col-sm-2 col-form-label">Discount</label>
                                        <div class="col-sm-6">
                                            <input type="number" name="discount"
                                                class="form-control @error('name') is-invalid @enderror" id="discount"
                                                placeholder="Product discount" value="{{ old('discount') }}">
                                            @error('discount')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-2 col-form-label">Product Name</label>
                                        <div class="col-sm-6">
                                            <select name="material_id1" id="material_id1"
                                                class="form-control @error('name') is-invalid @enderror">
                                                <option disabled selected>--Choose Option--</option>
                                                @foreach ($materials as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-2 col-form-label">Product Name</label>
                                        <div class="col-sm-6">
                                            <select name="material_id2" id="material_id2"
                                                class="form-control @error('name') is-invalid @enderror">
                                                <option disabled selected>--Choose Option--</option>
                                                @foreach ($materials as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="image" class="col-sm-2 col-form-label">Image</label>
                                        <div class="col-sm-6">
                                            <input type="file" name="image"
                                                class="form-control @error('name') is-invalid @enderror" id="image"
                                                placeholder="Product image" value="{{ old('image') }}">
                                            @error('image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <input type="submit" name="submit" value="Save Franchise"
                                        class="btn btn-primary btn-sm">
                                    <a href="{{ route('franchise.category.index') }}"
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
