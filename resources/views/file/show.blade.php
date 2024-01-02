<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Uploaded Files</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Edit Uploaded Files</h1>
        <form action="{{ route('file.update', ['email' => dd($vendorFiles->vendor_email_c);]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="email" id="email" value="{{ $vendorFiles->vendor_email_c }}">
            <div class="form-group">
                <label for="vehicle_file">Vehicle Insurance File:</label>
                <p>Current File: {{ $vendorFiles->vehicle_file_path_c ?? 'Nothing Uploaded' }}</p>
                <input type="file" name="vehicle_file" id="vehicle_file" class="form-control-file">
            </div>

            <div class="form-group">
                <label for="general_liability_file">General Liability File:</label>
                <p>Current File: {{ $vendorFiles->general_liability_file_path_c ?? 'Nothing Uploaded' }}</p>
                <input type="file" name="general_liability_file" id="general_liability_file" class="form-control-file">
            </div>

            <div class="form-group">
                <label for="worker_file">Worker Compensation File:</label>
                <p>Current File: {{ $vendorFiles->worker_file_path_c ?? 'Nothing Uploaded' }}</p>
                <input type="file" name="worker_file" id="worker_file" class="form-control-file">
            </div>

            <div class="form-group">
                <label for="w9_file">W9 File:</label>
                <p>Current File: {{ $vendorFiles->file_path_c ?? 'Nothing Uploaded' }}</p>
                <input type="file" name="file_path" id="w9_file" class="form-control-file">
            </div>

            <button type="submit" class="btn btn-primary">Update Files</button>
        </form>
    </div>

    <!-- Optional JavaScript and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
