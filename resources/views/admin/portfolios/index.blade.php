@extends('admin.layouts.app')

@section('title', 'Manage Portfolios')
@section('page_title', 'Portfolios Management (CRUD)')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
    <div>
        <h4 class="fw-bold mb-1 text-white">All Portfolios</h4>
        <p class="text-muted small mb-0">Create, edit, sort, and delete your website project showcases dynamically.</p>
    </div>
    <a href="{{ route('admin.portfolios.create') }}" class="btn btn-theme-primary rounded-pill px-4">
        <i class="fa fa-plus me-2"></i> Add New Portfolio
    </a>
</div>

<div class="admin-card">
    <div class="admin-card-header">
        <h5><i class="fa fa-list text-info me-2"></i> Portfolios Showcase List ({{ $portfolios->count() }})</h5>
    </div>
    <div class="table-responsive">
        <table class="table admin-table align-middle">
            <thead>
                <tr>
                    <th style="width: 80px;">Thumbnail</th>
                    <th>Title & Category</th>
                    <th>Project Link</th>
                    <th>Order</th>
                    <th>Status</th>
                    <th class="text-end" style="width: 140px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($portfolios as $portfolio)
                    <tr>
                        <td>
                            <img src="{{ $portfolio->image_url }}" alt="{{ $portfolio->title }}" class="rounded-3 border border-secondary" style="width: 65px; height: 45px; object-fit: cover;">
                        </td>
                        <td>
                            <div class="fw-bold text-white fs-6">{{ $portfolio->title }}</div>
                            <span class="badge badge-cyan py-0">{{ $portfolio->category }}</span>
                        </td>
                        <td>
                            @if($portfolio->project_url)
                                <a href="{{ $portfolio->project_url }}" target="_blank" class="text-info text-decoration-none small">
                                    <i class="fa fa-arrow-up-right-from-square me-1"></i> Visit Website
                                </a>
                            @else
                                <span class="text-muted small">—</span>
                            @endif
                        </td>
                        <td>
                            <span class="badge bg-dark border border-secondary px-2 py-1">{{ $portfolio->order }}</span>
                        </td>
                        <td>
                            @if($portfolio->is_featured)
                                <span class="badge bg-success bg-opacity-25 text-success border border-success border-opacity-25">Featured</span>
                            @else
                                <span class="badge bg-secondary">Standard</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.portfolios.edit', $portfolio) }}" class="btn btn-sm btn-outline-info rounded-3 me-1" title="Edit Portfolio">
                                <i class="fa fa-pencil"></i> Edit
                            </a>
                            <form method="POST" action="{{ route('admin.portfolios.destroy', $portfolio) }}" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this portfolio?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger rounded-3" title="Delete Portfolio">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-5">
                            <i class="fa fa-folder-open fa-3x text-secondary mb-3 d-block"></i>
                            <p class="mb-3">No portfolio projects found.</p>
                            <a href="{{ route('admin.portfolios.create') }}" class="btn btn-sm btn-theme-primary rounded-pill">Create First Portfolio</a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
