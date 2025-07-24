@extends('layouts.base')

@section('title', 'My Profile')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">My Profile</h1>

    <a href="{{ route('applicant.profile.create') }}" class="btn btn-primary mb-4">Create Profile</a>

    @if($profiles->isEmpty())
        <p>No profiles found.</p>
    @else
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr>
                    <th class="border p-2">Summary</th>
                    <th class="border p-2">Years Experience</th>
                    <th class="border p-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($profiles as $profile)
                <tr>
                    <td class="border p-2">{{ Str::limit($profile->professional_summary, 50) }}</td>
                    <td class="border p-2">{{ $profile->years_of_experience }}</td>
                    <td class="border p-2">
                        <a href="{{ route('applicant.profile.show', $profile) }}" class="text-blue-600 hover:underline">View</a> |
                        <a href="{{ route('applicant.profile.edit', $profile) }}" class="text-green-600 hover:underline">Edit</a> |
                        <form method="POST" action="{{ route('applicant.profile.destroy', $profile) }}" class="inline" onsubmit="return confirm('Delete this profile?');">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
