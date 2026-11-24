@extends('admin.layouts.app')

@section('title', 'Manage Blog Posts')
@section('page_title', 'Blog & Insights Management')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
    <div>
        <h4 class="fw-bold mb-1 text-white">Articles & Insights</h4>
        <p class="text-muted small mb-0">Publish tech news, tutorials, and marketing insights.</p>
    </div>
    <a href="{{ route('admin.blogs.create') }}" class="btn btn-theme-primary rounded-pill px-4">
        <i class="fa fa-plus me-2"></i> New Article
    </a>
</div>

<div class="admin-card">
    <div class="table-responsive">
        <table class="table admin-table align-middle">
            <thead>
                <tr>
                    <th style="width: 70px;">Image</th>
                    <th>Title & Category</th>
                    <th>Author</th>
                    <th>Published</th>
                    <th>Status</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($blogs as $blog)
                    <tr>
                        <td>
                            <img src="{{ $blog->image_url }}" alt="{{ $blog->title }}" class="rounded-3 border border-secondary" style="width: 55px; height: 40px; object-fit: cover;">
                        </td>
                        <td>
                            <div class="fw-bold text-white fs-6">{{ $blog->title }}</div>
                            <span class="badge badge-cyan py-0">{{ $blog->category }}</span>
                        </td>
                        <td><span class="text-muted small">{{ $blog->author }}</span></td>
                        <td><span class="text-secondary small">{{ $blog->published_at ? $blog->published_at->format('d M, Y') : '—' }}</span></td>
                        <td>
                            @if($blog->is_active)
                                <span class="badge bg-success bg-opacity-25 text-success border border-success border-opacity-25">Published</span>
                            @else
                                <span class="badge bg-secondary">Draft</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.blogs.edit', $blog) }}" class="btn btn-sm btn-outline-info rounded-3 me-1">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <form method="POST" action="{{ route('admin.blogs.destroy', $blog) }}" class="d-inline" onsubmit="return confirm('Delete this article?')">
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
                        <td colspan="6" class="text-center text-muted py-4">No articles written yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
