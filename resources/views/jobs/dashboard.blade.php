<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Your Job Listings - Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to bottom right, #1a1a2e, #16213e);
            color: #fff;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 1200px;
            margin: auto;
        }
        .card {
            background: rgba(255, 255, 255, 0.1);
            border: none;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card-body {
            display: flex;
            flex-direction: column;
            padding: 20px;
        }
        .job-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }
        .job-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #e0e0e0;
        }
        .job-details {
            font-size: 1rem;
            color: #b0b0b0;
        }
        .job-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }
        .btn {
            border: none;
            color: #fff;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background 0.3s, transform 0.3s;
        }
        .btn-edit {
            background: #ffc107;
        }
        .btn-edit:hover {
            background: #e0a800;
            transform: scale(1.05);
        }
        .btn-delete {
            background: #dc3545;
        }
        .btn-delete:hover {
            background: #c82333;
            transform: scale(1.05);
        }
        .btn-create {
            background: #007bff;
            margin-bottom: 20px;
        }
        .btn-create:hover {
            background: #0056b3;
            transform: scale(1.05);
        }
        .welcome {
            font-size: 1.2rem;
            margin-bottom: 20px;
            text-align: center;
        }
        .job-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="welcome">
            @if (Auth::check())
                Welcome, {{ Auth::user()->name }}
            @endif
        </div>

        <a href="{{ route('jobs.create') }}" class="btn btn-create">
            <i class="fas fa-plus"></i> Create New Job
        </a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @forelse ($jobs as $job)
            <div class="card">
                <div class="card-body">
                    <div class="job-header">
                        <div class="job-title">{{ $job->title }}</div>
                        <div class="job-actions">
                            <a href="{{ route('jobs.show', $job->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i> View</a>
                            <a href="{{ route('jobs.edit', $job->id) }}" class="btn btn-edit">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('jobs.destroy', $job->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete">
                                    <i class="fas fa-trash-alt"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="job-footer">
                        <small class="text-muted">Posted on {{ $job->created_at->format('M d, Y') }}</small>
                    </div>
                    <div class="job-details">
                        <p><strong>Location:</strong> {{ $job->location }}</p>
                        <p><strong>Remote:</strong> {{ $job->remote }}</p>
                        <p><strong>Position:</strong> {{ $job->position }}</p>
                        <p><strong>Company:</strong> {{ $job->company_name }}</p>
                        <p><strong>Salary:</strong> ${{ number_format($job->salary, 2) }}</p>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center">No jobs posted yet.</div>
        @endforelse
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
</body>
</html>
