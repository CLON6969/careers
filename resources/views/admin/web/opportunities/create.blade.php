@extends('layouts.admin_dashboard')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Add New Opportunity</div>
        <div class="card-body">
            <form action="{{ route('admin.web.opportunities.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Title</label>
                    <input name="title" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Summary</label>
                    <textarea name="summary" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label>Overlay Intro</label>
                    <input name="overlay_intro" class="form-control">
                </div>
                <div class="form-group">
                    <label>Overlay Details</label>
                    <textarea name="overlay_details" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control" required>
                </div>
                <button class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
</div>
@endsection
