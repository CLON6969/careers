@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="buttons">
        <h4>Home Table Records</h4>
        <a href="{{ route('admin.web.homepage.table.create') }}" class="btn btn-primary">Add New</a>
    </div>

    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Picture</th>
                <th>Title</th>
                <th>Content</th>
                <th>Small Text</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($records as $record)
                <tr>
                    <td><img src="{{ asset('/public/uploads/pics/' . $record->picture) }}" width="80" style="border-radius: 0.5rem;"></td>
                    <td>{{ $record->title1 }}</td>
                    <td>{{ $record->title1_content }}</td>
                    <td>{{ $record->title1_small_text }}</td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('admin.web.homepage.table.edit', $record->id) }}" class="btn btn-info btn-sm">Edit</a>
                            <form action="{{ route('admin.web.homepage.table.destroy', $record->id) }}" method="POST" onsubmit="return confirm('Delete this record?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
