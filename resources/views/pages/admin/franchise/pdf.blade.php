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
                style="color:#fff; font-size:30px; font-wight:bold;font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
                Franchise Income
                {{ $franchise->name }}
                <p style="font-size: 13px;">
                    @if (request()->get('filter_by')=="date")
                    {{ request()->get('start') }} - {{ request()->get('end') }}
                    @elseif(request()->get('filter_by') == "month")
                    {{ date('F', mktime(0, 0, 0, request()->get('month'), 10)) }} - {{ request()->get('year') }}
                    @else
                    {{ request()->get('year') }}
                    @endif
                </p>
            </div>
            <div class="column">
                <img src="{{ asset('assets_landing/img/brand-logo.png') }}" style="float: right; margin-right:80px;">
            </div>
        </div>
        <table border="1">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Franchise Name</th>
                    <th>Owner Name</th>
                    <th>Address</th>
                    <th>Income</th>
                </tr>
            </thead>
            <tbody>
                @php
                $total = 0;
                @endphp
                @foreach ($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->month }} {{ $item->year }}</td>
                    <td>{{ $franchise->name }}</td>
                    <td>{{ $franchise->owner_name }}</td>
                    <td>{{ $franchise->address }}</td>
                    <td>@currency($item->income)</td>

                </tr>
                @php
                $total +=$item->income;
                @endphp
                @endforeach

            </tbody>
            <thead>
                <td colspan="3">
                    <center>Total</center>
                </td>
                <td colspan="3">
                    <center>@currency($total)</center>
                </td>
            </thead>
        </table>
    </div>

</body>

</html>
