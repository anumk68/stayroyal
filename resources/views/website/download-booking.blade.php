<!DOCTYPE html>
<html>
<head>
    <title>Booking PDF</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        h2 { text-align: center; margin-bottom: 30px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        td, th { border: 1px solid #ddd; padding: 8px; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Booking Details</h2>
    <table>
        <tr><th>Booking ID</th><td>{{ $booking->id }}</td></tr>
        <tr><th>Room Type</th><td>{{ $booking->room_type }}</td></tr>
        <tr><th>Start Date</th><td>{{ $booking->start_date }}</td></tr>
        <tr><th>End Date</th><td>{{ $booking->end_date }}</td></tr>
        <tr><th>Total Member</th><td>{{ $booking->adults + $booking->children + $booking->infants}}</td></tr>
        <tr><th>Location</th><td>{{ $booking->location }}</td></tr>
        <tr><th>Price</th><td>{{ $booking->price }}</td></tr>
        <tr><th>Size</th><td>{{ $booking->size }}</td></tr>
        <tr><th>User Name</th><td>{{ $user->user_name }}</td></tr>
        <tr><th>User Email</th><td>{{ $user->email }}</td></tr>
    </table>
</body>
</html>
