<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create New Job</title>
    <!-- Bootstrap CSS for styling -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Custom CSS for additional styling -->
    <style>
        body {
            background: linear-gradient(to bottom right, #0056b3, #000000);
            color: white;
        }
        .container {
            margin: 30px auto;
            padding: 20px;
            background: rgba(0, 0, 0, 0.7);
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
            max-width: 40%;
        }
        .card {
            background: rgba(0, 0, 0, 0.5);
            margin-bottom: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            border: none;
            color: white;

        }
        .form-control {
            margin-bottom: 15px;
            background: rgba(0, 0, 0, 0.5);
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0069d9;
            border-color: #0062cc;
        }
        .btn-primary:focus, .btn-primary.focus {
            box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.5);
        }
        .btn-primary.disabled, .btn-primary:disabled {
            background-color: #007bff;
            border-color: #007bff;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h3>Create New Job</h3>
            </div>
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
                        <input type="text" name="title" id="title" class="form-control" placeholder="Enter job title" value="{{ old('title') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Job Description</label>
                        <textarea name="description" id="description" class="form-control" rows="5" placeholder="Enter job description" required>{{ old('description') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="location">Job Location</label>
                        <input type="text" name="location" id="location" class="form-control" placeholder="Enter job location" value="{{ old('location') }}">
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
                        <input type="text" name="position" id="position" class="form-control" placeholder="Enter job position" value="{{ old('position') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="company_name">Company Name</label>
                        <input type="text" name="company_name" id="company_name" class="form-control" placeholder="Enter company name" value="{{ old('company_name') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="qualifications">Required Qualifications</label>
                        <textarea name="qualifications" id="qualifications" class="form-control" rows="5" placeholder="Enter required qualifications" required>{{ old('qualifications') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="skills">Required Skills</label>
                        <textarea name="skills" id="skills" class="form-control" rows="3" placeholder="Enter required skills">{{ old('skills') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="salary">Salary</label>
                        <input type="number" name="salary" id="salary" class="form-control" placeholder="Enter salary" value="{{ old('salary') }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Create Job</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS and Font Awesome JS for functionality -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
</body>
</html>
