@extends('layouts.base')

@section('content')
<div class="container">
    <h2>My Education</h2>
    <a href="{{ route('user.applicant.educations.create') }}" class="btn btn-primary mb-3">Add Education</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($educations->isEmpty())
        <p>No education records found.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Level</th>
                    <th>Field of Study</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($educations as $education)
                    <tr>
                        <td>{{ $education->level }}</td>
                        <td>{{ $education->field_of_study }}</td>
                        <td>
                            <a href="{{ route('user.applicant.educations.edit', $education) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('user.applicant.educations.destroy', $education) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
