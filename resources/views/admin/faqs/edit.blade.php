@extends('admin.layouts.app')

@section('title', 'Edit FAQ')
@section('page_title', 'Edit FAQ')

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
                <h5><i class="fa fa-pencil text-info me-2"></i> Edit FAQ</h5>
            </div>
            <div class="admin-card-body">
                <form method="POST" action="{{ route('admin.faqs.update', $faq) }}">
                    @csrf
                    @method('PUT')
                    <div class="row g-3">
                        <div class="col-md-8">
                            <label class="form-label">Question <span class="text-danger">*</span></label>
                            <input type="text" name="question" class="form-control" value="{{ old('question', $faq->question) }}" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Category</label>
                            <input type="text" name="page_or_category" class="form-control" value="{{ old('page_or_category', $faq->page_or_category) }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Answer <span class="text-danger">*</span></label>
                            <textarea name="answer" class="form-control" rows="4" required>{{ old('answer', $faq->answer) }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Display Order</label>
                            <input type="number" name="order" class="form-control" value="{{ old('order', $faq->order) }}">
                        </div>
                        <div class="col-md-6 d-flex align-items-center">
                            <div class="form-check form-switch mt-4">
                                <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1" {{ $faq->is_active ? 'checked' : '' }}>
                                <label class="form-check-label text-white" for="is_active">Visible on Website</label>
                            </div>
                        </div>
                        <div class="col-12 text-end mt-4">
                            <a href="{{ route('admin.faqs.index') }}" class="btn btn-outline-secondary me-2 rounded-pill px-4">Cancel</a>
                            <button type="submit" class="btn btn-theme-primary rounded-pill px-4">Update FAQ</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
