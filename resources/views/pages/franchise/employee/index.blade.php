@extends('layouts.template')

@section('page','Employees')
@section('content')
<div class="hk-pg-header">
    <h4 class="hk-pg-title">@yield('page')</h4>
    <div class="row">
        <div class="col-md-12">

            <a href="{{ route('franchise.employee.pdf') }}" class="btn btn-primary btn-rounded btn-sm">Export PDF
            </a>
            <a href="{{ route('franchise.employee.create') }}" class="btn btn-primary btn-rounded btn-sm">Create
                Employee
            </a>
        </div>
    </div>
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
                                                    <th>Name</th>
                                                    <th>Gender</th>
                                                    <th>Phone</th>
                                                    <th>Address</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($employees as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->gender }}</td>
                                                    <td>{{ $item->phone }}</td>
                                                    <td>{{ $item->address }}</td>
                                                    <td>{{ $item->status }}</td>
                                                    <td>
                                                        <a href="{{ route('franchise.employee.edit',$item->id) }}"
                                                            class="btn btn-warning btn-sm">Edit</a>
                                                        <a href="{{ route('franchise.employee.destroy',$item->id) }}"
                                                            class="btn btn-danger btn-sm">Delete</a>
                                                    </td>
                                                </tr>
                                                @endforeach

                                            </tbody>
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
