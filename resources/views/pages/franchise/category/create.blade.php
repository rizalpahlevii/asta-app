@extends('layouts.template')

@section('page','Create Category')
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
                                    action="{{ route('franchise.category.store') }}" novalidate>
                                    @csrf
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="name"
                                                class="form-control @error('name') is-invalid @enderror" id="name"
                                                placeholder="Category Name" value="{{ old('name') }}">
                                            @error('name')
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
