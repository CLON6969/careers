@extends('layouts.base')

@section('content')
<div class="container">
    <h2>Your Locations</h2>

    <a href="{{ route('user.applicant.locations.create') }}" class="btn btn-primary mb-3">Add Location</a>

    @if($items->count())
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Province</th>
                    <th>City</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{ $item->location->province ?? 'N/A' }}</td>
                        <td>{{ $item->location->city ?? 'N/A' }}</td>
                        <td>
                            <a href="{{ route('user.applicant.locations.edit', $item->id) }}" class="btn btn-sm btn-info">Edit</a>
                            <form action="{{ route('user.applicant.locations.destroy', $item->id) }}" method="POST" style="display:inline;">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this location?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>You haven't added any locations yet.</p>
    @endif
</div>
@endsection
