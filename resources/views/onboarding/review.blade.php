{{-- resources/views/onboarding/review.blade.php --}}
@extends('onboarding.layout')

@section('form')
<h2 class="text-xl font-semibold mb-4">Step 6: Review Your Information</h2>

<div class="space-y-4 text-gray-700">

  <div>
    <h3 class="font-semibold">Personal Information</h3>
    <p><strong>National ID:</strong> {{ $profile->national_id }}</p>
    <p><strong>Date of Birth:</strong> {{ $profile->date_of_birth }}</p>
    <p><strong>Gender:</strong> {{ ucfirst($profile->gender) }}</p>
    <p><strong>Nationality:</strong> {{ $profile->nationality }}</p>
    <p><strong>Address:</strong> {{ $profile->address }}</p>
    <p><strong>Postal Code:</strong> {{ $profile->postal_code }}</p>
    <p><strong>LinkedIn URL:</strong> <a href="{{ $profile->linkedin_url }}" target="_blank">{{ $profile->linkedin_url }}</a></p>
    <p><strong>Professional Summary:</strong> {{ $profile->professional_summary }}</p>
    <p><strong>Years of Experience:</strong> {{ $profile->years_of_experience }}</p>
  </div>

  <div>
    <h3 class="font-semibold">Experience</h3>
    <p><strong>Employer:</strong> {{ $experience->employer ?? '-' }}</p>
    <p><strong>Job Title:</strong> {{ $experience->job_title ?? '-' }}</p>
    <p><strong>Start Date:</strong> {{ $experience->start_date ?? '-' }}</p>
    <p><strong>End Date:</strong> {{ $experience->end_date ?? '-' }}</p>
  </div>

  <div>
    <h3 class="font-semibold">Education</h3>
    <p><strong>Level:</strong> {{ $education->level ?? '-' }}</p>
    <p><strong>Field of Study:</strong> {{ $education->field_of_study ?? '-' }}</p>
  </div>

  <div>
    <h3 class="font-semibold">Certification</h3>
    <p><strong>Name:</strong> {{ $certification->name ?? '-' }}</p>
    <p><strong>Type:</strong> {{ $certification->certification_type ?? '-' }}</p>
    <p><strong>Issuing Organization:</strong> {{ $certification->issuing_organization ?? '-' }}</p>
    <p><strong>Status:</strong> {{ $certification->status ?? '-' }}</p>
    <p><strong>Obtained Date:</strong> {{ $certification->obtained_date ?? '-' }}</p>
  </div>

  <div>
    <h3 class="font-semibold">Voluntary Disclosures</h3>
    <p><strong>Disability Status:</strong> {{ $disclosure->disability_status ?? '-' }}</p>
    <p><strong>Ethnicity:</strong> {{ $disclosure->ethnicity ?? '-' }}</p>
    <p><strong>Gender Identity:</strong> {{ $disclosure->gender_identity ?? '-' }}</p>
    <p><strong>Veteran Status:</strong> {{ $disclosure->is_veteran ? 'Yes' : 'No' }}</p>
  </div>
</div>

<form method="POST" action="{{ route('onboarding.submit') }}" class="mt-6">
  @csrf
  <div class="flex justify-between">
    <a href="{{ route('onboarding.step5') }}" class="text-gray-600 hover:underline">Previous</a>
    <button type="submit" class="bg-green-600 text-white px-5 py-2 rounded hover:bg-green-700">Submit</button>
  </div>
</form>
@endsection
