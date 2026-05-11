@extends('layouts.app')

@section('title', 'Edit Fiber Cable')

@section('content')
    <div class="mb-3">
        <h1 class="h3">Edit Fiber Cable</h1>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('fiber_cables.update', $fiberCable) }}" method="POST">
                @csrf
                @method('PATCH')

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $fiberCable->name) }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="core_count" class="form-label">Core Count</label>
                    <input type="number" class="form-control @error('core_count') is-invalid @enderror" id="core_count" name="core_count" value="{{ old('core_count', $fiberCable->core_count) }}" required>
                    @error('core_count')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                        <option value="normal" {{ old('status', $fiberCable->status) == 'normal' ? 'selected' : '' }}>Normal</option>
                        <option value="degraded" {{ old('status', $fiberCable->status) == 'degraded' ? 'selected' : '' }}>Degraded</option>
                        <option value="cut" {{ old('status', $fiberCable->status) == 'cut' ? 'selected' : '' }}>Cut</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="length_meters" class="form-label">Length (meters)</label>
                    <input type="number" class="form-control @error('length_meters') is-invalid @enderror" id="length_meters" name="length_meters" value="{{ old('length_meters', $fiberCable->length_meters) }}" required>
                    @error('length_meters')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="total_loss_db" class="form-label">Total Loss (dB)</label>
                    <input type="number" step="0.1" class="form-control @error('total_loss_db') is-invalid @enderror" id="total_loss_db" name="total_loss_db" value="{{ old('total_loss_db', $fiberCable->total_loss_db) }}" required>
                    @error('total_loss_db')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update Fiber Cable</button>
                <a href="{{ route('fiber_cables.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection
