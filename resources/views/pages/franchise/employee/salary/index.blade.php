@extends('layouts.template')

@section('page','Salary')
@section('content')
<div class="hk-pg-header">
    <h4 class="hk-pg-title">@yield('page')</h4>
    <a href="{{ route('franchise.employee.salary.create') }}" class="btn btn-primary btn-rounded btn-sm">Create Salary
    </a>
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="hk-row">
            <div class="col-lg-12 col-md-12">
                <div class="card card-sm">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-wrap">
                                    <div class="table-responsive">
                                        <table class="table mb-0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Employee Name</th>
                                                    <th>Date</th>
                                                    <th>Salary</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                $sub=0;
                                                @endphp
                                                @foreach ($salaries as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->employee->name }}</td>
                                                    <td>{{ $item->month }} / {{ $item->year }}</td>
                                                    <td>@currency($item->salary)</td>
                                                </tr>
                                                @php
                                                $sub +=$item->salary
                                                @endphp
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <td colspan="2">Total</td>
                                                <td colspan="2">@currency($sub)</td>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
