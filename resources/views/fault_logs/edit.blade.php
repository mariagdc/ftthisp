@extends('layouts.app')

@section('title', 'Edit Fault Log')

@section('content')
    <div class="mb-3">
        <h1 class="h3">Edit Fault Log</h1>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('fault_logs.update', $faultLog) }}" method="POST">
                @csrf
                @method('PATCH')

                <div class="mb-3">
                    <label for="type" class="form-label">Type</label>
                    <select class="form-select @error('type') is-invalid @enderror" id="type" name="type" required>
                        <option value="fiber_cut" {{ old('type', $faultLog->type) == 'fiber_cut' ? 'selected' : '' }}>Fiber Cut</option>
                        <option value="signal_loss" {{ old('type', $faultLog->type) == 'signal_loss' ? 'selected' : '' }}>Signal Loss</option>
                        <option value="equipment_failure" {{ old('type', $faultLog->type) == 'equipment_failure' ? 'selected' : '' }}>Equipment Failure</option>
                        <option value="other" {{ old('type', $faultLog->type) == 'other' ? 'selected' : '' }}>Other</option>
                    </select>
                    @error('type')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4" required>{{ old('description', $faultLog->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                        <option value="pending" {{ old('status', $faultLog->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="resolved" {{ old('status', $faultLog->status) == 'resolved' ? 'selected' : '' }}>Resolved</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update Fault Log</button>
                <a href="{{ route('fault_logs.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection
