@extends('layouts.base')

@section('title', 'My Locations')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">My Locations</h1>

    <a href="{{ route('applicant.locations.create') }}" class="btn btn-primary mb-4">Add Location</a>

    @if($locations->isEmpty())
        <p>No locations found.</p>
    @else
        <ul>
            @foreach($locations as $location)
                <li>
                    {{ $location->location->name ?? 'Unknown Location' }}
                    <a href="{{ route('applicant.locations.edit', $location) }}" class="text-green-600 hover:underline ml-2">Edit</a>
                    <form method="POST" action="{{ route('applicant.locations.destroy', $location) }}" class="inline" onsubmit="return confirm('Delete this location?');">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-600 hover:underline ml-2">Delete</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
