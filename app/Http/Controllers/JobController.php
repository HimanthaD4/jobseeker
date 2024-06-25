<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Controllers\JobApplicationController;

class JobController extends Controller
{

    use AuthorizesRequests;

    public function index()
    {

        $jobs = Job::where('user_id', '!=', auth()->id())->with('user')->latest()->get();

        return view('jobs.index', compact('jobs'));
    }


    public function create()
    {
        return view('jobs.create');
    }


    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
    ]);

    $job = auth()->user()->jobs()->create($request->only(['title', 'description']));

    return redirect()->route('dashboard')->with('success', 'Job created successfully.');
}



    public function edit(Job $job)
    {
        $this->authorize('update',job);
        return view('jobs.edit', compact('job'));
    }


    public function update(Request $request, Job $job)
    {


        $this->authorize('update', $job);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $job->update($request->only(['title', 'description']));
        return redirect()->route('jobs.index')->with('success', 'Job updated successfully.');
    }


    public function destroy(Job $job)
    {
        $this->authorize('delete', $job);

        $job->delete();

        return redirect()->route('jobs.index')->with('success', 'Job deleted successfully.');
    }


    public function dashboard(){
        $jobs = auth()->user()->jobs()->latest()->get();
        return view('jobs.dashboard', compact('jobs'));

    }
}
