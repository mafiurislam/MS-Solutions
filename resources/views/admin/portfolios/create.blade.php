@extends('admin.layouts.app')

@section('title', 'Create Portfolio')
@section('page_title', 'Create New Portfolio')

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
                <h5><i class="fa fa-plus text-info me-2"></i> Add New Portfolio Project</h5>
            </div>
            <div class="admin-card-body">
                <form method="POST" action="{{ route('admin.portfolios.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-8">
                            <label class="form-label">Project Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control" placeholder="e.g. Sundarban Safari Tours" value="{{ old('title') }}" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Category <span class="text-danger">*</span></label>
                            <input type="text" name="category" class="form-control" placeholder="e.g. Travel & Tourism" value="{{ old('category', 'Web Development') }}" required>
                        </div>
                        <div class="col-md-8">
                            <label class="form-label">Live Project URL</label>
                            <input type="url" name="project_url" class="form-control" placeholder="https://example.com" value="{{ old('project_url') }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Display Order</label>
                            <input type="number" name="order" class="form-control" placeholder="0" value="{{ old('order', 0) }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Project Image / Thumbnail</label>
                            <input type="file" name="image" class="form-control" accept="image/*" id="imageInput">
                            <div class="form-text text-muted">Recommended aspect ratio: 16:9 or 4:3 (JPEG, PNG, WebP)</div>
                            <div class="mt-2" id="previewContainer" style="display: none;">
                                <img id="imagePreview" src="#" alt="Preview" class="rounded-3 border border-secondary" style="max-height: 180px; object-fit: cover;">
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Description / Highlights</label>
                            <textarea name="description" class="form-control" rows="3" placeholder="Brief project summary or technologies used...">{{ old('description') }}</textarea>
                        </div>
                        <div class="col-12">
                            <div class="form-check form-switch mt-2">
                                <input class="form-check-input" type="checkbox" name="is_featured" id="is_featured" value="1" checked>
                                <label class="form-check-label text-white" for="is_featured">Feature on Home Page</label>
                            </div>
                        </div>
                        <div class="col-12 text-end mt-4">
                            <a href="{{ route('admin.portfolios.index') }}" class="btn btn-outline-secondary me-2 rounded-pill px-4">Cancel</a>
                            <button type="submit" class="btn btn-theme-primary rounded-pill px-4">Save Portfolio</button>
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
                document.getElementById('previewContainer').style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
    });
</script>
@endpush
