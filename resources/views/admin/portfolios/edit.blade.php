@extends('admin.layouts.app')

@section('title', 'Edit Portfolio')
@section('page_title', 'Edit Portfolio')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.portfolios.index') }}" class="text-info text-decoration-none small">
        <i class="fa fa-arrow-left me-1"></i> Back to Portfolios
    </a>
</div>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="admin-card">
            <div class="admin-card-header">
                <h5><i class="fa fa-pencil text-info me-2"></i> Edit Portfolio: {{ $portfolio->title }}</h5>
            </div>
            <div class="admin-card-body">
                <form method="POST" action="{{ route('admin.portfolios.update', $portfolio) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row g-3">
                        <div class="col-md-8">
                            <label class="form-label">Project Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control" value="{{ old('title', $portfolio->title) }}" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Category <span class="text-danger">*</span></label>
                            <input type="text" name="category" class="form-control" value="{{ old('category', $portfolio->category) }}" required>
                        </div>
                        <div class="col-md-8">
                            <label class="form-label">Live Project URL</label>
                            <input type="url" name="project_url" class="form-control" value="{{ old('project_url', $portfolio->project_url) }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Display Order</label>
                            <input type="number" name="order" class="form-control" value="{{ old('order', $portfolio->order) }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Project Image / Thumbnail</label>
                            <div class="d-flex align-items-center gap-3 mb-2">
                                <img id="imagePreview" src="{{ $portfolio->image_url }}" alt="{{ $portfolio->title }}" class="rounded-3 border border-secondary" style="height: 90px; width: 140px; object-fit: cover;">
                                <div>
                                    <input type="file" name="image" class="form-control" accept="image/*" id="imageInput">
                                    <div class="form-text text-muted">Upload a new image to replace the current one.</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Description / Highlights</label>
                            <textarea name="description" class="form-control" rows="3">{{ old('description', $portfolio->description) }}</textarea>
                        </div>
                        <div class="col-12">
                            <div class="form-check form-switch mt-2">
                                <input class="form-check-input" type="checkbox" name="is_featured" id="is_featured" value="1" {{ $portfolio->is_featured ? 'checked' : '' }}>
                                <label class="form-check-label text-white" for="is_featured">Feature on Home Page</label>
                            </div>
                        </div>
                        <div class="col-12 text-end mt-4">
                            <a href="{{ route('admin.portfolios.index') }}" class="btn btn-outline-secondary me-2 rounded-pill px-4">Cancel</a>
                            <button type="submit" class="btn btn-theme-primary rounded-pill px-4">Update Portfolio</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.getElementById('imageInput').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
</script>
@endpush
