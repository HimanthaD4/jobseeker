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

        .form-group {
            margin-bottom: 20px;
        }

        .btn {
            border-radius: 20px;
            margin-right: 10px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .add-skill-btn,
        .add-qualification-btn {
            margin-top: 10px;
        }

        /* Additional styling for responsiveness */
        @media (max-width: 768px) {
            .card {
                padding: 15px;
            }
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
                <div class="row justify-content-center">
                    <div class="col-md-8">

                        <div class="card">
                            <div class="card-body">
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                <form action="{{ route('jobs.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="title">Job Title</label>
                                        <input type="text" name="title" id="title" class="form-control"
                                            placeholder="Enter job title" value="{{ old('title') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Job Description</label>
                                        <textarea name="description" id="description" class="form-control" rows="5"
                                            placeholder="Enter job description"
                                            required>{{ old('description') }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="location">Job Location</label>
                                        <input type="text" name="location" id="location" class="form-control"
                                            placeholder="Enter job location" value="{{ old('location') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="remote">Remote Type</label>
                                        <select name="remote" id="remote" class="form-control">
                                            <option value="On-site">On-site</option>
                                            <option value="Remote">Remote</option>
                                            <option value="Hybrid">Hybrid</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="position">Position</label>
                                        <input type="text" name="position" id="position" class="form-control"
                                            placeholder="Enter job position" value="{{ old('position') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="company_name">Company Name</label>
                                        <input type="text" name="company_name" id="company_name" class="form-control"
                                            placeholder="Enter company name" value="{{ old('company_name') }}"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="qualifications">Required Qualifications</label>
                                        <div id="qualifications-container">
                                            <input type="text" name="qualifications[]" class="form-control mb-2" placeholder="Enter required qualifications">
                                            <input type="text" name="qualifications[]" class="form-control mb-2" placeholder="Enter required qualifications">
                                        </div>
                                        <button type="button" class="btn btn-secondary add-qualification-btn" onclick="addQualification()">+</button>
                                    </div>

                                    <div class="form-group">
                                        <label for="skills">Required Skills</label>
                                        <div id="skills-container">
                                            <input type="text" name="skills[]" class="form-control mb-2" placeholder="Enter required skills">
                                            <input type="text" name="skills[]" class="form-control mb-2" placeholder="Enter required skills">
                                        </div>
                                        <button type="button" class="btn btn-secondary add-skill-btn" onclick="addSkill()">+</button>
                                    </div>

                                    <div class="form-group">
                                        <label for="salary">Salary</label>
                                        <input type="number" name="salary" id="salary" class="form-control"
                                            placeholder="Enter salary" value="{{ old('salary') }}">
                                    </div>
                                    <div class="form-group text-right">
                                        <button type="submit" class="btn btn-primary">Create Job</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
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
    <script>
        function addSkill() {
            const container = document.getElementById('skills-container');
            const input = document.createElement('input');
            input.type = 'text';
            input.name = 'skills[]';
            input.className = 'form-control mb-2';
            input.placeholder = 'Enter required skills';
            container.appendChild(input);
        }

        function addQualification() {
            const container = document.getElementById('qualifications-container');
            const input = document.createElement('input');
            input.type = 'text';
            input.name = 'qualifications[]';
            input.className = 'form-control mb-2';
            input.placeholder = 'Enter required qualifications';
            container.appendChild(input);
        }
    </script>
</body>

</html>
