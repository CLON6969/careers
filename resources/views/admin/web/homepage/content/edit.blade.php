@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h4>Edit Homepage Content</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.web.homepage.content.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Title 1</label>
            <input type="text" name="title1" class="form-control" value="{{ old('title1', $content->title1) }}" required>
        </div>

        <div class="mb-3">
            <label>Title 1 Content</label>
            <textarea name="title1_content" class="form-control">{{ old('title1_content', $content->title1_content) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Title 2</label>
            <input type="text" name="title2" class="form-control" value="{{ old('title2', $content->title2) }}" required>
        </div>

        <div class="mb-3">
            <label>Title 2 Content</label>
            <textarea name="title2_content" class="form-control">{{ old('title2_content', $content->title2_content) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Background Picture</label>
            <input type="file" name="background_picture" class="form-control">
            @if($content->background_picture)
                <img src="{{ asset('/public/uploads/pics/' . $content->background_picture) }}" width="200" class="mt-2">
            @endif
        </div>

        <div class="mb-3">
            <label>Picture 1</label>
            <input type="file" name="picture1" class="form-control">
            @if($content->picture1)
                <img src="{{ asset('/public/uploads/pics/' . $content->picture1) }}" width="200" class="mt-2">
            @endif
        </div>

        <div class="mb-3">
            <label>Button 1 Name</label>
            <input type="text" name="button1_name" class="form-control" value="{{ old('button1_name', $content->button1_name) }}">
        </div>

        <div class="mb-3">
            <label>Button 1 URL</label>
            <input type="text" name="button1_url" class="form-control" value="{{ old('button1_url', $content->button1_url) }}">
        </div>

        <div class="mb-3">
            <label>Background Picture 2</label>
            <input type="file" name="background_picture2" class="form-control">
            @if($content->background_picture2)
                <img src="{{ asset('/public/uploads/pics/' . $content->background_picture2) }}" width="200" class="mt-2">
            @endif
        </div>

        <div class="mb-3">
            <label>Title 3</label>
            <input type="text" name="title3" class="form-control" value="{{ old('title3', $content->title3) }}">
        </div>

        <div class="mb-3">
            <label>Title 3 Content</label>
            <textarea name="title3_content" class="form-control">{{ old('title3_content', $content->title3_content) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Button 2 Name</label>
            <input type="text" name="button2_name" class="form-control" value="{{ old('button2_name', $content->button2_name) }}">
        </div>

        <div class="mb-3">
            <label>Button 2 URL</label>
            <input type="text" name="button2_url" class="form-control" value="{{ old('button2_url', $content->button2_url) }}">
        </div>

        <button type="submit" class="btn btn-primary">Update Homepage</button>
    </form>
</div>
@endsection
