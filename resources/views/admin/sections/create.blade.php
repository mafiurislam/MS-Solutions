@extends('admin.layouts.app')

@section('title', 'Create Custom Section')
@section('page_title', 'Add New Page Section')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.sections.index') }}" class="text-info text-decoration-none small">
        <i class="fa fa-arrow-left me-1"></i> Back to Sections
    </a>
</div>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="admin-card">
            <div class="admin-card-header">
                <h5><i class="fa fa-plus text-info me-2"></i> Create New Page Section</h5>
            </div>
            <div class="admin-card-body">
                <form method="POST" action="{{ route('admin.sections.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Target Page <span class="text-danger">*</span></label>
                            <select name="page" class="form-select" required>
                                <option value="home">Home Page</option>
                                <option value="about">About Page</option>
                                <option value="services">Services Page</option>
                                <option value="portfolios">Portfolios Page</option>
                                <option value="blog">Blog Page</option>
                                <option value="testimonials">Testimonials Page</option>
                                <option value="faq">FAQ Page</option>
                                <option value="contact">Contact Page</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Section Name <span class="text-danger">*</span></label>
                            <input type="text" name="section_name" class="form-control" placeholder="e.g. Promo Offer Banner" value="{{ old('section_name') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Unique Key <span class="text-danger">*</span></label>
                            <input type="text" name="section_key" class="form-control" placeholder="e.g. home_promo_banner" value="{{ old('section_key') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Badge Tag</label>
                            <input type="text" name="badge" class="form-control" placeholder="e.g. Limited Time Offer" value="{{ old('badge') }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Section Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Headline" value="{{ old('title') }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Subtitle / Description</label>
                            <textarea name="subtitle" class="form-control" rows="3" placeholder="Description...">{{ old('subtitle') }}</textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Section Image</label>
                            <input type="file" name="image" class="form-control" accept="image/*">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Button Text</label>
                            <input type="text" name="button_text" class="form-control" placeholder="e.g. Contact Now" value="{{ old('button_text') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Button Link</label>
                            <input type="text" name="button_link" class="form-control" placeholder="e.g. /contact" value="{{ old('button_link') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Display Order</label>
                            <input type="number" name="order" class="form-control" value="0">
                        </div>
                        <div class="col-md-6 d-flex align-items-center">
                            <div class="form-check form-switch mt-4">
                                <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1" checked>
                                <label class="form-check-label text-white fw-semibold" for="is_active">Active</label>
                            </div>
                        </div>
                        <div class="col-12 text-end mt-4">
                            <a href="{{ route('admin.sections.index') }}" class="btn btn-outline-secondary me-2 rounded-pill px-4">Cancel</a>
                            <button type="submit" class="btn btn-theme-primary rounded-pill px-4">Create Section</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
