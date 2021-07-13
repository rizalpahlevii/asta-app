@extends('layouts.template')

@section('page','Create Employee')
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
                                    action="{{ route('franchise.employee.salary.store') }}" novalidate>
                                    @csrf

                                    <div class="form-group row">
                                        <label for="employee_id" class="col-sm-2 col-form-label">Employee</label>
                                        <div class="col-sm-6">
                                            <select name="employee_id" id="employee_id"
                                                class="form-control @error('employee_id') is-invalid @enderror">
                                                <option disabled selected>--Choose Employee--</option>
                                                @foreach ($employees as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>

                                            @error('employee_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="month" class="col-sm-2 col-form-label">Month</label>
                                        <div class="col-sm-6">
                                            <select name="month" id="month"
                                                class="form-control @error('month') is-invalid @enderror">
                                                <option disabled selected>Choose Month</option>
                                                <option value="01" {{ date('m') != "01" ? "disabled":""}}>Jan</option>
                                                <option value="02" {{ date('m') != "02" ? "disabled":""}}>Feb</option>
                                                <option value="03" {{ date('m') != "03" ? "disabled":""}}>Mar</option>
                                                <option value="04" {{ date('m') != "04" ? "disabled":""}}>Apr</option>
                                                <option value="05" {{ date('m') != "05" ? "disabled":""}}>May</option>
                                                <option value="06" {{ date('m') != "06" ? "disabled":""}}>Jun</option>
                                                <option value="07" {{ date('m') != "07" ? "disabled":""}}>Jul</option>
                                                <option value="08" {{ date('m') != "08" ? "disabled":""}}>Aug</option>
                                                <option value="09" {{ date('m') != "09" ? "disabled":""}}>Sep</option>
                                                <option value="10" {{ date('m') != "10" ? "disabled":""}}>Oct</option>
                                                <option value="11" {{ date('m') != "11" ? "disabled":""}}>Nov</option>
                                                <option value="12" {{ date('m') != "12" ? "disabled":""}}>Dec</option>
                                            </select>

                                            @error('month')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="year" class="col-sm-2 col-form-label">Year</label>
                                        <div class="col-sm-6">
                                            <select name="year" id="year"
                                                class="form-control @error('year') is-invalid @enderror">
                                                <option disabled selected>Cooose Year</option>
                                                <option value="2018" {{ date('Y') != "2018" ? "disabled" : "" }}>2018
                                                </option>
                                                <option value="2019" {{ date('Y') != "2019" ? "disabled" : "" }}>2019
                                                </option>
                                                <option value="2020" {{ date('Y') != "2020" ? "disabled" : "" }}>2020
                                                </option>
                                                <option value="2021" {{ date('Y') != "2021" ? "disabled" : "" }}>2021
                                                </option>
                                                <option value="2022" {{ date('Y') != "2022" ? "disabled" : "" }}>2022
                                                </option>
                                                <option value="2023" {{ date('Y') != "2023" ? "disabled" : "" }}>2023
                                                </option>
                                                <option value="2024" {{ date('Y') != "2024" ? "disabled" : "" }}>2024
                                                </option>
                                                <option value="2025" {{ date('Y') != "2025" ? "disabled" : "" }}>2025
                                                </option>
                                            </select>

                                            @error('year')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="salary" class="col-sm-2 col-form-label">Salary</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="salary"
                                                class="form-control @error('salary') is-invalid @enderror" id="salary"
                                                placeholder="Salary" value="{{ old('salary') }}">
                                            @error('salary')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <input type="submit" name="submit" value="Save Salary"
                                        class="btn btn-primary btn-sm">
                                    <a href="{{ route('franchise.employee.salary.index') }}"
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
