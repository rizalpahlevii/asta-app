<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Franchise Data</title>
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
        <h1 style="text-align: center;">Franchise Data</h1>
        <table border="1">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Type</th>
                    <th>Name</th>
                    <th>Owner Name</th>
                    <th>Address</th>
                    <th>Phone</th>


                </tr>
            </thead>
            <tbody>
                @foreach ($franchises as $item)
                @if ($item->franchiseType)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->franchiseType->name }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->owner_name }}</td>
                    <td>{{ $item->address }}</td>
                    <td>{{ $item->phone }}</td>



                </tr>
                @endif
                @endforeach

            </tbody>
        </table>
    </div>

</body>

</html>
