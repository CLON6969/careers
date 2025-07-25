@extends('layouts.base')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">My Certifications</h2>
    <a href="{{ route('user.applicant.certifications.create') }}" class="btn btn-primary mb-3">Add Certification</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($items->count())
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Organization</th>
                    <th>Obtained Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $cert)
                <tr>
                    <td>{{ $cert->name }}</td>
                    <td>{{ $cert->certification_type }}</td>
                    <td>{{ $cert->issuing_organization }}</td>
                    <td>{{ $cert->obtained_date }}</td>
                    <td>
                        <a href="{{ route('user.applicant.certifications.edit', $cert->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('user.applicant.certifications.destroy', $cert->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No certifications added yet.</p>
    @endif
</div>
@endsection
