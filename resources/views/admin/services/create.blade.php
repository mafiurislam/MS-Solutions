@extends('admin.layouts.app')

@section('title', 'Add Service')
@section('page_title', 'Add New Service')

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
                <h5><i class="fa fa-plus text-info me-2"></i> New Service</h5>
            </div>
            <div class="admin-card-body">
                <form method="POST" action="{{ route('admin.services.store') }}">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-8">
                            <label class="form-label">Service Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control" placeholder="e.g. Website Development" value="{{ old('title') }}" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">FontAwesome Icon <span class="text-danger">*</span></label>
                            <input type="text" name="icon" class="form-control" placeholder="fa fa-code" value="{{ old('icon', 'fa fa-code') }}" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Short Description <span class="text-danger">*</span></label>
                            <textarea name="short_description" class="form-control" rows="3" placeholder="Brief service overview..." required>{{ old('short_description') }}</textarea>
                        </div>
                        <div class="col-md-8">
                            <label class="form-label">WhatsApp / Quote Link</label>
                            <input type="text" name="quote_link" class="form-control" placeholder="https://wa.me/..." value="{{ old('quote_link') }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Display Order</label>
                            <input type="number" name="order" class="form-control" value="0">
                        </div>
                        <div class="col-12">
                            <div class="form-check form-switch mt-2">
                                <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1" checked>
                                <label class="form-check-label text-white" for="is_active">Active & Visible</label>
                            </div>
                        </div>
                        <div class="col-12 text-end mt-4">
                            <a href="{{ route('admin.services.index') }}" class="btn btn-outline-secondary me-2 rounded-pill px-4">Cancel</a>
                            <button type="submit" class="btn btn-theme-primary rounded-pill px-4">Create Service</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
