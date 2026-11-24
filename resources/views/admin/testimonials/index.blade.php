@extends('admin.layouts.app')

@section('title', 'Manage Testimonials')
@section('page_title', 'Client Testimonials')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
    <div>
        <h4 class="fw-bold mb-1 text-white">Client Testimonials</h4>
        <p class="text-muted small mb-0">Showcase positive client reviews and feedback.</p>
    </div>
    <a href="{{ route('admin.testimonials.create') }}" class="btn btn-theme-primary rounded-pill px-4">
        <i class="fa fa-plus me-2"></i> Add Review
    </a>
</div>

<div class="admin-card">
    <div class="table-responsive">
        <table class="table admin-table align-middle">
            <thead>
                <tr>
                    <th>Client Name</th>
                    <th>Role / Company</th>
                    <th>Rating</th>
                    <th>Review Excerpt</th>
                    <th>Order</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($testimonials as $testi)
                    <tr>
                        <td class="fw-bold text-white">{{ $testi->client_name }}</td>
                        <td class="text-muted small">{{ $testi->client_role_company }}</td>
                        <td>
                            <span class="text-warning small">
                                @for($i = 0; $i < $testi->rating; $i++) <i class="fa fa-star"></i> @endfor
                            </span>
                        </td>
                        <td class="text-muted small" style="max-width: 320px;">
                            "{{ Str::limit($testi->review_text, 90) }}"
                        </td>
                        <td><span class="badge bg-dark border border-secondary">{{ $testi->order }}</span></td>
                        <td class="text-end">
                            <a href="{{ route('admin.testimonials.edit', $testi) }}" class="btn btn-sm btn-outline-info rounded-3 me-1">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <form method="POST" action="{{ route('admin.testimonials.destroy', $testi) }}" class="d-inline" onsubmit="return confirm('Delete this review?')">
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
                        <td colspan="6" class="text-center text-muted py-4">No reviews found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
