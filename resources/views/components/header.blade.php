<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Job Seeker App</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #1a1a2e;
            color: #fff;

        }

        .navbar {
            background-color: #343a40;
            padding: 5px 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            color: #0798ff;
            font-size: 1.5rem;
            font-weight: bold;
            text-transform: uppercase;
            display: flex;
            align-items: center;
            margin-bottom: 5px;
            margin-top: -7px;
        }

        .navbar-brand img {
            margin-right: 10px;
            height: 30px;
            border-radius: 50%;
        }

        .navbar-nav {
            margin-left: auto;
            margin-top: -7px;
        }

        .nav-link {
            color: #fff;
            margin-left: 20px;
            font-size: 1rem;
            text-transform: uppercase;
            transition: all 0.3s ease;
            position: relative;
        }

        .nav-link:hover {
            color: #0798ff;
        }

        .nav-link::before {
            content: '';
            position: absolute;
            width: 0%;
            height: 2px;
            bottom: -3px;
            left: 0;
            background-color: #0798ff;
            transition: width 0.3s ease;
        }

        .nav-link:hover::before {
            width: 100%;
        }

        .logout-btn {

            color: #f58c8c;
            margin-left: 50px;
            font-size: 1rem;
            text-transform: uppercase;
            transition: all 0.3s ease;
            position: relative;
            margin-top: 6px;
            border: none;
            background: none;



        }

        .logout-btn:hover {
            color: #c82333;
        }
    </style>
</head>
<body>

<header>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('images/cc.png') }}" alt="Company Logo">
                Job Seeker App
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('jobs.index') }}">Browse Jobs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('applications.index') }}">Applications</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('profile.edit') }}">Profile</a>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="logout-btn">Logout</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
</header>



</body>
</html>
