@extends('layouts.admin')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Application Review for {{ $user->name }}</h2>

    {{-- Update Status Form --}}
    <form method="POST" action="{{ route('admin.web.applications.update', $application->id) }}" class="mb-5">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-header bg-gradient text-white d-flex justify-content-between align-items-center" style="background-color: #4e73df;">
                <span>Application Status</span>
                <button type="submit" class="btn btn-light btn-sm">Update</button>
            </div>
            <div class="card-body">
                <select name="status" id="status" class="form-select" required>
                    <option value="submitted" {{ $application->status == 'submitted' ? 'selected' : '' }}>Submitted</option>
                    <option value="shortlisted" {{ $application->status == 'shortlisted' ? 'selected' : '' }}>Shortlisted</option>
                    <option value="interview" {{ $application->status == 'interview' ? 'selected' : '' }}>Interview</option>
                    <option value="accepted" {{ $application->status == 'accepted' ? 'selected' : '' }}>Accepted</option>
                    <option value="rejected" {{ $application->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                </select>
            </div>
        </div>
    </form>

    {{-- Personal Info --}}
    <x-applicant.card title="Personal Information">
        <p><strong>Name:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>Phone:</strong> {{ $user->phone ?? 'N/A' }}</p>
        <p><strong>National ID:</strong> {{ $profile->national_id }}</p>
        <p><strong>Date of Birth:</strong> {{ $profile->date_of_birth }}</p>
        <p><strong>Gender:</strong> {{ ucfirst($profile->gender) }}</p>
        <p><strong>Nationality:</strong> {{ $profile->nationality }}</p>
        <p><strong>Address:</strong> {{ $profile->address }}</p>
        <p><strong>Postal Code:</strong> {{ $profile->postal_code }}</p>
        <p><strong>LinkedIn:</strong> <a href="{{ $profile->linkedin_url }}" target="_blank">{{ $profile->linkedin_url }}</a></p>
        <p><strong>Summary:</strong> {{ $profile->professional_summary }}</p>
        <p><strong>Experience:</strong> {{ $profile->years_of_experience }} years</p>
    </x-applicant.card>

    {{-- Certifications --}}
    <x-applicant.card title="Certifications">
        @forelse($certifications as $index => $cert)
            <div class="mb-3 border-bottom pb-2">
                <strong>{{ $cert->name }}</strong> ({{ $cert->certification_type }})<br>
                Issued by: {{ $cert->issuing_organization }} | Level: {{ $cert->level }}<br>
                Status: {{ $cert->status }} | Obtained: {{ $cert->obtained_date }}<br>
                @if ($cert->authority_certificate_path)
                    <button class="btn btn-outline-primary btn-sm mt-2" data-bs-toggle="modal" data-bs-target="#certModal{{ $index }}">View Certificate</button>

                    <!-- Modal -->
                    <div class="modal fade" id="certModal{{ $index }}" tabindex="-1" aria-labelledby="certModalLabel{{ $index }}" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Certificate: {{ $cert->name }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body text-center">
                                    <iframe src="{{ asset('public/storage/' . $cert->authority_certificate_path) }}" width="100%" height="600px" frameborder="0"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        @empty
            <p>No certifications provided.</p>
        @endforelse
    </x-applicant.card>

    {{-- Education --}}
    <x-applicant.card title="Education">
        @forelse($educations as $edu)
            <p>{{ $edu->level }} in {{ $edu->field_of_study }} from {{ $edu->institution_name }}</p>
        @empty
            <p>No education provided.</p>
        @endforelse
    </x-applicant.card>

    {{-- Work Experience --}}
    <x-applicant.card title="Work Experience">
        @forelse($experiences as $exp)
            <div class="mb-3">
                <strong>{{ $exp->job_title }}</strong> at {{ $exp->employer }}<br>
                {{ $exp->start_date }} - {{ $exp->end_date ?? 'Present' }}
            </div>
        @empty
            <p>No work experience provided.</p>
        @endforelse
    </x-applicant.card>

    {{-- Voluntary Disclosures --}}
    <x-applicant.card title="Voluntary Disclosures">
        @if($disclosure)
            <p><strong>Disability:</strong> {{ $disclosure->disability_status }}</p>
            <p><strong>Ethnicity:</strong> {{ $disclosure->ethnicity }}</p>
            <p><strong>Gender Identity:</strong> {{ $disclosure->gender_identity }}</p>
            <p><strong>Veteran:</strong> {{ $disclosure->is_veteran ? 'Yes' : 'No' }}</p>
        @else
            <p>No disclosure info provided.</p>
        @endif
    </x-applicant.card>

    {{-- CV and Cover Letter --}}
    <x-applicant.card title="Application Materials">
        <p><strong>Cover Letter:</strong></p>
        <p>{{ $application->cover_letter }}</p>
        @if ($application->cv)
            <button class="btn btn-outline-primary mt-2" data-bs-toggle="modal" data-bs-target="#cvModal">View CV</button>

            <!-- CV Modal -->
            <div class="modal fade" id="cvModal" tabindex="-1" aria-labelledby="cvModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Curriculum Vitae (CV)</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body text-center">
                            <iframe src="{{ asset('public/storage/' . $application->cv) }}" width="100%" height="600px" frameborder="0"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </x-applicant.card>
</div>
@endsection
