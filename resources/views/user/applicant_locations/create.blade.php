@extends('layouts.base')

@section('title', 'Add Location')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Add Location</h1>

    <form method="POST" action="{{ route('applicant.locations.store') }}">
        @csrf

        <div class="mb-4">
            <label for="location_id" class="block font-semibold mb-1">Location</label>
            <select name="location_id" id="location_id" class="w-full border p-2">
                <option value="">Select a location</option>
                @foreach($allLocations as $location)
                    <option value="{{ $location->id }}" {{ old('location_id') == $location->id ? 'selected' : '' }}>
                        {{ $location->name }}
                    </option>
                @endforeach
            </select>
            @error('location_id') <p class="text-red-600">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Save Location</button>
    </form>
</div>
@endsection
