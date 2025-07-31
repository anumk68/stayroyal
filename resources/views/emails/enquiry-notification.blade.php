<!DOCTYPE html>
<html>
<head>
    <title>Your enquiry has been received</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; padding: 20px;">
    <h2>Hi {{ $enquiry->name }},</h2>

    <p>Thank you for reaching out to us.</p>
    <p>We have received your enquiry with the following details:</p>

    <ul>
        <li><strong>Subject:</strong> {{ $enquiry->subject }}</li>
        <li><strong>Message:</strong> {{ $enquiry->message }}</li>
    </ul>

    <p>Our team will review your message and respond as soon as possible.</p>
    <p>Thank you for contacting us.</p>

    <br>
    <p>Best regards,<br>Stay Royal Team</p>
</body>
</html>
