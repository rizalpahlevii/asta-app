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
        <h1 style="text-align: center;">Report Per Product : {{ $product->name }}</h1>
        <table border="1">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Price</th>
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
