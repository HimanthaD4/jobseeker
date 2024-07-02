<?php

namespace App\Http\Controllers;

use App\Models\Job; // Replace with your model
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function index()
    {
        // Fetch data from your model or database
        $jobs = Job::all(); // Example query to fetch all jobs

        // Perform any data processing or calculations here
        $jobCount = $jobs->count(); // Example calculation

        // Pass data to the view
        return view('chart', [
            'jobs' => $jobs,
            'jobCount' => $jobCount,
        ]);
    }



    public function showChart()
    {
        // Replace with your actual logic to fetch job count data
        $jobCount = Job::count(); // Example: Counting jobs from Job model

        return view('jobs.chart', compact('jobCount'));
    }
}
