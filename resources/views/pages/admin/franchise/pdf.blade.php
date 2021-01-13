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
        <h1 style="text-align: center;">INCOME {{ $franchise->name }}</h1>
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
