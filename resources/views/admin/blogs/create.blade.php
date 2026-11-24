@extends('admin.layouts.app')

@section('title', 'Add Blog Article')
@section('page_title', 'Create New Article')

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
                <h5><i class="fa fa-plus text-info me-2"></i> New Article</h5>
            </div>
            <div class="admin-card-body">
                <form method="POST" action="{{ route('admin.blogs.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-8">
                            <label class="form-label">Article Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control" placeholder="e.g. Social Media Success: Pro Strategies" value="{{ old('title') }}" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Category <span class="text-danger">*</span></label>
                            <input type="text" name="category" class="form-control" placeholder="Digital Marketing, Web Design" value="{{ old('category', 'Digital Marketing') }}" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Excerpt / Short Summary <span class="text-danger">*</span></label>
                            <textarea name="excerpt" class="form-control" rows="2" placeholder="Brief preview..." required>{{ old('excerpt') }}</textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Article Body Content <span class="text-danger">*</span></label>
                            <textarea name="content" class="form-control" rows="6" placeholder="Full article text..." required>{{ old('content') }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Cover Image</label>
                            <input type="file" name="image" class="form-control" accept="image/*">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Author Name</label>
                            <input type="text" name="author" class="form-control" value="{{ old('author', Auth::user()->name) }}">
                        </div>
                        <div class="col-12">
                            <div class="form-check form-switch mt-2">
                                <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1" checked>
                                <label class="form-check-label text-white" for="is_active">Publish Immediately</label>
                            </div>
                        </div>
                        <div class="col-12 text-end mt-4">
                            <a href="{{ route('admin.blogs.index') }}" class="btn btn-outline-secondary me-2 rounded-pill px-4">Cancel</a>
                            <button type="submit" class="btn btn-theme-primary rounded-pill px-4">Publish Article</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
