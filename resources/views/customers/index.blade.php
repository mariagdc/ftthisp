@extends('layouts.app')

@section('title', 'Customers')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3">Customer Management</h1>
        <a href="{{ route('customers.create') }}" class="btn btn-primary">Add New Customer</a>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>ODP</th>
                        <th>Status</th>
                        <th>Signal (dBm)</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($customers as $customer)
                        <tr>
                            <td>{{ $customer->customer_id_string }}</td>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->odp->name ?? 'N/A' }}</td>
                            <td>
                                <span class="badge bg-{{ $customer->status == 'online' ? 'success' : ($customer->status == 'offline' ? 'danger' : 'warning') }}">
                                    {{ ucfirst($customer->status) }}
                                </span>
                            </td>
                            <td>{{ $customer->signal_level_dbm ?? 'N/A' }}</td>
                            <td>
                                <a href="{{ route('customers.edit', $customer) }}" class="btn btn-sm btn-info">Edit</a>
                                <form action="{{ route('customers.destroy', $customer) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No customers found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $customers->links() }}
        </div>
    </div>
@endsection
