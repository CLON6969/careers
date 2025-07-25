@extends('layouts.base')

@section('content')




    {{-- Summary Cards --}}
    <div class="row mb-6">
        <div class="col-md-4">
            <div class="bg-white rounded-2xl shadow p-6 text-center">
                <h3 class="text-lg font-bold">Certifications</h3>
                <p class="text-3xl text-blue-600 font-semibold">{{ $totalCertifications }}</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="bg-white rounded-2xl shadow p-6 text-center">
                <h3 class="text-lg font-bold">Educations</h3>
                <p class="text-3xl text-green-600 font-semibold">{{ $totalEducations }}</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="bg-white rounded-2xl shadow p-6 text-center">
                <h3 class="text-lg font-bold">Experiences</h3>
                <p class="text-3xl text-purple-600 font-semibold">{{ $totalExperiences }}</p>
            </div>
        </div>
    </div>

    {{-- Profile & Location --}}
    <div class="row mb-6">
        <div class="col-md-6">
            <div class="bg-white rounded-2xl shadow p-6">
                <h3 class="text-xl font-semibold mb-4">Profile Summary</h3>
                @if ($profile)
                    <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
                    <p><strong>Nationality:</strong> {{ $profile->nationality }}</p>
                    <p><strong>Experience:</strong> {{ $profile->years_of_experience }} yrs</p>
                    <p><strong>Gender:</strong> {{ $profile->gender }}</p>
                    <p><strong>Recruitment Status:</strong> 
                        <span class="badge {{ $profile->recruitment_status === 'available' ? 'bg-success' : 'bg-secondary' }}">
                            {{ ucfirst($profile->recruitment_status) }}
                        </span>
                    </p>
                @else
                    <p class="text-gray-500">Profile not completed.</p>
                @endif
            </div>
        </div>

        <div class="col-md-6">
            <div class="bg-white rounded-2xl shadow p-6">
                <h3 class="text-xl font-semibold mb-4">Location</h3>
                @if ($location && $location->location)
                    <p><strong>Province:</strong> {{ $location->location->province }}</p>
                    <p><strong>City:</strong> {{ $location->location->city }}</p>
                @else
                    <p class="text-gray-500">Location not provided.</p>
                @endif
            </div>
        </div>
    </div>

    {{-- Voluntary Disclosure --}}
    <div class="bg-white rounded-2xl shadow p-6 mb-6">
        <h3 class="text-xl font-semibold mb-4">Voluntary Disclosure</h3>
        @if ($disclosure)
            <p><strong>Disability:</strong> {{ $disclosure->disability_status }}</p>
            <p><strong>Gender Identity:</strong> {{ $disclosure->gender_identity }}</p>
            <p><strong>Ethnicity:</strong> {{ $disclosure->ethnicity }}</p>
            <p><strong>Veteran:</strong> {{ $disclosure->is_veteran ? 'Yes' : 'No' }}</p>
        @else
            <p class="text-gray-500">No disclosures submitted.</p>
        @endif
    </div>


@endsection
