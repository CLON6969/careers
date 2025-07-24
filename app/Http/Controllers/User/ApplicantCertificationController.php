<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ApplicantCertification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class ApplicantCertificationController extends Controller
{

       use AuthorizesRequests; 
    public function index()
    {
        $certifications = ApplicantCertification::where('user_id', Auth::id())->get();
        return view('user.certifications.index', compact('certifications'));
    }

    public function create()
    {
        return view('user.certifications.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'issuing_organization' => 'nullable|string|max:255',
            'issue_date' => 'nullable|date',
            'expiration_date' => 'nullable|date|after_or_equal:issue_date',
            'credential_id' => 'nullable|string|max:100',
            'credential_url' => 'nullable|url|max:255',
        ]);

        $validated['user_id'] = Auth::id();

        ApplicantCertification::create($validated);

        return Redirect::route('user.certifications.index')->with('status', 'Certification added.');
    }

    public function edit(ApplicantCertification $certification)
    {
        $this->authorize('update', $certification);
        return view('user.certifications.edit', compact('certification'));
    }

    public function update(Request $request, ApplicantCertification $certification)
    {
        $this->authorize('update', $certification);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'issuing_organization' => 'nullable|string|max:255',
            'issue_date' => 'nullable|date',
            'expiration_date' => 'nullable|date|after_or_equal:issue_date',
            'credential_id' => 'nullable|string|max:100',
            'credential_url' => 'nullable|url|max:255',
        ]);

        $certification->update($validated);

        return Redirect::route('user.certifications.index')->with('status', 'Certification updated.');
    }

    public function destroy(ApplicantCertification $certification)
    {
        $this->authorize('delete', $certification);

        $certification->delete();

        return Redirect::route('user.certifications.index')->with('status', 'Certification deleted.');
    }
}
