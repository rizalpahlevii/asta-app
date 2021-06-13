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
            background-color: #00A0DF;
            color: white;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 style="text-align: center;">Salaries Report</h1>
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
                    <td>{{ $item->month }} / {{ $item->year }}</td>
                    <td>@currency($item->salary)</td>
                </tr>
                @php
                $sub +=$item->salary
                @endphp
                @endforeach
            </tbody>
            <tfoot>
                <td colspan="2">Total</td>
                <td colspan="2">@currency($sub)</td>
            </tfoot>
        </table>
    </div>

</body>

</html>
