<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobApplication;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;


class JobApplicationController extends Controller
{

    use AuthorizesRequests;


// Display a listing of the jobApplication.
    public function index()
    {
        $jobApplications = JobApplication::latest()->get();
        return view('jobApplications.index', compact('jobApplications'));
    }




    // Show the form for creating a new jobApplication.
    public function create()
    {
        return view('jobApplications.create');
    }







    public function show($id)
    {
        $jobApplications = JobApplication::findOrFail($id);

        return view('jobApplications.show', compact('jobApplications'));
    }






     public function store(Request $request)
    {

        $request->validate([
            'job_id' => 'required|exists:jobs,id',
        ]);


        $jobApplicationsData = [
            'job_id' => $request->input('job_id'),
            'user_id' => auth()->id(),
        ];

        JobApplication::create($jobApplicationsData);

        return redirect()->route('jobApplications.index')->with('success', 'Job Application created successfully.');
    }







    // Show the form for editing the specified job Application.
    public function edit($id)
    {
        $jobApplications = JobApplication::findOrFail($id);

        if ($jobApplications->user_id != Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('jobApplications.edit', compact('jobApplications'));
    }





    // Update the specified job in storage.
    public function update(Request $request, $id)
    {
        $jobApplications = JobApplication::findOrFail($id);

        if ($jobApplications->user_id != Auth::id()) {
            abort(403, 'Unauthorized action.');
        }



        $request->validate([
            'job_id' => 'required|exists:jobs,id',
        ]);

        $jobApplications->update($request->all());

        return redirect()->route('dashboard')->with('success', 'Job Applications updated successfully.');
    }






    // Remove the specified job Appliation from storage.
    public function destroy($id)
    {
        $jobApplications = JobApplication::findOrFail($id);

        if ($jobApplications->user_id != Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $jobApplications->delete();
        return redirect()->route('jobs.index')->with('success', 'Job Application deleted successfully.');
    }




    // Display a user's dashboard with their job Application.
    public function all()
    {
        $jobApplications = auth()->user()->jobApplications()->latest()->get();
        return view('jobApplications.all', compact('jobApplications'));
    }


    // public function dashboard()
    // {
    //     $jobApplications = auth()->user()->jobApplications()->latest()->get();
    //     return view('jobApplications.dashboard', compact('jobApplications'));
    // }


}
