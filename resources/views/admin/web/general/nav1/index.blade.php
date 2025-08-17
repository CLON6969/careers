@extends('layouts.admin')

@section('content')
<div class="container">


    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('admin.web.general.nav1.create') }}" class="btn btn-primary mb-3">Add New Navigation Item</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Name URL</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($nav1s as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->name_url }}</td>
                    <td>
                        <a href="{{ route('admin.web.general.nav1.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.web.general.nav1.destroy', $item->id) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
