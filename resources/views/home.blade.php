<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Seeker</title>
    <style>
        @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css');

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
            text-align: center;
            z-index: 10;
        }
        .logo-container {
            margin-bottom: 20px;
        }
        .logo {
            max-width: 200px;
            height: auto;
        }
        .header {
            position: absolute;
            top: 20px;
            right: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            z-index: 10;
        }
        .user-info {
            font-size: 1rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .logout-button {
            padding: 10px 20px;
            font-size: 1rem;
            color: white;
            text-transform: uppercase;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            border-radius: 5px;
            font-weight: bold;
            background: linear-gradient(to right, #1d88e7, #0056b3);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        .logout-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
        }
        h1 {
            font-size: 3rem;
            margin-bottom: 2rem;
            color: #ffffff;
            z-index: 10;
        }
        .button-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }
        .main-button {
            padding: 20px 50px;
            font-size: 1.5rem;
            color: white;
            text-transform: uppercase;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            border-radius: 10px;
            font-weight: bold;
            background: linear-gradient(to right, #007bff, #1d88e7);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            z-index: 10;
            animation: pulse 2s infinite;
        }
        .main-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
        }
        .recruiters-button {
            background: linear-gradient(to right, #1d88e7, #0056b3);
        }
        .job-seekers-button {
            background: linear-gradient(to right, #1d88e7, #0056b3);
        }
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        .background-animation {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 1;
            overflow: hidden;
        }
        .background-animation::before {
            content: '';
            position: absolute;
            width: 200%;
            height: 200%;
            top: -50%;
            left: -50%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.2), rgba(0, 0, 0, 0));
            animation: rotate 20s linear infinite;
        }
        @keyframes rotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        .floating {
            position: absolute;
            animation: float 5s ease-in-out infinite;
            z-index: 2;
        }
        .floating:nth-child(1) {
            top: 10%;
            left: 20%;
            animation-duration: 4s;
        }
        .floating:nth-child(2) {
            top: 30%;
            left: 80%;
            animation-duration: 6s;
        }
        .floating:nth-child(3) {
            top: 50%;
            left: 50%;
            animation-duration: 5s;
        }
        .floating:nth-child(4) {
            top: 70%;
            left: 30%;
            animation-duration: 7s;
        }
        .floating:nth-child(5) {
            top: 90%;
            left: 70%;
            animation-duration: 6s;
        }
        @keyframes float {
            0% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0); }
        }
        .fast-moving {
            position: absolute;
            animation: move 10s linear infinite;
            z-index: 2;
        }
        .fast-moving:nth-child(6) {
            top: 10%;
            left: -10%;
        }
        .fast-moving:nth-child(7) {
            top: 20%;
            left: 110%;
            animation-duration: 12s;
        }
        .fast-moving:nth-child(8) {
            top: 50%;
            left: -10%;
            animation-duration: 8s;
        }
        .fast-moving:nth-child(9) {
            top: 80%;
            left: 110%;
            animation-duration: 15s;
        }
        @keyframes move {
            0% { transform: translateX(0); }
            100% { transform: translateX(120vw); }
        }
    </style>
</head>
<body>
    <div class="background-animation"></div>
    <div class="header">
        <div class="user-info">
            <span>{{ Auth::user()->name }}</span>
            <a href="{{ route('logout') }}" class="logout-button"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </div>
    </div>
    <div class="container">
        <div class="logo-container">
            <img src="{{ asset('images/cc.png') }}" alt="Job Seeker Logo" class="logo">
        </div>
        <h1>Welcome to Job Seeker</h1>
        <div class="button-container">
            <a href="{{ route('dashboard') }}" class="main-button recruiters-button"><i class="fas fa-briefcase"></i> Recruiters</a>
            <a href="{{ route('jobs.index') }}" class="main-button job-seekers-button"><i class="fas fa-user"></i> Seekers</a>
        </div>
    </div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    <div class="floating"><i class="fas fa-circle"></i></div>
    <div class="floating"><i class="fas fa-square"></i></div>
    <div class="floating"><i class="fas fa-triangle"></i></div>
    <div class="floating"><i class="fas fa-star"></i></div>
    <div class="floating"><i class="fas fa-heart"></i></div>
    <div class="fast-moving"><i class="fas fa-briefcase"></i></div>
    <div class="fast-moving"><i class="fas fa-file-alt"></i></div>
    <div class="fast-moving"><i class="fas fa-search"></i></div>
    <div class="fast-moving"><i class="fas fa-comments"></i></div>
</body>
</html>
