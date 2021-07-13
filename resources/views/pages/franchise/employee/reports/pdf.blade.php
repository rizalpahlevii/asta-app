<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Salaries</title>
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
                style="color:#fff; font-size:25px; font-wight:bold;font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
                Salaries Report
                @if (request()->get('filter_by') == "employee")
                <p>Employee : {{ $employee->name }}</p>
                @elseif(request()->get('filter_by') == "month")
                <p style="font-size: 18px;">Month : {{ date('F', mktime(0, 0, 0, request()->get('month'), 10)) }}</p>
                <p style="font-size: 18px;margin-bottom:20px;">Year : {{ request()->get('year') }}</p>
                @else

                <p>Year : {{ request()->get('year') }}</p>
                @endif

            </div>
            <div class="column">
                <img src="{{ asset('assets_landing/img/brand-logo.png') }}" style="float: right; margin-right:80px;">
            </div>
        </div>
        <table class="table mb-0" border="1">
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
                    <td>{{ date('F', mktime(0, 0, 0, $item->month, 10)) }} -
                        {{ $item->year }}</td>
                    <td>@currency($item->salary)</td>
                </tr>
                @php
                $sub +=$item->salary
                @endphp
                @endforeach
            </tbody>
            <tfoot>
                <td colspan="3">Total</td>
                <td colspan="2">@currency($sub)</td>
            </tfoot>
        </table>
    </div>

</body>

</html>
