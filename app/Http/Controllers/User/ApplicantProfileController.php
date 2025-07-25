<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ApplicantProfile;
use Illuminate\Support\Facades\Auth;

class ApplicantProfileController extends Controller
{
    public function edit()
    {
        $profile = ApplicantProfile::firstOrNew(['user_id'=>Auth::id()]);
        return view('user.applicant.profile.edit', compact('profile'));
    }

    public function update(Request $r)
    {
        $data = $r->validate([
            'recruitment_status'=>'required|string',
            'date_of_birth'=>'required|date',
            'national_id'=>'nullable|string',
            'gender'=>'required|string',
            'nationality'=>'nullable|string',
            'address'=>'nullable|string',
            'years_of_experience'=>'nullable|numeric',
            'professional_summary'=>'nullable|string',
            'linkedin_url'=>'nullable|url',
        ]);
        $data['user_id'] = Auth::id();
        ApplicantProfile::updateOrCreate(['user_id'=>Auth::id()], $data);
        return back()->with('success','Profile saved.');
    }
}
