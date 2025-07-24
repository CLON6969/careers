<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ApplicantLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class ApplicantLocationController extends Controller
{

       use AuthorizesRequests; 
    public function index()
    {
        $locations = ApplicantLocation::where('user_id', Auth::id())->get();
        return view('user.applicant_locations.index', compact('locations'));
    }

    public function create()
    {
        return view('user.applicant_locations.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'location_id' => 'required|integer|exists:locations,id',
        ]);

        $validated['user_id'] = Auth::id();

        ApplicantLocation::create($validated);

        return Redirect::route('user.applicant_locations.index')->with('status', 'Location added.');
    }

    public function edit(ApplicantLocation $applicantLocation)
    {
        $this->authorize('update', $applicantLocation); // optional: add policy for safety
        return view('user.applicant_locations.edit', compact('applicantLocation'));
    }

    public function update(Request $request, ApplicantLocation $applicantLocation)
    {
        $this->authorize('update', $applicantLocation);

        $validated = $request->validate([
            'location_id' => 'required|integer|exists:locations,id',
        ]);

        $applicantLocation->update($validated);

        return Redirect::route('user.applicant_locations.index')->with('status', 'Location updated.');
    }

    public function destroy(ApplicantLocation $applicantLocation)
    {
        $this->authorize('delete', $applicantLocation);

        $applicantLocation->delete();

        return Redirect::route('user.applicant_locations.index')->with('status', 'Location deleted.');
    }
}
