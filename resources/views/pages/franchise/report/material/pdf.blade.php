<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Material</title>
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
                Incoming Material Report

            </div>
            <div class="column">
                <img src="{{ asset('assets_landing/img/brand-logo.png') }}" style="float: right; margin-right:80px;">
            </div>
        </div>
        <table border="1">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Stock Name</th>
                    <th>Date Of Entry</th>
                    <th>Supplier</th>
                    <th>Amount</th>

                </tr>
            </thead>
            <tbody>
                @if (request()->get('start') && request()->get('end'))
                @foreach ($materials as $item)
                @php
                $history=json_decode($item->incoming_history,true);
                @endphp
                @if ($history != null)
                @foreach ($history as $row)
                @php
                $date=Carbon\Carbon::createFromFormat('Y-m-d',$row['date'])->format('Y-m-d');
                @endphp
                @if (request()->get('start') <= $date && request()->get('end') >= $date)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $row['date'] }}</td>
                        <td>{{ $item->supplier->name }}</td>
                        <td>{{ $row['stock'] }}</td>

                    </tr>
                    @endif
                    @endforeach
                    @endif
                    @endforeach
                    @endif

            </tbody>
        </table>
    </div>

</body>

</html>
