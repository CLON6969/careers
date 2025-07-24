@extends('layouts.base')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h2 class="text-2xl font-bold mb-4">Edit Certification</h2>

    <form action="{{ route('applicant.certifications.update', $certification) }}" method="POST" class="bg-white shadow p-6 rounded">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-bold mb-1">Certification Name</label>
            <input type="text" name="name" class="form-input w-full" value="{{ old('name', $certification->name) }}" required>
        </div>

        <div class="mb-4">
            <label class="block font-bold mb-1">Issuer</label>
            <input type="text" name="issuer" class="form-input w-full" value="{{ old('issuer', $certification->issuer) }}" required>
        </div>

        <div class="mb-4">
            <label class="block font-bold mb-1">Issued Date</label>
            <input type="date" name="issued_date" class="form-input w-full" value="{{ old('issued_date', $certification->issued_date) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Certification</button>
    </form>
</div>
@endsection
