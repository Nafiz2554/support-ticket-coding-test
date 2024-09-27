<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Status Update</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Ticket Status Update</h1>
        <p>Dear Customer,</p>
        <p>Your ticket with ID <strong>{{ $ticket->id }}, {{ $ticket->title }} </strong> has been <strong>{{ $customMessage }}</strong>.</p>
        <p>Thank you for your attention!</p>
        <footer>
            <p>Regards,</p>
            <p>Nafiz Fuad</p>
        </footer>
    </div>
</body>
</html>
