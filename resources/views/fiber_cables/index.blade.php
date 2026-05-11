@extends('layouts.app')

@section('title', 'Fiber Cables')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3">Fiber Cable Management</h1>
        <a href="{{ route('fiber_cables.create') }}" class="btn btn-primary">Add New Fiber Cable</a>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Core Count</th>
                        <th>Status</th>
                        <th>Length (m)</th>
                        <th>Loss (dB)</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($cables as $cable)
                        <tr>
                            <td>{{ $cable->name }}</td>
                            <td>{{ $cable->core_count }}</td>
                            <td>
                                <span class="badge bg-{{ $cable->status == 'normal' ? 'success' : ($cable->status == 'degraded' ? 'warning' : 'danger') }}">
                                    {{ ucfirst($cable->status) }}
                                </span>
                            </td>
                            <td>{{ $cable->length_meters }}</td>
                            <td>{{ $cable->total_loss_db }}</td>
                            <td>
                                <a href="{{ route('fiber_cables.edit', $cable) }}" class="btn btn-sm btn-info">Edit</a>
                                <form action="{{ route('fiber_cables.destroy', $cable) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No fiber cables found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $cables->links() }}
        </div>
    </div>
@endsection
