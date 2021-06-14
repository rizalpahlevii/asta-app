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
                style="color:#fff; font-size:40px; font-wight:bold;font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
                Franchise Data
            </div>
            <div class="column">
                <img src="{{ asset('assets_landing/img/brand-logo.png') }}" style="float: right; margin-right:80px;">
            </div>
        </div>


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
