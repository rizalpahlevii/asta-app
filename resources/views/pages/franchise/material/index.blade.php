@extends('layouts.template')

@section('page','Materials')
@section('content')
<div class="hk-pg-header">
    <h4 class="hk-pg-title">@yield('page')</h4>
    <a href="{{ route('franchise.material.create') }}" class="btn btn-primary btn-rounded btn-sm">Create Material
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
                                                    <th>Stock Name</th>
                                                    <th>Item</th>
                                                    <th>Expired</th>
                                                    <th>Supplier</th>
                                                    <th>Jumlah</th>
                                                    <th>Information</th>
                                                    <th>Actions</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($materials as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->unit }}</td>
                                                    <td>{{ $item->expired }}</td>
                                                    <td>{{ $item->supplier->name }}</td>
                                                    <td>{{ $item->amount }}</td>
                                                    <td>{{ $item->information }}</td>

                                                    <td>
                                                        <a href="{{ route('franchise.material.edit',$item->id) }}"
                                                            class="btn btn-warning btn-sm">Edit</a>
                                                        <a href="{{ route('franchise.material.destroy',$item->id) }}"
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
