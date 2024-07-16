<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobApplication;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use App\Models\Job;


class JobApplicationController extends Controller
{

    use AuthorizesRequests;


    public function seeker()
    {
        $jobs = Job::latest()->get();
        return view('jobApplications.seeker', compact('jobs'));
    }



    public function myApplications()
    {
        $jobApplications = auth()->user()->jobApplications()->latest()->get();
        return view('jobApplications.myApplications', compact('jobApplications'));
    }




    // Show the form for creating a new jobApplication.
    public function create()
    {
        return view('jobApplications.create');
    }





    public function show($id)
    {
        $job = Job::findOrFail($id);

        return view('jobApplications.show', compact('job'));
    }


    public function apply($id)
    {
        $job = Job::findOrFail($id);

        return view('jobApplications.apply', compact('job'));
    }







     public function store(Request $request)
    {

        $request->validate([
            'job_id' => 'required|exists:jobs,id',
        ]);




        $jobApplicationsData = $request->only([

             'job_id', 'user_id','name','email','contact','address','linkedInLink'
        ]);

        $jobApplicationsData['user_id'] = auth()->id();

        JobApplication::create($jobApplicationsData);

        return redirect()->route('seeker')->with('success', 'Job Application created successfully.');
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
        return redirect()->route('myApplications')->with('success', 'Job Application deleted successfully.');
    }


}
