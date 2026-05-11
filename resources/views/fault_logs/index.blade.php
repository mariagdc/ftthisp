@extends('layouts.app')

@section('title', 'Fault Logs')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3">Fault Logs</h1>
        <a href="{{ route('fault_logs.create') }}" class="btn btn-primary">Add New Fault Log</a>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Type</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($faults as $log)
                        <tr>
                            <td>{{ ucfirst($log->type) }}</td>
                            <td>{{ $log->description }}</td>
                            <td>
                                <span class="badge bg-{{ $log->status == 'resolved' ? 'success' : 'danger' }}">
                                    {{ ucfirst($log->status) }}
                                </span>
                            </td>
                            <td>{{ $log->created_at->format('Y-m-d H:i') }}</td>
                            <td>
                                <a href="{{ route('fault_logs.edit', $log) }}" class="btn btn-sm btn-info">Edit</a>
                                <form action="{{ route('fault_logs.destroy', $log) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No fault logs found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $faults->links() }}
        </div>
    </div>
@endsection
