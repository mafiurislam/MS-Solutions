@extends('admin.layouts.app')

@section('title', 'Edit Testimonial')
@section('page_title', 'Edit Client Review')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.testimonials.index') }}" class="text-info text-decoration-none small">
        <i class="fa fa-arrow-left me-1"></i> Back to Testimonials
    </a>
</div>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="admin-card">
            <div class="admin-card-header">
                <h5><i class="fa fa-pencil text-info me-2"></i> Edit Review: {{ $testimonial->client_name }}</h5>
            </div>
            <div class="admin-card-body">
                <form method="POST" action="{{ route('admin.testimonials.update', $testimonial) }}">
                    @csrf
                    @method('PUT')
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Client Name <span class="text-danger">*</span></label>
                            <input type="text" name="client_name" class="form-control" value="{{ old('client_name', $testimonial->client_name) }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Role & Company</label>
                            <input type="text" name="client_role_company" class="form-control" value="{{ old('client_role_company', $testimonial->client_role_company) }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Rating (Stars)</label>
                            <select name="rating" class="form-select">
                                <option value="5" {{ $testimonial->rating == 5 ? 'selected' : '' }}>5 Stars</option>
                                <option value="4" {{ $testimonial->rating == 4 ? 'selected' : '' }}>4 Stars</option>
                                <option value="3" {{ $testimonial->rating == 3 ? 'selected' : '' }}>3 Stars</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Display Order</label>
                            <input type="number" name="order" class="form-control" value="{{ old('order', $testimonial->order) }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Review Text <span class="text-danger">*</span></label>
                            <textarea name="review_text" class="form-control" rows="4" required>{{ old('review_text', $testimonial->review_text) }}</textarea>
                        </div>
                        <div class="col-12">
                            <div class="form-check form-switch mt-2">
                                <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1" {{ $testimonial->is_active ? 'checked' : '' }}>
                                <label class="form-check-label text-white" for="is_active">Active & Visible</label>
                            </div>
                        </div>
                        <div class="col-12 text-end mt-4">
                            <a href="{{ route('admin.testimonials.index') }}" class="btn btn-outline-secondary me-2 rounded-pill px-4">Cancel</a>
                            <button type="submit" class="btn btn-theme-primary rounded-pill px-4">Update Review</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
