<!DOCTYPE html>
<html>
<head>
    <title>Trips List</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h2 class="header">Trips List</h2>
    <table>
        <thead>
            <tr>
                <th>Destination</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Cost</th>
            </tr>
        </thead>
        <tbody>
            @foreach($trips as $trip)
                <tr>
                    <td>{{ $trip->destination }}</td>
                    <td>{{ $trip->start_date }}</td>
                    <td>{{ $trip->end_date }}</td>
                    <td>{{ $trip->cost }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
