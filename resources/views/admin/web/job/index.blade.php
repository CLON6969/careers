@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <div class="flex  justify-content-between align-items-center mb-4 buttons">
        
        <div>
        <h4>Job Posts</h4>
        <a href="{{ route('admin.web.job.create') }}" class="btn btn-primary">Create New Job</a>
        </div>

        <div >
         <h4>All job Posts</h4>
        <a href="{{ route('admin.web.job.allPosts') }}" class="btn btn-primary">VIew all Job</a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Title</th>
                <th>Department</th>
                <th>Employment Type</th>
                <th>Deadline</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($jobs as $job)
                <tr>
                    <td>{{ $job->title }}</td>
                    <td>{{ $job->department }}</td>
                    <td>{{ $job->employment_type }}</td>
                    <td>{{ $job->application_deadline->format('Y-m-d') }}</td>
                    <td>{{ ucfirst($job->status) }}</td>
                    <td>
                        <a href="{{ route('admin.web.job.edit', $job) }}" class="btn btn-sm btn-info">Edit</a>
                        <form action="{{ route('admin.web.job.destroy', $job) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6" class="text-center">No jobs found.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
