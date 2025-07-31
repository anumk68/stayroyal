<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            font-family: Arial, sans-serif;
        }
        th, td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Hello {{ Auth::user()->user_name ?? 'User' }},</h1>

    <p>Thanks for Booking. We're happy to have you!</p>

    <h3>Booking Details:</h3>
 <table>
    <tr>
        <th>Room Type</th>
        <td>{{ $sand_emails->room_type ?? '' }}</td>
    </tr>
    <tr>
        <th>Location</th>
        <td>{{ $sand_emails->location ?? '' }}</td>
    </tr>
    <tr>
        <th>Price</th>
        <td>{{ $sand_emails->price ?? '' }}</td>
    </tr>
    <tr>
        <th>Size</th>
        <td>{{ $sand_emails->size ?? '' }}</td>
    </tr>
    <tr>
        <th>Start Date</th>
        <td>{{ $sand_emails->start_date ?? '' }}</td>
    </tr>
    <tr>
        <th>End Date</th>
        <td>{{ $sand_emails->end_date ?? '' }}</td>
    </tr>
    <tr>
        <th>Total member</th>
        <td>{{ $sand_emails->total_days ?? '' }}</td>
    </tr>
</table>

</body>
</html>
