@extends('layouts.template')

@section('page','Create User')
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
                                <form method="POST" class="needs-validations" action="{{ route('admin.user.store') }}"
                                    novalidate>
                                    @csrf

                                    <div class="form-group row">
                                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="name"
                                                class="form-control @error('name') is-invalid @enderror" id="name"
                                                placeholder=" Name" value="{{ old('name') }}">
                                            @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-6">
                                            <input type="Email" name="email"
                                                class="form-control @error('email') is-invalid @enderror" id="email"
                                                placeholder="Email" value="{{ old('email') }}">
                                            @error('username')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="username"
                                                class="form-control @error('username') is-invalid @enderror"
                                                id="username" placeholder="User Name" value="{{ old('username') }}">
                                            @error('username')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                                        <div class="col-sm-6">
                                            <input type="password" name="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                id="password" placeholder="Password">
                                            @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="role" class="col-sm-2 col-form-label">Role</label>
                                        <div class="col-sm-6">
                                            <select name="role" id="role"
                                                class="form-control @error('role') is-invalid @enderror">
                                                <option disabled selected>--Choose option--</option>
                                                <option value="admin">Admin</option>
                                                <option value="franchise">Franchise</option>
                                            </select>

                                            @error('role')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row" id="kotak-franchise" style="display: none;">
                                        <label for="franchise_id" class="col-sm-2 col-form-label">Franchise</label>
                                        <div class="col-sm-6">
                                            <select name="franchise_id" id="franchise_id"
                                                class="form-control @error('franchise_id') is-invalid @enderror">
                                                <option disabled selected>--Choose option--</option>
                                                @foreach ($franchises as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>

                                            @error('franchise_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <input type="submit" name="submit" value="Create User "
                                        class="btn btn-primary btn-sm">
                                    <a href="{{ route('admin.user.index') }}" class="btn btn-dark btn-sm">Back</a>
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
        $('#role').change(function(){
            if($(this).val() == 'admin'){
                $('#kotak-franchise').css('display','none');
            }else{
                $('#kotak-franchise').css('display','');
            }
        });
    });
</script>
@endpush
