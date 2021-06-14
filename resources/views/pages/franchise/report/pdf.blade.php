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
            padding-bottom: 30px;

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
                Report Product


                <p style="font-size: 18px;">Month : {{ request()->get('month') }}</p>
                <p style="font-size: 18px;">Year : {{ request()->get('year') }}</p>


            </div>
            <div class="column">
                <img src="{{ asset('assets_landing/img/brand-logo.png') }}" style="float: right; margin-right:80px;">
            </div>
        </div>
        <table border="1">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Product Name</th>
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

</body>

</html>
