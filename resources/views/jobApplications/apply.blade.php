<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Apply for Job</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container {
            background: #ffffff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            padding: 40px;
            margin-top: 50px;
            max-width: 900px;
            margin-bottom: 50px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: bold;
        }

        .btn-submit {
            background-color: #007bff;
            border-color: #007bff;
            color: #ffffff;
        }

        .btn-submit:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-4">Apply for Job: {{ $job->title }}</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('jobApplications.store') }}" method="POST">
            @csrf
            <input type="hidden" name="job_id" value="{{ $job->id }}">
            <div class="form-group">
                <label for="name" class="form-label">Your Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name" value="{{ old('name') }}" required>
            </div>
            <div class="form-group">
                <label for="email" class="form-label">Your Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" value="{{ old('email') }}" required>
            </div>
            <div class="form-group">
                <label for="contact" class="form-label">Contact Number</label>
                <input type="text" name="contact" id="contact" class="form-control" placeholder="Enter your contact number" value="{{ old('contact') }}" required>
            </div>
            <div class="form-group">
                <label for="address" class="form-label">Address</label>
                <textarea name="address" id="address" class="form-control" rows="3" placeholder="Enter your address" required>{{ old('address') }}</textarea>
            </div>
            <div class="form-group">
                <label for="linkedInLink" class="form-label">LinkedIn Profile Link</label>
                <input type="text" name="linkedInLink" id="linkedInLink" class="form-control" placeholder="Enter your LinkedIn profile link" value="{{ old('linkedInLink') }}">
            </div>
            <button type="submit" class="btn btn-submit btn-block">Submit Application</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
