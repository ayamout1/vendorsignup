<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signed Vendor Agreement</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
    </style>
</head>
<body>
    <h1>Signed Vendor Agreement</h1>

    <p>Hello,</p>
    <p>We have received and processed your vendor agreement. Please find the attached document for your records.</p>

    <!-- Access data passed to the view -->
    <p>Vendor Name: {{ $vendor_name }}</p>
    <p>Owner Name: {{ $owner_name }}</p>
    <p>Title: {{ $title }}</p>
    <p>Agreement Date: {{ date('F d, Y') }}</p>

    <p>Thank you for your prompt attention to this matter.</p>

    <p>Best Regards,<br>
    The Procurement Team</p>
</body>
</html>
