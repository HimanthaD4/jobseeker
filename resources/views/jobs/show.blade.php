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
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fa;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 900px;
            margin: 40px auto;
            padding: 20px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .job-header {
            text-align: center;
            padding-bottom: 20px;
            border-bottom: 1px solid #ddd;
        }
        .job-title {
            font-size: 2.5rem;
            color: #007bff;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .job-company {
            font-size: 1.4rem;
            color: #6c757d;
            margin-bottom: 20px;
        }
        .job-details {
            margin-top: 20px;
        }
        .job-section {
            margin-bottom: 30px;
        }
        .job-section h4 {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 10px;
            border-left: 4px solid #007bff;
            padding-left: 10px;
        }
        .job-section p {
            font-size: 1.1rem;
            color: #555;
            line-height: 1.6;
        }
        .badge {
            font-size: 1rem;
            padding: 10px;
            border-radius: 12px;
            background-color: #e9ecef;
            color: #333;
        }
        .btn-custom {
            background-color: #007bff;
            color: white;
            border-radius: 20px;
            transition: all 0.3s ease;
        }
        .btn-custom:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }
        .btn-secondary {
            background-color: #6c757d;
            color: white;
            border-radius: 20px;
            transition: all 0.3s ease;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
            transform: scale(1.05);
        }
        .job-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 20px;
            border-top: 1px solid #ddd;
            margin-top: 20px;
        }
        .icon {
            margin-right: 5px;
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
                <span class="badge">{{ $job->salary ? '$' . number_format($job->salary, 2) : 'Negotiable' }}</span>
            </div>
        </div>
        <div class="job-footer">
            <a href="{{ route('jobs.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back to Jobs</a>
            <div>
                @if ($job->user_id == auth()->id())
                    <a href="{{ route('jobs.edit', $job->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                    <form action="{{ route('jobs.destroy', $job->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
</body>
</html>
