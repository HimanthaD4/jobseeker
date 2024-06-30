<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Jobs</title>
    <!-- Bootstrap CSS for styling -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Custom CSS for additional styling -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fa;
        }
        .container {
            max-width: 1200px;
            margin: 30px auto;
        }
        .job-card {
            margin-bottom: 20px;
            border: none;
            border-radius: 12px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            background: linear-gradient(135deg, #ffffff, #e9ecef);
        }
        .job-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
        }
        .card-body {
            padding: 25px;
        }
        .job-title {
            font-size: 1.8rem;
            color: #007bff;
            font-weight: bold;
        }
        .job-company {
            font-size: 1.2rem;
            color: #6c757d;
        }
        .job-description {
            font-size: 1rem;
            color: #555;
            margin-bottom: 15px;
            line-height: 1.5;
        }
        .job-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .btn {
            border-radius: 20px;
            padding: 5px 15px;
            transition: background-color 0.3s, transform 0.3s;
        }
        .btn-info:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }
        .btn-warning:hover {
            background-color: #e0a800;
            transform: scale(1.05);
        }
        .btn-danger:hover {
            background-color: #c82333;
            transform: scale(1.05);
        }
        .text-muted {
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h2 class="mb-4 text-center">Available Jobs</h2>
        @forelse ($jobs as $job)
            <div class="card job-card">
                <div class="card-body">
                    <h3 class="job-title">{{ $job->title }}</h3>
                    <p class="job-company">Posted by {{ $job->user->name }}</p>
                    <p class="job-description">{{ Str::limit($job->description, 150) }}</p>
                    <div class="job-footer">
                        <div>
                            @if ($job->user_id == auth()->id())
                                <a href="{{ route('jobs.edit', $job->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                <form action="{{ route('jobs.destroy', $job->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete</button>
                                </form>
                                <a href="{{ route('jobs.show', $job->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i> View</a>
                            @else
                                <a href="{{ route('jobs.show', $job->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i> View</a>
                            @endif
                        </div>
                        <small class="text-muted">Posted on {{ $job->created_at->format('M d, Y') }}</small>
                    </div>
                </div>
            </div>
        @empty
            <div class="alert alert-info text-center" role="alert">
                No jobs found.
            </div>
        @endforelse
    </div>
    <!-- Bootstrap JS and Font Awesome JS for functionality -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
</body>
</html>
