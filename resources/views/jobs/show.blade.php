<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Job Details</title>
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

        .job-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .job-title {
            font-size: 36px;
            font-weight: bold;
            color: #343a40;
        }

        .job-company {
            font-size: 20px;
            color: #6c757d;
        }

        .job-details {
            display: flex;
            flex-direction: column;
            gap: 20px;
            margin-bottom: 30px;
        }

        .job-section {
            padding: 20px;
            background: #f1f1f1;
            border-radius: 10px;
        }

        .job-section h4 {
            font-size: 20px;
            font-weight: bold;
            color: #343a40;
            margin-bottom: 10px;
        }

        .job-section p {
            font-size: 16px;
            color: #555;
            margin-bottom: 0;
        }

        .badge-salary {
            font-size: 18px;
            background-color: #28a745;
            color: #ffffff;
            padding: 10px 15px;
            border-radius: 10px;
            display: inline-block;
            margin-top: 10px;
        }

        .job-card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;

        }

        .card-footer-buttons {
            display: flex;
            align-items: center;
        }

        .job-card-footer small {
            color: #6c757d;
        }


        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .btn-secondary:hover,
        .btn-warning:hover,
        .btn-danger:hover {
            background-color: #343a40;
            color: #ffffff;
            border-color: #343a40;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="job-header">
            <h1 class="job-title">{{ $job->title }}</h1>
            <p class="job-company"><i class="fas fa-building icon"></i>{{ $job->company_name }}</p>
        </div>
        <div class="job-details">


            <div class="job-section">

            <div class="job-section">
                <h4>Location</h4>
                <p>{{ $job->location }}</p>
            </div>
            <div class="job-section">
                <h4>Description</h4>
                <p>{{ $job->description }}</p>
            </div>
            <div class="job-section">
                <h4>Qualifications</h4>
                <p>{{ $job->qualifications }}</p>
            </div>
            <div class="job-section">
                <h4>Skills</h4>
                <p>{{ $job->skills ?: 'N/A' }}</p>
            </div>
            <div class="job-section">
                <h4>Salary</h4>
                <p>{{ $job->salary ? '$' . number_format($job->salary, 2) : 'Negotiable' }}</p>
            </div>
            <div class="job-section">
                <h4>Type</h4>
                <p>{{ $job->remote }}</p>
            </div>
            <div class="job-section">
                <h4>Position</h4>
                <p>{{ $job->position }}</p>
            </div>


        </div>
        </div>
        <div class="job-footer">
            <a href="{{ route('jobs.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back to Jobs</a>
            @if ($job->user_id == auth()->id())
            <a href="{{ route('jobs.edit', $job->id) }}" class="btn btn-warning" ><i ></i> Edit</a>
            <form action="{{ route('jobs.destroy', $job->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i ></i> Delete</button>
            </form>
            @endif
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
</body>

</html>
