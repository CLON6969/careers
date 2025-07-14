<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
use App\Models\Job_page;
use Illuminate\Http\Request;
use App\Models\Logo;

class JobController extends Controller
{
    // Single index method to handle search/filter + pagination
    public function index(Request $request)
    {
        $query = JobPost::query()->where('status', 'open');

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('category')) {
            $query->where('department', $request->category);
        }

        if ($request->filled('location')) {
            $query->where('location', $request->location);
        }

        if ($request->filled('employment_type')) {
            $query->where('employment_type', $request->employment_type);
        }

        $jobs = $query->latest()->paginate(12)->withQueryString();

         $job_page = job_page::first();
          $logo = Logo::first();

        return view('jobs.index', compact('jobs', 'job_page', 'logo'));
    }

    // Show details of a job post
    public function show($slug)
    {
        $job = JobPost::with(['skills', 'experiences', 'qualifications'])
            ->where('slug', $slug)
            ->firstOrFail();
            
        $logo = Logo::first();


        return view('jobs.show', compact('job', 'logo'));
    }
}
