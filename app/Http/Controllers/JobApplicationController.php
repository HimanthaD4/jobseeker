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

    public function candidates()
    {
        $jobs = auth()->user()->jobs()->latest()->get();
        return view('jobApplications.candidates', compact('jobs'));
    }

    public function jobCandidates($id){




        $job = Job::findOrFail($id);


        return view('jobs.show', compact('job', 'qualifications', 'skills'));

    }




    public function newshow()
    {
        $jobs = Job::latest()->get();
        return view('jobApplications.newshow', compact('jobs'));
    }



    public function seeker()
    {
        $jobs = Job::latest()->get();
        return view('jobApplications.seeker', compact('jobs'));
    }



    public function myApplications()
    {
        $jobApplications = auth()->user()->jobApplications()->with('job')->latest()->get();
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
    $qualifications = explode(',', $job->qualifications);
    $skills = explode(',', $job->skills);

    return view('jobApplications.show', compact('job', 'qualifications', 'skills'));
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



