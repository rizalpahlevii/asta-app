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
            background-color: #00A0DF;
            color: white;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 style="text-align: center;">Report Material</h1>
        <table border="1">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Stock Name</th>
                    <th>Unit</th>
                    <th>Expired</th>
                    <th>Supplier</th>
                    <th>Jumlah</th>
                    <th>Information</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($materials as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->unit }}</td>
                    <td>{{ $item->expired }}</td>
                    <td>{{ $item->supplier->name }}</td>
                    <td>{{ $item->amount }}</td>
                    <td>{{ $item->information }}</td>

                </tr>
                @endforeach

            </tbody>
        </table>
    </div>

</body>

</html>
