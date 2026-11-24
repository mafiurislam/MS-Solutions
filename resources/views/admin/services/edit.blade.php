@extends('admin.layouts.app')

@section('title', 'Edit Service')
@section('page_title', 'Edit Service')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.services.index') }}" class="text-info text-decoration-none small">
        <i class="fa fa-arrow-left me-1"></i> Back to Services
    </a>
</div>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="admin-card">
            <div class="admin-card-header">
                <h5><i class="fa fa-pencil text-info me-2"></i> Edit Service: {{ $service->title }}</h5>
            </div>
            <div class="admin-card-body">
                <form method="POST" action="{{ route('admin.services.update', $service) }}">
                    @csrf
                    @method('PUT')
                    <div class="row g-3">
                        <div class="col-md-8">
                            <label class="form-label">Service Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control" value="{{ old('title', $service->title) }}" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">FontAwesome Icon <span class="text-danger">*</span></label>
                            <input type="text" name="icon" class="form-control" value="{{ old('icon', $service->icon) }}" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Short Description <span class="text-danger">*</span></label>
                            <textarea name="short_description" class="form-control" rows="3" required>{{ old('short_description', $service->short_description) }}</textarea>
                        </div>
                        <div class="col-md-8">
                            <label class="form-label">WhatsApp / Quote Link</label>
                            <input type="text" name="quote_link" class="form-control" value="{{ old('quote_link', $service->quote_link) }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Display Order</label>
                            <input type="number" name="order" class="form-control" value="{{ old('order', $service->order) }}">
                        </div>
                        <div class="col-12">
                            <div class="form-check form-switch mt-2">
                                <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1" {{ $service->is_active ? 'checked' : '' }}>
                                <label class="form-check-label text-white" for="is_active">Active & Visible</label>
                            </div>
                        </div>
                        <div class="col-12 text-end mt-4">
                            <a href="{{ route('admin.services.index') }}" class="btn btn-outline-secondary me-2 rounded-pill px-4">Cancel</a>
                            <button type="submit" class="btn btn-theme-primary rounded-pill px-4">Update Service</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
