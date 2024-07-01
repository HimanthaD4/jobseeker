<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobApplication;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class JobApplicationController extends Controller
{

    use AuthorizesRequests;


    public function index()
    {
        $applications = JobApplication::all(); // Fetch applications logic, adjust as per your application
        return view('applications.index', compact('applications'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'job_id' => 'required|exists:jobs,id',
        ]);

        auth()->user()->jobApplications()->create([
            'job_id' => $request->job_id,
        ]);

        return redirect()->back()->with('success', 'Job application submitted successfully.');
    }

    public function destroy(JobApplication $jobApplication)
    {
        $this->authorize('delete', $jobApplication);

        $jobApplication->delete();

        return redirect()->back()->with('success', 'Job application deleted successfully.');
    }
}
