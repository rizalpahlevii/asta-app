@extends('layouts.template')

@section('page','Edit Franchise')
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
                                        <label for="franchise_name" class="col-sm-2 col-form-label">Franchise
                                            Name</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="franchise_name"
                                                class="form-control @error('franchise_name') is-invalid @enderror"
                                                id="franchise_name" placeholder="Franchise Type Name"
                                                value="{{ $franchise->name }}">
                                            @error('franchise_name')
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
                                        <label for="address" class="col-sm-2 col-form-label">Franchise Address</label>
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
                                        <label for="phone" class="col-sm-2 col-form-label"> Franchise Phone</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="phone"
                                                class="form-control @error('phone') is-invalid @enderror" id="phone"
                                                placeholder="phone" value="{{ $franchise->phone }}">
                                            @error('phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="name" class="col-sm-2 col-form-label">Name of User</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="name"
                                                class="form-control @error('name') is-invalid @enderror" id="name"
                                                placeholder=" Name" value="{{ $user->name }}">
                                            @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="username"
                                                class="form-control @error('username') is-invalid @enderror"
                                                id="username" placeholder="User Name" value="{{ $user->username }}">
                                            @error('username')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-sm-2 col-form-label">User Email</label>
                                        <div class="col-sm-6">
                                            <input type="Email" name="email"
                                                class="form-control @error('email') is-invalid @enderror" id="email"
                                                placeholder="Email" value="{{ $user->email }}">
                                            @error('username')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password" class="col-sm-2 col-form-label">User Password</label>
                                        <div class="col-sm-6">
                                            <input type="password" name="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                id="password" placeholder="Password">
                                            @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <p class="text-dark-500 mb-2">Kosongkan password jika tidak ingin mengganti password
                                    </p>

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
