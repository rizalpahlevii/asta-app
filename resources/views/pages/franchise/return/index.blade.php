@extends('layouts.template')

@section('page','Return')
@section('content')
<div class="hk-pg-header">
    <h4 class="hk-pg-title">@yield('page')</h4>
    <div class="row">
        <div class="col-md-12">

            <a href="{{ route('franchise.return.pdf') }}" class="btn btn-primary btn-rounded btn-sm">Export PDF
            </a>
            <a href="{{ route('franchise.return.create') }}" class="btn btn-primary btn-rounded btn-sm">Create
                Return
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
                                                    <th>Stock Name</th>
                                                    <th>Date</th>
                                                    <th>Amount Of Return</th>
                                                    <th>Supplier</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($returns as $return)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $return->rawMaterial->name }}</td>
                                                    <td>{{ $return->date }}</td>
                                                    <td>{{ $return->amount }}</td>
                                                    <td>{{ $return->rawMaterial->supplier->name }}</td>
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
