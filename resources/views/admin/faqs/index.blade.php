@extends('admin.layouts.app')

@section('title', 'Manage FAQs')
@section('page_title', 'Frequently Asked Questions')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
    <div>
        <h4 class="fw-bold mb-1 text-white">FAQs Management</h4>
        <p class="text-muted small mb-0">Manage question and answer accordions across your website pages.</p>
    </div>
    <a href="{{ route('admin.faqs.create') }}" class="btn btn-theme-primary rounded-pill px-4">
        <i class="fa fa-plus me-2"></i> Add FAQ
    </a>
</div>

<div class="admin-card">
    <div class="table-responsive">
        <table class="table admin-table align-middle">
            <thead>
                <tr>
                    <th>Question</th>
                    <th>Category</th>
                    <th>Answer Preview</th>
                    <th>Order</th>
                    <th>Status</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($faqs as $faq)
                    <tr>
                        <td class="fw-bold text-white fs-6">{{ $faq->question }}</td>
                        <td><span class="badge badge-cyan">{{ $faq->page_or_category }}</span></td>
                        <td class="text-muted small" style="max-width: 350px;">{{ Str::limit($faq->answer, 90) }}</td>
                        <td><span class="badge bg-dark border border-secondary">{{ $faq->order }}</span></td>
                        <td>
                            @if($faq->is_active)
                                <span class="badge bg-success bg-opacity-25 text-success border border-success border-opacity-25">Active</span>
                            @else
                                <span class="badge bg-secondary">Hidden</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.faqs.edit', $faq) }}" class="btn btn-sm btn-outline-info rounded-3 me-1">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <form method="POST" action="{{ route('admin.faqs.destroy', $faq) }}" class="d-inline" onsubmit="return confirm('Delete this FAQ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger rounded-3">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">No FAQs added yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
