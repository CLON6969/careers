@extends('layouts.base')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h2 class="text-2xl font-bold mb-4">Add Education</h2>

    <form action="{{ route('applicant.educations.store') }}" method="POST" class="bg-white shadow rounded p-6">
        @csrf

        <div class="mb-4">
            <label class="block font-bold mb-1">Institution</label>
            <input type="text" name="institution" class="form-input w-full" required>
        </div>

        <div class="mb-4">
            <label class="block font-bold mb-1">Degree</label>
            <input type="text" name="degree" class="form-input w-full" required>
        </div>

        <div class="mb-4">
            <label class="block font-bold mb-1">Start Year</label>
            <input type="number" name="start_year" class="form-input w-full" required>
        </div>

        <div class="mb-4">
            <label class="block font-bold mb-1">End Year</label>
            <input type="number" name="end_year" class="form-input w-full">
        </div>

        <button type="submit" class="btn btn-primary">Save Education</button>
    </form>
</div>
@endsection
