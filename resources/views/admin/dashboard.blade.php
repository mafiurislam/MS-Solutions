@extends('admin.layouts.app')

@section('title', 'Admin Dashboard')
@section('page_title', 'Dashboard Overview')

@section('content')
<style>
    .stat-card {
        border-radius: 16px;
        padding: 24px;
        position: relative;
        overflow: hidden;
        border: 1px solid rgba(255, 255, 255, 0.08);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .stat-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.3);
    }
    .stat-card.cyan {
        background: linear-gradient(135deg, rgba(1, 216, 225, 0.15) 0%, rgba(15, 23, 42, 0.8) 100%);
        border-color: rgba(1, 216, 225, 0.3);
    }
    .stat-card.purple {
        background: linear-gradient(135deg, rgba(168, 85, 247, 0.15) 0%, rgba(15, 23, 42, 0.8) 100%);
        border-color: rgba(168, 85, 247, 0.3);
    }
    .stat-card.emerald {
        background: linear-gradient(135deg, rgba(16, 185, 129, 0.15) 0%, rgba(15, 23, 42, 0.8) 100%);
        border-color: rgba(16, 185, 129, 0.3);
    }
    .stat-card.rose {
        background: linear-gradient(135deg, rgba(244, 63, 94, 0.15) 0%, rgba(15, 23, 42, 0.8) 100%);
        border-color: rgba(244, 63, 94, 0.3);
    }
    .stat-icon {
        width: 52px;
        height: 52px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.4rem;
        margin-bottom: 14px;
    }
    .cyan .stat-icon { background: rgba(1, 216, 225, 0.2); color: #01D8E1; }
    .purple .stat-icon { background: rgba(168, 85, 247, 0.2); color: #c084fc; }
    .emerald .stat-icon { background: rgba(16, 185, 129, 0.2); color: #34d399; }
    .rose .stat-icon { background: rgba(244, 63, 94, 0.2); color: #fb7185; }

    .quick-action-box {
        background: rgba(15, 23, 42, 0.6);
        border: 1px dashed rgba(1, 216, 225, 0.3);
        border-radius: 14px;
        padding: 16px 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 24px;
    }
</style>

<!-- Welcome / Quick Actions Banner -->
<div class="quick-action-box">
    <div>
        <h4 class="fw-bold mb-1 text-white">Welcome, {{ Auth::user()->name }}! 👋</h4>
        <p class="text-muted mb-0 small">Here is what is happening across your website today. You have full dynamic control over all sections and portfolios.</p>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('admin.sections.index') }}" class="btn btn-outline-info rounded-pill px-3 btn-sm">
            <i class="fa fa-layer-group me-1"></i> Edit Sections
        </a>
        <a href="{{ route('admin.portfolios.create') }}" class="btn btn-theme-primary rounded-pill px-3 btn-sm">
            <i class="fa fa-plus me-1"></i> Add Portfolio
        </a>
    </div>
</div>

<!-- Stat Cards Grid -->
<div class="row g-4 mb-4">
    <div class="col-xl-3 col-sm-6">
        <div class="stat-card cyan">
            <div class="stat-icon"><i class="fa fa-briefcase"></i></div>
            <div class="text-muted small fw-semibold text-uppercase">Portfolios</div>
            <h2 class="display-6 fw-bold text-white mb-0">{{ $stats['portfolios'] }}</h2>
            <div class="mt-2 small text-info"><a href="{{ route('admin.portfolios.index') }}" class="text-info text-decoration-none">Manage Portfolios <i class="fa fa-arrow-right ms-1"></i></a></div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6">
        <div class="stat-card purple">
            <div class="stat-icon"><i class="fa fa-layer-group"></i></div>
            <div class="text-muted small fw-semibold text-uppercase">Page Sections</div>
            <h2 class="display-6 fw-bold text-white mb-0">{{ $stats['sections'] }}</h2>
            <div class="mt-2 small text-purple"><a href="{{ route('admin.sections.index') }}" class="text-decoration-none" style="color: #c084fc;">Section Editor <i class="fa fa-arrow-right ms-1"></i></a></div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6">
        <div class="stat-card emerald">
            <div class="stat-icon"><i class="fa fa-cubes"></i></div>
            <div class="text-muted small fw-semibold text-uppercase">Active Services</div>
            <h2 class="display-6 fw-bold text-white mb-0">{{ $stats['services'] }}</h2>
            <div class="mt-2 small text-success"><a href="{{ route('admin.services.index') }}" class="text-success text-decoration-none">Manage Services <i class="fa fa-arrow-right ms-1"></i></a></div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6">
        <div class="stat-card rose">
            <div class="stat-icon"><i class="fa fa-envelope"></i></div>
            <div class="text-muted small fw-semibold text-uppercase">Inquiries Received</div>
            <h2 class="display-6 fw-bold text-white mb-0">{{ $stats['messages'] }}</h2>
            <div class="mt-2 small text-danger"><a href="{{ route('admin.messages.index') }}" class="text-danger text-decoration-none">View {{ $stats['unread_messages'] }} Unread <i class="fa fa-arrow-right ms-1"></i></a></div>
        </div>
    </div>
</div>

<div class="row g-4">
    <!-- Recent Portfolios Table -->
    <div class="col-lg-8">
        <div class="admin-card">
            <div class="admin-card-header">
                <h5><i class="fa fa-briefcase text-info me-2"></i> Recent Portfolios</h5>
                <a href="{{ route('admin.portfolios.index') }}" class="btn btn-sm btn-outline-info rounded-pill px-3">View All</a>
            </div>
            <div class="table-responsive">
                <table class="table admin-table mb-0">
                    <thead>
                        <tr>
                            <th>Thumbnail</th>
                            <th>Title & Category</th>
                            <th>Status</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentPortfolios as $portfolio)
                            <tr>
                                <td style="width: 70px;">
                                    <img src="{{ $portfolio->image_url }}" alt="{{ $portfolio->title }}" class="rounded-3 border border-secondary" style="width: 56px; height: 38px; object-fit: cover;">
                                </td>
                                <td>
                                    <div class="fw-bold text-white">{{ $portfolio->title }}</div>
                                    <span class="badge badge-cyan py-0">{{ $portfolio->category }}</span>
                                </td>
                                <td>
                                    @if($portfolio->is_featured)
                                        <span class="badge bg-success bg-opacity-25 text-success border border-success border-opacity-25">Featured</span>
                                    @else
                                        <span class="badge bg-secondary">Standard</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('admin.portfolios.edit', $portfolio) }}" class="btn btn-sm btn-outline-info rounded-3 me-1" title="Edit">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <form method="POST" action="{{ route('admin.portfolios.destroy', $portfolio) }}" class="d-inline" onsubmit="return confirm('Delete this portfolio?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger rounded-3" title="Delete">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted py-4">No portfolios available.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Quick Section Access Sidebar -->
    <div class="col-lg-4">
        <div class="admin-card">
            <div class="admin-card-header">
                <h5><i class="fa fa-layer-group text-purple me-2" style="color:#c084fc;"></i> Page Sections Editor</h5>
                <a href="{{ route('admin.sections.index') }}" class="btn btn-sm btn-outline-light rounded-pill">All</a>
            </div>
            <div class="admin-card-body p-0">
                <div class="list-group list-group-flush bg-transparent">
                    @foreach($recentSections as $sec)
                        <div class="list-group-item bg-transparent border-color text-light d-flex align-items-center justify-content-between p-3" style="border-bottom: 1px solid rgba(255,255,255,0.06);">
                            <div>
                                <span class="badge badge-purple mb-1">{{ strtoupper($sec->page) }}</span>
                                <div class="fw-semibold text-white small">{{ $sec->section_name }}</div>
                            </div>
                            <a href="{{ route('admin.sections.edit', $sec) }}" class="btn btn-sm btn-outline-info rounded-pill px-3" title="Edit Section">
                                Edit <i class="fa fa-pencil ms-1"></i>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
