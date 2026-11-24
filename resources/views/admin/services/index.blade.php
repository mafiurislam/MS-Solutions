@extends('admin.layouts.app')

@section('title', 'Manage Services')
@section('page_title', 'Services Management')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
    <div>
        <h4 class="fw-bold mb-1 text-white">All Services</h4>
        <p class="text-muted small mb-0">Create, edit, and organize services displayed on your website.</p>
    </div>
    <a href="{{ route('admin.services.create') }}" class="btn btn-theme-primary rounded-pill px-4">
        <i class="fa fa-plus me-2"></i> Add Service
    </a>
</div>

<div class="admin-card">
    <div class="table-responsive">
        <table class="table admin-table align-middle">
            <thead>
                <tr>
                    <th style="width: 60px;">Icon</th>
                    <th>Service Title</th>
                    <th>Short Description</th>
                    <th>Order</th>
                    <th>Status</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($services as $srv)
                    <tr>
                        <td class="text-center">
                            <div class="fs-4 text-info"><i class="{{ $srv->icon }}"></i></div>
                        </td>
                        <td>
                            <div class="fw-bold text-white fs-6">{{ $srv->title }}</div>
                            <span class="text-secondary small font-monospace">{{ $srv->slug }}</span>
                        </td>
                        <td class="text-muted small" style="max-width: 350px;">
                            {{ Str::limit($srv->short_description, 100) }}
                        </td>
                        <td>
                            <span class="badge bg-dark border border-secondary px-2 py-1">{{ $srv->order }}</span>
                        </td>
                        <td>
                            @if($srv->is_active)
                                <span class="badge bg-success bg-opacity-25 text-success border border-success border-opacity-25">Active</span>
                            @else
                                <span class="badge bg-secondary">Inactive</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.services.edit', $srv) }}" class="btn btn-sm btn-outline-info rounded-3 me-1">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <form method="POST" action="{{ route('admin.services.destroy', $srv) }}" class="d-inline" onsubmit="return confirm('Delete this service?')">
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
                        <td colspan="6" class="text-center text-muted py-4">No services found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
