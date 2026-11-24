@extends('admin.layouts.app')

@section('title', 'Page Sections Management')
@section('page_title', 'Website Page Sections Editor')

@section('content')
<style>
    .section-card {
        background: var(--card-bg);
        border: 1px solid var(--border-color);
        border-radius: 16px;
        padding: 22px;
        transition: all 0.25s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
        position: relative;
    }
    .section-card:hover {
        transform: translateY(-4px);
        border-color: rgba(1, 216, 225, 0.4);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.35);
    }
    .section-icon-badge {
        width: 44px;
        height: 44px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        background: rgba(1, 216, 225, 0.15);
        color: #01D8E1;
    }
    .filter-pills-bar {
        display: flex;
        gap: 8px;
        overflow-x: auto;
        padding-bottom: 12px;
        margin-bottom: 24px;
    }
    .filter-pill {
        white-space: nowrap;
        padding: 8px 18px;
        border-radius: 20px;
        text-decoration: none;
        font-size: 0.88rem;
        font-weight: 600;
        color: var(--text-muted);
        background: rgba(15, 23, 42, 0.6);
        border: 1px solid var(--border-color);
        transition: all 0.2s ease;
    }
    .filter-pill:hover {
        color: #fff;
        background: rgba(255, 255, 255, 0.08);
    }
    .filter-pill.active {
        color: #0b1120;
        background: linear-gradient(135deg, #01D8E1 0%, #009ca3 100%);
        border-color: transparent;
        box-shadow: 0 4px 12px rgba(1, 216, 225, 0.3);
    }
</style>

<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
    <div>
        <h4 class="fw-bold mb-1 text-white">Interactive Section-Wise Content Editor</h4>
        <p class="text-muted small mb-0">Select any section across the entire website and click "Edit" to dynamically modify titles, descriptions, buttons, images, and features.</p>
    </div>
    <a href="{{ route('admin.sections.create') }}" class="btn btn-outline-info rounded-pill px-4 btn-sm">
        <i class="fa fa-plus me-1"></i> Add Custom Section
    </a>
</div>

<!-- Page Filter Navigation Pills -->
<div class="filter-pills-bar">
    @foreach($pageList as $key => $label)
        <a href="{{ route('admin.sections.index', ['page_filter' => $key]) }}" class="filter-pill {{ $currentPage === $key ? 'active' : '' }}">
            @if($key === 'home') 🏠
            @elseif($key === 'about') ℹ️
            @elseif($key === 'services') 💼
            @elseif($key === 'portfolios') 📁
            @elseif($key === 'blog') ✍️
            @elseif($key === 'testimonials') 💬
            @elseif($key === 'faq') ❓
            @elseif($key === 'contact') 📞
            @else 🌐
            @endif
            {{ $label }}
        </a>
    @endforeach
</div>

<!-- Section Cards Grid -->
<div class="row g-4">
    @forelse($sections as $sec)
        <div class="col-xl-4 col-md-6">
            <div class="section-card">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div class="d-flex align-items-center gap-3">
                        <div class="section-icon-badge">
                            <i class="fa fa-layer-group"></i>
                        </div>
                        <div>
                            <span class="badge badge-purple mb-1 text-uppercase">{{ $sec->page }} PAGE</span>
                            <h5 class="fw-bold text-white mb-0 fs-6">{{ $sec->section_name }}</h5>
                        </div>
                    </div>
                    @if($sec->is_active)
                        <span class="badge bg-success bg-opacity-25 text-success border border-success border-opacity-25">Active</span>
                    @else
                        <span class="badge bg-secondary">Hidden</span>
                    @endif
                </div>

                <div class="mb-3 flex-grow-1">
                    @if($sec->badge)
                        <div class="small text-info fw-semibold mb-1"><i class="fa fa-tag me-1"></i> {{ $sec->badge }}</div>
                    @endif
                    <div class="fw-semibold text-white small mb-1">{{ Str::limit($sec->title ?? 'No title defined', 60) }}</div>
                    <p class="text-muted small mb-0">{{ Str::limit($sec->subtitle ?? 'No subtitle defined', 90) }}</p>
                    @if($sec->image)
                        <div class="mt-2">
                            <img src="{{ $sec->image_url }}" alt="Preview" class="rounded-3 border border-secondary" style="height: 50px; width: 90px; object-fit: cover;">
                        </div>
                    @endif
                </div>

                <div class="pt-3 border-top border-secondary border-opacity-25 d-flex justify-content-between align-items-center mt-auto">
                    <span class="text-secondary small font-monospace">Key: {{ $sec->section_key }}</span>
                    <a href="{{ route('admin.sections.edit', $sec) }}" class="btn btn-sm btn-theme-primary rounded-pill px-3">
                        <i class="fa fa-pencil me-1"></i> Edit Section
                    </a>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-center text-muted py-5">
            <i class="fa fa-folder-open fa-3x text-secondary mb-3 d-block"></i>
            <p>No sections found for this page.</p>
        </div>
    @endforelse
</div>
@endsection
