<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ApplicantCertification;
use App\Models\ApplicantLocation;
use App\Models\ApplicantProfile;
use App\Models\Education;
use App\Models\Experience;
use App\Models\VoluntaryDisclosure;
use Illuminate\Support\Facades\Auth;

class CareerDashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $totalCertifications = ApplicantCertification::where('user_id', $userId)->count();
        $totalEducations = Education::where('user_id', $userId)->count();
        $totalExperiences = Experience::where('user_id', $userId)->count();

        $profile = ApplicantProfile::where('user_id', $userId)->first();
        $location = ApplicantLocation::with('location')->where('user_id', $userId)->first();
        $disclosure = VoluntaryDisclosure::where('user_id', $userId)->first();

        return view('user.applicant.dashboard.overview', compact(
            'totalCertifications',
            'totalEducations',
            'totalExperiences',
            'profile',
            'location',
            'disclosure'
        ));
    }
}
