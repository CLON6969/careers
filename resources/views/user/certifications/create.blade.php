@extends('layouts.base')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h2 class="text-2xl font-bold mb-4">Add Certification</h2>

    <form action="{{ route('applicant.certifications.store') }}" method="POST" class="bg-white shadow p-6 rounded">
        @csrf

        <div class="mb-4">
            <label class="block font-bold mb-1">Certification Name</label>
            <input type="text" name="name" class="form-input w-full" value="{{ old('name') }}" required>
        </div>

        <div class="mb-4">
            <label class="block font-bold mb-1">Issuer</label>
            <input type="text" name="issuer" class="form-input w-full" value="{{ old('issuer') }}" required>
        </div>

        <div class="mb-4">
            <label class="block font-bold mb-1">Issued Date</label>
            <input type="date" name="issued_date" class="form-input w-full" value="{{ old('issued_date') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Save Certification</button>
    </form>
</div>
@endsection
