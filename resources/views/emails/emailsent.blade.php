<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Created</title>
    <!-- Bootstrap CDN -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #f8f9fa; padding: 20px;">
    <div class="container">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h2>New Ticket Created</h2>
            </div>
            <div class="card-body">
                <p>{{ $customMessage }}</p> <!-- Changed from $message to $customMessage -->

                <table class="table table-bordered">
                    <tr>
                        <th>Ticket ID</th>
                        <td>{{ $ticket->id }}</td>
                    </tr>
                    <tr>
                        <th>Title</th>
                        <td>{{ $ticket->title }}</td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td>{!! html_entity_decode($ticket->desc) !!}</td>
                    </tr>
                    <tr>
                        <th>Created By</th>
                        <td>{{ $admin_name }}</td>
                    </tr>
                </table>

                <p>Thank you for creating the ticket. We will get back to you shortly.</p>
            </div>
            <div class="card-footer text-center text-muted">
                <small>&copy; {{ date('d F Y') }} Developed By Nafiz Fuad</small>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
