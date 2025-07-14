{{-- resources/views/onboarding/step4.blade.php --}}
@extends('onboarding.layout')

@section('form')
<h2 class="text-xl font-semibold mb-4">Step 4: Certifications</h2>
<form method="POST" action="{{ route('onboarding.postStep4') }}" class="space-y-4">
  @csrf

  <input type="hidden" name="certification_id" value="{{ $certification->id ?? '' }}">

  <label>Name *</label>
  <input type="text" name="name" value="{{ old('name', $certification->name ?? '') }}" class="w-full border rounded px-3 py-2" required />

  <label>Certification Type *</label>
  <input type="text" name="certification_type" value="{{ old('certification_type', $certification->certification_type ?? '') }}" class="w-full border rounded px-3 py-2" required />

  <label>Issuing Organization *</label>
  <input type="text" name="issuing_organization" value="{{ old('issuing_organization', $certification->issuing_organization ?? '') }}" class="w-full border rounded px-3 py-2" required />

  <label>Registered With Authority *</label>
  <select name="registered_with_authority" class="w-full border rounded px-3 py-2" required>
    <option value="1" @selected(old('registered_with_authority', $certification->registered_with_authority ?? '') == 1)>Yes</option>
    <option value="0" @selected(old('registered_with_authority', $certification->registered_with_authority ?? '') == 0)>No</option>
  </select>

  <label>Registration Number</label>
  <input type="text" name="registration_number" value="{{ old('registration_number', $certification->registration_number ?? '') }}" class="w-full border rounded px-3 py-2" />

  <label>Authority Certificate Path</label>
  <input type="text" name="authority_certificate_path" value="{{ old('authority_certificate_path', $certification->authority_certificate_path ?? '') }}" class="w-full border rounded px-3 py-2" />

  <label>Level</label>
  <input type="text" name="level" value="{{ old('level', $certification->level ?? '') }}" class="w-full border rounded px-3 py-2" />

  <label>Status *</label>
  <select name="status" class="w-full border rounded px-3 py-2" required>
    <option value="obtained" @selected(old('status', $certification->status ?? '') == 'obtained')>Obtained</option>
    <option value="in_progress" @selected(old('status', $certification->status ?? '') == 'in_progress')>In Progress</option>
  </select>

  <label>Obtained Date</label>
  <input type="date" name="obtained_date" value="{{ old('obtained_date', $certification->obtained_date ?? '') }}" class="w-full border rounded px-3 py-2" />

  <div class="flex justify-between">
    <a href="{{ route('onboarding.step3') }}" class="text-gray-600 hover:underline">Previous</a>
    <button type="submit" class="bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700">Next & Save</button>
  </div>
</form>
@endsection
