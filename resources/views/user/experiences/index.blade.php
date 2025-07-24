@extends('layouts.base')

@section('title', 'My Experiences')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">My Experiences</h1>

    <a href="{{ route('applicant.experiences.create') }}" class="btn btn-primary mb-4">Add Experience</a>

    @if($experiences->isEmpty())
        <p>No experiences found.</p>
    @else
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr>
                    <th class="border p-2">Employer</th>
                    <th class="border p-2">Job Title</th>
                    <th class="border p-2">Start Date</th>
                    <th class="border p-2">End Date</th>
                    <th class="border p-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($experiences as $experience)
                <tr>
                    <td class="border p-2">{{ $experience->employer }}</td>
                    <td class="border p-2">{{ $experience->job_title }}</td>
                    <td class="border p-2">{{ $experience->start_date }}</td>
                    <td class="border p-2">{{ $experience->end_date ?? 'Present' }}</td>
                    <td class="border p-2">
                        <a href="{{ route('applicant.experiences.edit', $experience) }}" class="text-green-600 hover:underline">Edit</a> |
                        <form method="POST" action="{{ route('applicant.experiences.destroy', $experience) }}" class="inline" onsubmit="return confirm('Delete this experience?');">
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
