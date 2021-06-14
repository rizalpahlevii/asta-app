<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Data</title>
    <style>
        table {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        table td,
        table th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table tr:hover {
            background-color: #ddd;
        }

        table th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #264EEE;
            color: white;
        }

        * {
            box-sizing: border-box;
        }

        /* Create two equal columns that floats next to each other */
        .column {
            float: left;
            width: 50%;
            padding-right: 10px;
            padding-left: 10px;
            padding-top: 30px;
            padding-bottom: 10px;

            height: 100px;
            /* Should be removed. Only for demonstration */
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row" style="background-color:#264EEE; margin-bottom:30px;">
            <div class="column"
                style="color:#fff; font-size:35px; font-wight:bold;font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
                Transaction Report

                @if (request()->get('filter_by')=="employee")
                <p style="font-size: 18px;">Employee : {{ $employee->name }}</p>
                @else
                <p style="font-size: 18px;">Month : {{ request()->get('month') }}</p>
                <p style="font-size: 18px;">Year : {{ request()->get('year') }}</p>
                @endif

            </div>
            <div class="column">
                <img src="{{ asset('assets_landing/img/brand-logo.png') }}" style="float: right; margin-right:80px;">
            </div>
        </div>
        <table class="table" id="datable_1">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Order Date</th>
                    <th>Normal Price</th>
                    <th>Discount</th>
                    <th>Voucher Discount</th>
                    <th>Total Pay</th>
                    <th>Employee</th>
                </tr>
            </thead>
            <tbody>
                @php
                $total=0;
                @endphp
                @foreach ($orders as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->order_date }}</td>
                    <td>@currency($item->normal_price)</td>
                    <td>@currency($item->discount )</td>
                    <td>@currency($item->voucher_discount )</td>
                    <td>@currency($item->total_pay )</td>
                    <td>{{  $item->employee->name}}</td>
                </tr>
                @php
                $total +=$item->total_pay
                @endphp
                @endforeach
            </tbody>
            <thead>
                <td colspan="4">
                    <center><b>Total</b></center>
                </td>
                <td colspan="3"><b>
                        <center>@currency($total)</center>
                    </b></td>
            </thead>
        </table>
    </div>

</body>

</html>
