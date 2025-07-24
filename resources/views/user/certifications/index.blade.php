@extends('layouts.base')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold">My Certifications</h2>
        <a href="{{ route('applicant.certifications.create') }}" class="btn btn-primary">Add Certification</a>
    </div>

    @if($certifications->isEmpty())
        <p class="text-gray-600">No certifications added yet.</p>
    @else
        <div class="grid gap-4">
            @foreach($certifications as $certification)
                <div class="bg-white p-4 shadow rounded">
                    <div class="flex justify-between">
                        <div>
                            <h3 class="font-semibold">{{ $certification->name }}</h3>
                            <p class="text-sm text-gray-600">Issued by {{ $certification->issuer }} on {{ $certification->issued_date }}</p>
                        </div>
                        <div class="space-x-2">
                            <a href="{{ route('applicant.certifications.edit', $certification) }}" class="btn btn-sm btn-secondary">Edit</a>
                            <form action="{{ route('applicant.certifications.destroy', $certification) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this certification?')">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
