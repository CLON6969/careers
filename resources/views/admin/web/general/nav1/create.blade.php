@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4">Add Navigation Item</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Please fix the following errors:
            <ul>
                @foreach($errors->all() as $error) <li>{{ $error }}</li> @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.web.general.nav1.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name *</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="name_url" class="form-label">Name URL *</label>
            <input type="text" name="name_url" class="form-control" value="{{ old('name_url') }}" required>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('admin.web.general.nav1.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
