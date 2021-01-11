@extends('layouts.template')

@section('page','Reports')
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
                                <div class="table-wrap">
                                    <div class="table-responsive">
                                        <table class="table mb-0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Product Name</th>
                                                    <th>Date</th>
                                                    <th>Amount</th>
                                                    <th>Price</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                $total=0;
                                                @endphp
                                                @foreach ($products as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td></td>
                                                    <td>
                                                        @php
                                                        $amount = 0;
                                                        $price = 0;
                                                        @endphp
                                                        @foreach ($item->orderDetails as $row)
                                                        @php
                                                        $amount += $row->quantity;
                                                        $price += $row->subtotal;
                                                        @endphp
                                                        @endforeach
                                                        {{ $amount }}
                                                    </td>
                                                    <td>@currency($price)</td>
                                                </tr>
                                                @php
                                                $total += $price
                                                @endphp
                                                @endforeach
                                            </tbody>
                                            <thead>
                                                <td colspan="3">
                                                    <center><b>Total</b></center>
                                                </td>
                                                <td colspan="2"><b>@currency($total)</b></td>
                                            </thead>
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
