<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Job Seeker</title>
    <link rel="shortcut icon" type="image/png" href="../images/cc.png" />
    <link rel="stylesheet" href="../css/styles.min.css" />
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .card {
            margin-bottom: 20px;
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 20px;
        }

        .job-details p {
            margin: 0 0 5px;
            font-size: 14px;
            color: #555;
        }

        .job-details p strong {
            color: #333;
        }

        .job-footer {
            margin-top: 10px;
            text-align: right;
        }

        .alert {
            margin: 20px;
        }

        .btn-icon {
            margin-right: 10px;
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

        .job-actions form {
            display: inline-block;
        }

        .btn {
            border-radius: 20px;
            margin-right: 10px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .container-fluid {
            padding-top: 20px;
        }

        .sidebar,
        .header {
            background: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
        }

        .header {
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
        }

        .header .user-profile {
            display: flex;
            align-items: center;
        }

        .header .user-profile img {
            border-radius: 50%;
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <!-- Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        @include('components.sidebar')
        @include('components.header2')

        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <div class="body-wrapper">
            <div class="container-fluid">
                <div class="row">
                    @forelse ($jobs as $job)
                    <div class="col-md-6 col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-9 fw-semibold">{{ $job->title }}</h5>
                                <div class="job-details">
                                    <p><strong>Location:</strong> {{ $job->location }}</p>
                                    <p><strong>Remote:</strong> {{ $job->remote }}</p>
                                    <p><strong>Position:</strong> {{ $job->position }}</p>
                                    <p><strong>Company:</strong> {{ $job->company_name }}</p>
                                    <p><strong>Salary:</strong> ${{ number_format($job->salary, 2) }}</p>
                                </div>
                                <div class="job-card-footer">
                                    <div class="job-actions">
                                        <a href="{{ route('jobApplications.jobCandidates', $job->id) }}" class="btn btn-primary btn-icon"><i
                                                class="fas fa-eye"></i></a>


                                    </div>
                                    <div class="job-footer">
                                        <small class="text-muted">Posted on {{ $job->created_at->format('M d, Y') }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12 text-center">No jobs posted yet.</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/sidebarmenu.js"></script>
    <script src="../assets/js/app.min.js"></script>
    <script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
    <script src="../assets/js/dashboard.js"></script>
</body>
