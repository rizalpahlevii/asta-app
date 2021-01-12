@extends('layouts.template')

@section('page','Franchise')
@section('content')
<div class="hk-pg-header">
    <h4 class="hk-pg-title">@yield('page')</h4>
    <a href="{{ route('admin.franchise.create') }}" class="btn btn-primary btn-rounded btn-sm">Create Franchise
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
                                                    <th>Type</th>
                                                    <th>Name</th>
                                                    <th>Owner Name</th>
                                                    <th>Address</th>
                                                    <th>Phone</th>
                                                    <th>Income</th>
                                                    <th>Actions</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($franchises as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->franchiseType->name }}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->owner_name }}</td>
                                                    <td>{{ $item->address }}</td>
                                                    <td>{{ $item->phone }}</td>
                                                    <td></td>
                                                    <td>
                                                        <a href="{{ route('admin.franchise.edit',$item->id) }}"
                                                            class="btn btn-warning btn-sm">Edit</a>
                                                        <a href="{{ route('admin.franchise.destroy',$item->id) }}"
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
