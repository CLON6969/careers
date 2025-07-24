@extends('layouts.base')

@section('title', 'My Education')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">My Education</h1>

    <a href="{{ route('applicant.educations.create') }}" class="btn btn-primary mb-4">Add Education</a>

    @if($educations->isEmpty())
        <p>No education records found.</p>
    @else
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr>
                    <th class="border p-2">Level</th>
                    <th class="border p-2">Field of Study</th>
                    <th class="border p-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($educations as $education)
                <tr>
                    <td class="border p-2">{{ $education->level }}</td>
                    <td class="border p-2">{{ $education->field_of_study }}</td>
                    <td class="border p-2">
                        <a href="{{ route('applicant.educations.edit', $education) }}" class="text-green-600 hover:underline">Edit</a> |
                        <form method="POST" action="{{ route('applicant.educations.destroy', $education) }}" class="inline" onsubmit="return confirm('Delete this education?');">
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
