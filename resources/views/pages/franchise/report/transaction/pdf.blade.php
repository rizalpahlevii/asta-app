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
            background-color: #00A0DF;
            color: white;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 style="text-align: center;">Report Data</h1>
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
