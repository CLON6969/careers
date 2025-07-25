@extends('layouts.base')

@section('title', 'Create Profile')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Create Profile</h1>

    <form method="POST" action="{{ route('applicant.profile.store') }}">
        @csrf

        <div class="mb-4">
            <label for="professional_summary" class="block font-semibold mb-1">Professional Summary</label>
            <textarea id="professional_summary" name="professional_summary" rows="4" class="w-full border p-2">{{ old('professional_summary') }}</textarea>
            @error('professional_summary') <p class="text-red-600">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label for="years_of_experience" class="block font-semibold mb-1">Years of Experience</label>
            <input type="number" id="years_of_experience" name="years_of_experience" value="{{ old('years_of_experience') }}" class="w-full border p-2" />
            @error('years_of_experience') <p class="text-red-600">{{ $message }}</p> @enderror
        </div>

        {{-- Add other fields as needed --}}

        <button type="submit" class="btn btn-primary">Save Profile</button>
    </form>
</div>
@endsection
