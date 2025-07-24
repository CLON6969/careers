@extends('layouts.base')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h2 class="text-2xl font-bold mb-4">Voluntary Disclosures</h2>

    <form action="{{ route('applicant.voluntary_disclosures.update', $voluntaryDisclosure) }}" method="POST" class="bg-white shadow rounded p-6">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-bold mb-1">Disability Status</label>
            <select name="disability_status" class="form-select w-full">
                <option value="">-- Select --</option>
                <option value="none" {{ old('disability_status', $voluntaryDisclosure->disability_status) == 'none' ? 'selected' : '' }}>None</option>
                <option value="physical" {{ old('disability_status', $voluntaryDisclosure->disability_status) == 'physical' ? 'selected' : '' }}>Physical</option>
                <option value="mental" {{ old('disability_status', $voluntaryDisclosure->disability_status) == 'mental' ? 'selected' : '' }}>Mental</option>
                <option value="other" {{ old('disability_status', $voluntaryDisclosure->disability_status) == 'other' ? 'selected' : '' }}>Other</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block font-bold mb-1">Ethnicity</label>
            <input type="text" name="ethnicity" value="{{ old('ethnicity', $voluntaryDisclosure->ethnicity) }}" class="form-input w-full">
        </div>

        <div class="mb-4">
            <label class="block font-bold mb-1">Gender Identity</label>
            <input type="text" name="gender_identity" value="{{ old('gender_identity', $voluntaryDisclosure->gender_identity) }}" class="form-input w-full">
        </div>

        <div class="mb-4">
            <label class="block font-bold mb-1">Veteran Status</label>
            <select name="is_veteran" class="form-select w-full">
                <option value="">-- Select --</option>
                <option value="0" {{ old('is_veteran', $voluntaryDisclosure->is_veteran) == 0 ? 'selected' : '' }}>No</option>
                <option value="1" {{ old('is_veteran', $voluntaryDisclosure->is_veteran) == 1 ? 'selected' : '' }}>Yes</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Disclosure</button>
    </form>
</div>
@endsection
