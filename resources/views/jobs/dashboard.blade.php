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
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom right, #0056b3, #000000);
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            overflow: hidden;
        }
        .container {
            max-width: 1100px;
            margin: 50px auto;
            padding: 20px;
            background: rgba(0, 0, 0, 0.7);
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
            position: relative; /* For positioning moving elements */
        }
        .card {
            background: rgba(0, 0, 0, 0.5);
            margin-bottom: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            border: none;
            color: white;
        }
        .logout-btn {
            background: linear-gradient(to right, #1d88e7, #0056b3);
            border: none;
            color: white;
            font-weight: bold;
            position: absolute;
            top: 10px;
            right: 10px;
            transition: all 0.3s ease;
        }
        .logout-btn:hover {
            background: linear-gradient(to right, #0056b3, #1d88e7);
            transform: translateY(-3px);
        }
        .username {
            position: absolute;
            top: 10px;
            right: 130px;
            font-size: 1.2rem;
        }
        .btn-primary, .btn-info, .btn-warning, .btn-danger {
            background: linear-gradient(to right, #1d88e7, #0056b3);
            border: none;
            color: white;
        }
        .btn-primary:hover, .btn-info:hover, .btn-warning:hover, .btn-danger:hover {
            background: linear-gradient(to right, #0056b3, #1d88e7);
            transform: translateY(-3px);
        }
        .table {
            color: white;
        }
        .table th, .table td {
            border-color: rgba(255, 255, 255, 0.2);
        }
        /* Motion styles */
        .moving-element {
            position: absolute;
            animation: move 10s linear infinite;
        }
        @keyframes move {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }
        .moving-element:nth-child(odd) {
            animation-duration: 8s;
        }
        .moving-element:nth-child(even) {
            animation-duration: 12s;
        }
        /* Adjustments for better layout */
        .table td:nth-child(2) {
            width: 40%; /* Enlarge description column */
        }
        .table td:nth-child(3) {
            width: 20%; /* Reduce action column width */
        }
        .btn-container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .btn-container .btn {
            width: 48%; /* Ensure buttons take up equal width */
        }
    </style>
</head>
<body>
    <div class="moving-element" style="top: 20%; width: 100%; height: 5px; background: rgba(255, 255, 255, 0.3);"></div>
    <div class="moving-element" style="top: 40%; width: 100%; height: 10px; background: rgba(255, 255, 255, 0.3);"></div>
    <div class="moving-element" style="top: 60%; width: 100%; height: 7px; background: rgba(255, 255, 255, 0.3);"></div>
    <div class="moving-element" style="top: 80%; width: 100%; height: 5px; background: rgba(255, 255, 255, 0.3);"></div>

    @if (Auth::check())
        <div class="username">Welcome, {{ Auth::user()->name }}</div>
    @endif
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn logout-btn"><i class="fas fa-sign-out-alt"></i> Logout</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <div class="container">
        <div class="card p-4">
            <h2 class="mb-4">Your Job Listings</h2>
            <div class="btn-container">
                <a href="{{ route('jobs.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Create New Job</a>
                <a href="{{ route('jobs.index') }}" class="btn btn-info"><i class="fas fa-list"></i> View All Jobs</a>
            </div>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
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
                                <td>{{ Str::limit($job->description, 150) }}</td>
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
