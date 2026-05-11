@extends('layouts.app')

@section('title', 'Edit Customer')

@section('content')
    <div class="mb-3">
        <h1 class="h3">Edit Customer</h1>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('customers.update', $customer) }}" method="POST">
                @csrf
                @method('PATCH')

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $customer->name) }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="customer_id_string" class="form-label">Customer ID</label>
                    <input type="text" class="form-control @error('customer_id_string') is-invalid @enderror" id="customer_id_string" name="customer_id_string" value="{{ old('customer_id_string', $customer->customer_id_string) }}" required>
                    @error('customer_id_string')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="odp_id" class="form-label">ODP</label>
                    <select class="form-select @error('odp_id') is-invalid @enderror" id="odp_id" name="odp_id" required>
                        <option value="">-- Select ODP --</option>
                        @foreach($odps as $odp)
                            <option value="{{ $odp->id }}" {{ old('odp_id', $customer->odp_id) == $odp->id ? 'selected' : '' }}>{{ $odp->name }}</option>
                        @endforeach
                    </select>
                    @error('odp_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                        <option value="online" {{ old('status', $customer->status) == 'online' ? 'selected' : '' }}>Online</option>
                        <option value="offline" {{ old('status', $customer->status) == 'offline' ? 'selected' : '' }}>Offline</option>
                        <option value="trouble" {{ old('status', $customer->status) == 'trouble' ? 'selected' : '' }}>Trouble</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="signal_level_dbm" class="form-label">Signal Level (dBm)</label>
                    <input type="number" step="0.1" class="form-control @error('signal_level_dbm') is-invalid @enderror" id="signal_level_dbm" name="signal_level_dbm" value="{{ old('signal_level_dbm', $customer->signal_level_dbm) }}">
                    @error('signal_level_dbm')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update Customer</button>
                <a href="{{ route('customers.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection
