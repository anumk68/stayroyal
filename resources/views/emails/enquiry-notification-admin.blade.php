<!DOCTYPE html>
<html>
<head>
    <title>New enquiry received</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; padding: 20px;">
    <h2>New enquiry received from a user</h2>

    <p><strong>Name:</strong> {{ $enquiry->name }}</p>
    <p><strong>Email:</strong> {{ $enquiry->email }}</p>
    <p><strong>Subject:</strong> {{ $enquiry->subject }}</p>
    <p><strong>Message:</strong><br>{{ $enquiry->message }}</p>

    <br>
    <p>Please follow up with the user as soon as possible.</p>

    <br>
    <p>--<br>This is an automated notification.</p>
</body>
</html>
