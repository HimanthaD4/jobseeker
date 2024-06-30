<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    // Display a listing of the jobs.
    public function index()
    {
        $jobs = Job::latest()->get();
        return view('jobs.index', compact('jobs'));
    }

    // Show the form for creating a new job.
    public function create()
    {
        return view('jobs.create');
    }

    public function show($id)
    {
        $job = Job::findOrFail($id);

        return view('jobs.show', compact('job'));
    }

    // Store a newly created job in storage.
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string',
            'remote'=> 'required|string',
            'position'=> 'required|string',
            'company_name'=> 'required|string',
            'qualifications'=> 'required|string',
            'skills'=> 'required|string',
            'salary'=> 'required|string',
        ]);

        $jobData = $request->only([
            'title', 'description', 'location', 'remote', 'position', 'company_name',
            'qualifications', 'skills', 'salary'
        ]);

        $jobData['user_id'] = auth()->id(); // Set the user_id

        Job::create($jobData);
        return redirect()->route('jobs.index')->with('success', 'Job created successfully.');
    }

    // Show the form for editing the specified job.
    public function edit($id)
    {
        $job = Job::findOrFail($id);

        if ($job->user_id != Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('jobs.edit', compact('job'));
    }

    // Update the specified job in storage.
    public function update(Request $request, $id)
    {
        $job = Job::findOrFail($id);

        if ($job->user_id != Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'nullable|string|max:255',
            'remote' => 'required|string|in:On-site,Remote,Hybrid',
            'position' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'qualifications' => 'required|string',
            'skills' => 'nullable|string',
            'salary' => 'nullable|numeric',
        ]);

        $job->update($request->all());

        return redirect()->route('dashboard')->with('success', 'Job updated successfully.');
    }

    // Remove the specified job from storage.
    public function destroy($id)
    {
        $job = Job::findOrFail($id);

        if ($job->user_id != Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $job->delete();
        return redirect()->route('jobs.index')->with('success', 'Job deleted successfully.');
    }

    // Display a user's dashboard with their jobs.
    public function dashboard()
    {
        $jobs = auth()->user()->jobs()->latest()->get();
        return view('jobs.dashboard', compact('jobs'));
    }
}
