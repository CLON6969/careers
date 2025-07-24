<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ApplicantProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class ApplicantProfileController extends Controller
{

       use AuthorizesRequests; 
    public function index()
    {
        $profile = ApplicantProfile::where('user_id', Auth::id())->first();
        return view('user.applicant_profile.index', compact('profile'));
    }

    public function edit()
    {
        $profile = ApplicantProfile::where('user_id', Auth::id())->firstOrFail();
        return view('user.applicant_profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $profile = ApplicantProfile::where('user_id', Auth::id())->firstOrFail();

        $validated = $request->validate([
            'recruitment_status' => 'nullable|string|max:255',
            'national_id' => 'nullable|string|max:100',
            'date_of_birth' => 'nullable|date',
            'gender' => 'nullable|string|max:10',
            'nationality' => 'nullable|string|max:100',
            'address' => 'nullable|string|max:255',
            'postal_code' => 'nullable|string|max:20',
            'linkedin_url' => 'nullable|url|max:255',
            'professional_summary' => 'nullable|string|max:1000',
            'years_of_experience' => 'nullable|integer|min:0',
        ]);

        $profile->update($validated);

        return Redirect::route('user.applicant_profile.index')->with('status', 'Profile updated successfully.');
    }
}
