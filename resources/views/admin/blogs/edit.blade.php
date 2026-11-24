@extends('admin.layouts.app')

@section('title', 'Edit Blog Article')
@section('page_title', 'Edit Article')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.blogs.index') }}" class="text-info text-decoration-none small">
        <i class="fa fa-arrow-left me-1"></i> Back to Articles
    </a>
</div>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="admin-card">
            <div class="admin-card-header">
                <h5><i class="fa fa-pencil text-info me-2"></i> Edit Article: {{ $blog->title }}</h5>
            </div>
            <div class="admin-card-body">
                <form method="POST" action="{{ route('admin.blogs.update', $blog) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row g-3">
                        <div class="col-md-8">
                            <label class="form-label">Article Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control" value="{{ old('title', $blog->title) }}" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Category <span class="text-danger">*</span></label>
                            <input type="text" name="category" class="form-control" value="{{ old('category', $blog->category) }}" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Excerpt / Short Summary <span class="text-danger">*</span></label>
                            <textarea name="excerpt" class="form-control" rows="2" required>{{ old('excerpt', $blog->excerpt) }}</textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Article Body Content <span class="text-danger">*</span></label>
                            <textarea name="content" class="form-control" rows="6" required>{{ old('content', $blog->content) }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Cover Image</label>
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <img src="{{ $blog->image_url }}" alt="Cover" class="rounded-3 border border-secondary" style="height: 50px; width: 75px; object-fit: cover;">
                                <input type="file" name="image" class="form-control" accept="image/*">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Author Name</label>
                            <input type="text" name="author" class="form-control" value="{{ old('author', $blog->author) }}">
                        </div>
                        <div class="col-12">
                            <div class="form-check form-switch mt-2">
                                <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1" {{ $blog->is_active ? 'checked' : '' }}>
                                <label class="form-check-label text-white" for="is_active">Publish on Website</label>
                            </div>
                        </div>
                        <div class="col-12 text-end mt-4">
                            <a href="{{ route('admin.blogs.index') }}" class="btn btn-outline-secondary me-2 rounded-pill px-4">Cancel</a>
                            <button type="submit" class="btn btn-theme-primary rounded-pill px-4">Update Article</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
