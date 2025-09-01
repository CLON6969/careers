<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ApplicantCertification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ApplicantCertificationController extends Controller
{
    public function index()
    {
        $items = ApplicantCertification::where('user_id', Auth::id())->get();
        return view('user.applicant.certifications.index', compact('items'));
    }

    public function create()
    {
        return view('user.applicant.certifications.create');
    }

    public function store(Request $r)
    {
        $r->validate([
            'name' => 'required|string|max:255',
            'certification_type' => 'required|string|max:255',
            'issuing_organization' => 'required|string|max:255',
            'obtained_date' => 'required|date',
            'authority_certificate_path' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $data = $r->only([
            'name', 'certification_type', 'issuing_organization', 'registration_number', 'obtained_date'
        ]);
        $data['user_id'] = Auth::id();

        if ($r->hasFile('authority_certificate_path')) {
            $data['authority_certificate_path'] = $r->file('authority_certificate_path')
                ->store('certificates', 'public');
        }

        ApplicantCertification::create($data);

        return redirect()->route('user.applicant.certifications.index')
            ->with('success', 'Certification added.');
    }

    public function edit($id)
    {
        $cert = ApplicantCertification::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        return view('user.applicant.certifications.edit', compact('cert'));
    }

    public function update(Request $r, $id)
    {
        $cert = ApplicantCertification::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $r->validate([
            'name' => 'required|string|max:255',
            'certification_type' => 'required|string|max:255',
            'issuing_organization' => 'required|string|max:255',
            'obtained_date' => 'required|date',
            'authority_certificate_path' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $data = $r->only([
            'name', 'certification_type', 'issuing_organization', 'registration_number', 'obtained_date'
        ]);

        if ($r->hasFile('authority_certificate_path')) {
            // delete old file if exists
            if ($cert->authority_certificate_path && Storage::disk('public')->exists($cert->authority_certificate_path)) {
                Storage::disk('public')->delete($cert->authority_certificate_path);
            }

            $data['authority_certificate_path'] = $r->file('authority_certificate_path')
                ->store('certificates', 'public');
        }

        $cert->update($data);

        return redirect()->route('user.applicant.certifications.index')
            ->with('success', 'Certification updated.');
    }

    public function destroy($id)
    {
        $cert = ApplicantCertification::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        if ($cert->authority_certificate_path && Storage::disk('public')->exists($cert->authority_certificate_path)) {
            Storage::disk('public')->delete($cert->authority_certificate_path);
        }

        $cert->delete();

        return back()->with('success', 'Certification deleted.');
    }
}
