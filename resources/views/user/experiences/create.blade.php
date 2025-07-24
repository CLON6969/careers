@extends('layouts.base')

@section('title', 'Add Experience')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Add Experience</h1>

    <form method="POST" action="{{ route('applicant.experiences.store') }}">
        @csrf

        <div class="mb-4">
            <label for="employer" class="block font-semibold mb-1">Employer</label>
            <input type="text" id="employer" name="employer" value="{{ old('employer') }}" class="w-full border p-2" />
            @error('employer') <p class="text-red-600">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label for="job_title" class="block font-semibold mb-1">Job Title</label>
            <input type="text" id="job_title" name="job_title" value="{{ old('job_title') }}" class="w-full border p-2" />
            @error('job_title') <p class="text-red-600">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label for="start_date" class="block font-semibold mb-1">Start Date</label>
            <input type="date" id="start_date" name="start_date" value="{{ old('start_date') }}" class="w-full border p-2" />
            @error('start_date') <p class="text-red-600">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label for="end_date" class="block font-semibold mb-1">End Date</label>
            <input type="date" id="end_date" name="end_date" value="{{ old('end_date') }}" class="w-full border p-2" />
            @error('end_date') <p class="text-red-600">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Save Experience</button>
    </form>
</div>
@endsection
