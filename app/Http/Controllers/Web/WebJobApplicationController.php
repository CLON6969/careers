<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\JobPost;
use App\Models\JobApplication;
use App\Models\ApplicantProfile;
use App\Models\Education;
use App\Models\Experience;
use App\Models\ApplicantCertification;
use App\Models\VoluntaryDisclosure;
use Illuminate\Http\Request;

class WebJobApplicationController extends Controller
{
    // View all jobs and how many applied
    public function index()
    {
        $jobs = JobPost::withCount('applications')->latest()->get();
        return view('admin.web.applications.index', compact('jobs'));
    }

    // List applicants for a specific job
    public function applicants(JobPost $job)
    {
        $applications = JobApplication::with(['user', 'user.profile'])
            ->where('job_post_id', $job->id)
            ->get();

        return view('admin.web.applications.applicants', compact('job', 'applications'));
    }

    // View individual applicant
 public function show($id)
    {
        $application = JobApplication::with('jobPost')->findOrFail($id);
        $user = $application->user;

        $profile = ApplicantProfile::where('user_id', $user->id)->first();
        $certifications = ApplicantCertification::where('user_id', $user->id)->get();
        $experiences = Experience::where('user_id', $user->id)->get();
        $educations = Education::where('user_id', $user->id)->get();
        $disclosure = VoluntaryDisclosure::where('user_id', $user->id)->first();

        return view('admin.web.applications.show', compact(
            'application',
            'user',
            'profile',
            'certifications',
            'experiences',
            'educations',
            'disclosure'
        ));
    }


    // Update applicant status
    public function updateStatus(Request $request, JobApplication $application)
    {
        $request->validate([
            'status' => 'required|string',
        ]);

        $application->update(['status' => $request->status]);

        return back()->with('success', 'Application status updated successfully.');
    }
}
