@extends('layouts.base')

@section('title', 'My Experiences')

@section('content')
<div class="container">
    <div class="buttons">
        <h4>My Experiences</h4>
        <a href="{{ route('user.applicant.experiences.create') }}" class="btn btn-primary">Add Experience</a>
    </div>
    @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
    @if($items->isEmpty())
        <p>No experiences added.</p>
    @else
        <table class="table">
            <thead><tr><th>Employer</th><th>Job Title</th><th>Dates</th><th>Actions</th></tr></thead>
            <tbody>
                @foreach($items as $e)
                <tr>
                    <td>{{ $e->employer }}</td>
                    <td>{{ $e->job_title }}</td>
                    <td>{{ $e->start_date }} – {{ $e->end_date ?? 'Present' }}</td>
                    <td class="action-buttons">
                        <a href="{{ route('user.applicant.experiences.edit', $e) }}" class="btn btn-sm btn-info"><i class="fas fa-edit"></i>Edit</a>
                        <form action="{{ route('user.applicant.experiences.destroy', $e) }}" method="POST" onsubmit="return confirm('Confirm delete?')" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i>Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
