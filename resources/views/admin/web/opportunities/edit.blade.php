@extends('layouts.admin_dashboard')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Edit Opportunity</div>
        <div class="card-body">
            <form action="{{ route('admin.web.opportunities.update', $opportunity->id) }}" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')
                <div class="form-group">
                    <label>Title</label>
                    <input name="title" class="form-control" value="{{ $opportunity->title }}" required>
                </div>
                <div class="form-group">
                    <label>Summary</label>
                    <textarea name="summary" class="form-control">{{ $opportunity->summary }}</textarea>
                </div>
                <div class="form-group">
                    <label>Overlay Intro</label>
                    <input name="overlay_intro" class="form-control" value="{{ $opportunity->overlay_intro }}">
                </div>
                <div class="form-group">
                    <label>Overlay Details</label>
                    <textarea name="overlay_details" class="form-control">{{ $opportunity->overlay_details }}</textarea>
                </div>
                <div class="form-group">
                    <label>Image</label><br>
                    <img src="{{ asset('public/' . $opportunity->image) }}" width="100" class="mb-2">
                    <input type="file" name="image" class="form-control">
                </div>
                <button class="btn btn-success">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
