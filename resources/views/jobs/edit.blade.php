<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Job</title>
    <!-- Bootstrap CSS for styling -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS for additional styling -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom right, #0056b3, #000000);
            /* color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            overflow: hidden; */
        }
        .card {
            background: rgba(0, 0, 0, 0.7);
            color: white;
            border: none;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
        }
        .card-header {
            background: linear-gradient(to right, #1d88e7, #0056b3);
            color: white;
            font-weight: bold;
        }
        .form-control {
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
        }
        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }
        .btn-primary {
            background: linear-gradient(to right, #1d88e7, #0056b3);
            border: none;
            color: white;
        }
        .btn-primary:hover {
            background: linear-gradient(to right, #0056b3, #1d88e7);
        }
        .alert-danger {
            background-color: rgba(217, 83, 79, 0.8);
            border-color: rgba(217, 83, 79, 0.8);
            color: white;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h3>Edit Job</h3>
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
                <form action="{{ route('jobs.update', $job->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Job Title</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Enter job title" value="{{ old('title', $job->title) }}">
                    </div>
                    <div class="form-group">
                        <label for="description">Job Description</label>
                        <textarea name="description" id="description" class="form-control" rows="5" placeholder="Enter job description">{{ old('description', $job->description) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="location">Location</label>
                        <textarea name="location" id="location" class="form-control" rows="5" placeholder="Enter job location">{{ old('location', $job->location) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="remote">Job remote</label>
                        <textarea name="remote" id="remote" class="form-control" rows="5" placeholder="Enter job remote">{{ old('remote', $job->remote) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="position">Job position</label>
                        <textarea name="position" id="position" class="form-control" rows="5" placeholder="Enter job position">{{ old('position', $job->position) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="company_name">Job company_name</label>
                        <textarea name="company_name" id="company_name" class="form-control" rows="5" placeholder="Enter job company_name">{{ old('company_name', $job->company_name) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="qualifications">Job qualifications</label>
                        <textarea name="qualifications" id="qualifications" class="form-control" rows="5" placeholder="Enter job qualifications">{{ old('qualifications', $job->qualifications) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="skills">Job skills</label>
                        <textarea name="skills" id="skills" class="form-control" rows="5" placeholder="Enter job skills">{{ old('skills', $job->skills) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="salary">Job salary</label>
                        <textarea name="salary" id="salary" class="form-control" rows="5" placeholder="Enter job salary">{{ old('salary', $job->salary) }}</textarea>
                    </div>



                    <button type="submit" class="btn btn-primary">Update Job</button>
                </form>
            </div>

            
        </div>
    </div>
    <!-- Bootstrap JS for functionality -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
