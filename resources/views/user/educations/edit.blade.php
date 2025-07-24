@extends('layouts.base')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h2 class="text-2xl font-bold mb-4">Edit Education</h2>

    <form action="{{ route('applicant.educations.update', $education) }}" method="POST" class="bg-white shadow rounded p-6">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-bold mb-1">Institution</label>
            <input type="text" name="institution" value="{{ old('institution', $education->institution) }}" class="form-input w-full" required>
        </div>

        <div class="mb-4">
            <label class="block font-bold mb-1">Degree</label>
            <input type="text" name="degree" value="{{ old('degree', $education->degree) }}" class="form-input w-full" required>
        </div>

        <div class="mb-4">
            <label class="block font-bold mb-1">Start Year</label>
            <input type="number" name="start_year" value="{{ old('start_year', $education->start_year) }}" class="form-input w-full" required>
        </div>

        <div class="mb-4">
            <label class="block font-bold mb-1">End Year</label>
            <input type="number" name="end_year" value="{{ old('end_year', $education->end_year) }}" class="form-input w-full">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
