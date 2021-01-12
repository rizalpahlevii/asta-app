@extends('layouts.template')

@section('page','Voucher')
@section('content')
<div class="hk-pg-header">
    <h4 class="hk-pg-title">@yield('page')</h4>
    <a href="{{ route('franchise.voucher.create') }}" class="btn btn-primary btn-rounded btn-sm">Create Voucher
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
                                        <table class="table mb-0 table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Code</th>
                                                    <th>Nominal Value</th>
                                                    <th>Percent Value</th>
                                                    <th>Minimum Order</th>
                                                    <th>Initial Quota</th>
                                                    <th>Remaining Quota</th>
                                                    <th>Expired</th>
                                                    <th>Actions</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($vouchers as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->code }}</td>
                                                    <td>{{ $item->nominal_value  }}</td>
                                                    <td>{{ $item->percent_value }} %</td>
                                                    <td>{{ $item->minimum_order}}</td>
                                                    <td>{{ $item->initial_quota }}</td>
                                                    <td>{{ $item->remaining_quota }}</td>
                                                    <td>{{ $item->expired_at }}</td>
                                                    <td>
                                                        <a href="{{ route('franchise.voucher.edit',$item->id) }}"
                                                            class="btn btn-warning btn-sm">Edit</a>
                                                        <a href="{{ route('franchise.voucher.destroy',$item->id) }}"
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
