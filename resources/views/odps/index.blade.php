@extends('layouts.app')

@section('title', 'ODPs')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3">ODP Management</h1>
        <a href="{{ route('odps.create') }}" class="btn btn-primary">Add New ODP</a>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Capacity (Used/Total)</th>
                        <th>OLT</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($odps as $odp)
                        <tr>
                            <td>{{ $odp->name }}</td>
                            <td>{{ $odp->used_core }} / {{ $odp->capacity }}</td>
                            <td>{{ $odp->olt->name ?? 'N/A' }}</td>
                            <td>
                                <span class="badge bg-{{ $odp->status == 'active' ? 'success' : 'danger' }}">
                                    {{ ucfirst($odp->status) }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('odps.edit', $odp) }}" class="btn btn-sm btn-info">Edit</a>
                                <form action="{{ route('odps.destroy', $odp) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No ODPs found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $odps->links() }}
        </div>
    </div>
@endsection
