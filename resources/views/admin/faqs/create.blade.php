@extends('admin.layouts.app')

@section('title', 'Add FAQ')
@section('page_title', 'Add FAQ')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.faqs.index') }}" class="text-info text-decoration-none small">
        <i class="fa fa-arrow-left me-1"></i> Back to FAQs
    </a>
</div>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="admin-card">
            <div class="admin-card-header">
                <h5><i class="fa fa-plus text-info me-2"></i> Add FAQ</h5>
            </div>
            <div class="admin-card-body">
                <form method="POST" action="{{ route('admin.faqs.store') }}">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-8">
                            <label class="form-label">Question <span class="text-danger">*</span></label>
                            <input type="text" name="question" class="form-control" placeholder="e.g. How long does a website take to build?" value="{{ old('question') }}" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Category</label>
                            <input type="text" name="page_or_category" class="form-control" placeholder="general, design, dev" value="{{ old('page_or_category', 'general') }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Answer <span class="text-danger">*</span></label>
                            <textarea name="answer" class="form-control" rows="4" placeholder="Detailed answer..." required>{{ old('answer') }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Display Order</label>
                            <input type="number" name="order" class="form-control" value="0">
                        </div>
                        <div class="col-md-6 d-flex align-items-center">
                            <div class="form-check form-switch mt-4">
                                <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1" checked>
                                <label class="form-check-label text-white" for="is_active">Visible on Website</label>
                            </div>
                        </div>
                        <div class="col-12 text-end mt-4">
                            <a href="{{ route('admin.faqs.index') }}" class="btn btn-outline-secondary me-2 rounded-pill px-4">Cancel</a>
                            <button type="submit" class="btn btn-theme-primary rounded-pill px-4">Save FAQ</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
