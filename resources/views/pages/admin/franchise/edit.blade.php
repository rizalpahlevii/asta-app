@extends('layouts.template')

@section('page','Franchise')
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
                                    action="{{ route('admin.franchise.update',$franchise->id) }}" novalidate>
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group row">
                                        <label for="type" class="col-sm-2 col-form-label">Franchise Type</label>
                                        <div class="col-sm-6">
                                            <select name="type" id="type"
                                                class="form-control @error('type') is-invalid @enderror">
                                                <option disabled selected>--Choose option--</option>
                                                @foreach ($types as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $item->id == $franchise->franchise_type_id ?'selected':'' }}>
                                                    {{ $item->name }}</option>
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
                                                placeholder="Franchise Type Name" value="{{ $franchise->name }}">
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
                                                value="{{ $franchise->owner_name }}">
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
                                                placeholder="Address" value="{{ $franchise->address }}">
                                            @error('address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="type" class="col-sm-2 col-form-label">User</label>
                                        <div class="col-sm-6">
                                            <select name="user" id="user"
                                                class="form-control @error('user') is-invalid @enderror">
                                                <option disabled>--Choose option--</option>
                                                <option value="{{ $franchise->user_id }}" selected>
                                                    {{ $franchise->user->name }}
                                                </option>
                                                @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                @endforeach
                                            </select>

                                            @error('user')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <input type="submit" name="submit" value="Update Franchise"
                                        class="btn btn-primary btn-sm">
                                    <a href="{{ route('admin.franchise.type.index') }}"
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
