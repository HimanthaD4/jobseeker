<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create New Job</title>
    <!-- Bootstrap CSS for styling -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
                <form action="{{ route('jobs.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title">Job Title</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Enter job title" value="{{ old('title') }}">
                    </div>
                    <div class="form-group">
                        <label for="description">Job Description</label>
                        <textarea name="description" id="description" class="form-control" rows="5" placeholder="Enter job description">{{ old('description') }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Create Job</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS for functionality -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
