@extends('layouts.template')

@section('page','Categories')
@section('content')
<div class="hk-pg-header">
    <h4 class="hk-pg-title">@yield('page')</h4>
    <a href="{{ route('franchise.category.create') }}" class="btn btn-primary btn-rounded btn-sm">Create Category
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
                                                    <th>Actions</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($categories as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>
                                                        <a href="{{ route('franchise.category.edit',$item->id) }}"
                                                            class="btn btn-warning btn-sm">Edit</a>
                                                        <a href="{{ route('franchise.category.destroy',$item->id) }}"
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
