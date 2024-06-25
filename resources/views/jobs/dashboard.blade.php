<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Your Job Listings - Dashboard</title>
    <!-- Bootstrap CSS for styling -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Custom CSS for additional styling -->
    <style>
        /* Custom styles can go here */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            max-width: 800px;
            margin: 30px auto;
        }
        .card {
            margin-bottom: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card p-4">
            <h2 class="mb-4">Your Job Listings</h2>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <a href="{{ route('jobs.create') }}" class="btn btn-primary mb-4">Create New Job</a>
            <a href="{{ route('jobs.index') }}" class="btn btn-info mb-4">View All Jobs</a>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($jobs as $job)
                            <tr>
                                <td>{{ $job->title }}</td>
                                <td>{{ Str::limit($job->description, 50) }}</td>
                                <td>
                                    @if ($job->user_id == auth()->id())
                                        <a href="{{ route('jobs.edit', $job->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                        <form action="{{ route('jobs.destroy', $job->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete</button>
                                        </form>
                                    @else
                                        @if ($job->applications->contains('user_id', auth()->id()))
                                            <form action="{{ route('applications.destroy', $job->applications->where('user_id', auth()->id())->first()) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-times"></i> Cancel Application</button>
                                            </form>
                                        @else
                                            <form action="{{ route('jobs.apply', $job->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-check"></i> Apply</button>
                                            </form>
                                        @endif
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">No jobs found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS and Font Awesome JS for functionality -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
</body>
</html>
