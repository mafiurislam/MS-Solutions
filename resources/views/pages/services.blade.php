@extends('layouts.app')

@section('title', 'Our Services – MS Solutions')

@section('content')
    @php
        $hero = $sections['services_hero'] ?? null;
    @endphp

    <!-- Banner -->
    <section class="hero-slider-section" style="padding: 60px 0;">
        <div class="auto-container">
            <div class="hero-content">
                <span class="sub-title">{{ $hero->badge ?? 'What We Offer' }}</span>
                <h1>{{ $hero->title ?? 'Our Specialized Services' }}</h1>
                <p>{{ $hero->subtitle ?? 'End-to-end digital solutions designed to grow your audience, secure your platforms, and boost revenues.' }}</p>
            </div>
        </div>
    </section>

    <!-- Services Grid -->
    <section class="py-5">
        <div class="auto-container">
            <div class="row g-4">
                @foreach($services as $srv)
                    <div class="col-lg-4 col-md-6">
                        <div class="card border-0 shadow-sm rounded-4 h-100 p-4 transition-hover">
                            <div class="display-5 text-info mb-3"><i class="{{ $srv->icon }}"></i></div>
                            <h3 class="h4 fw-bold">{{ $srv->title }}</h3>
                            <p class="text-muted">{{ $srv->short_description }}</p>
                            <a href="{{ $srv->quote_link ?? ('https://wa.me/' . ($siteSettings['whatsapp_number'] ?? '919382559266') . '?text=Hi%2C+I+am+interested+in+' . urlencode($srv->title) . '+service.') }}" target="_blank" class="text-info fw-bold text-decoration-none mt-auto">Get Quote <i class="fa fa-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
