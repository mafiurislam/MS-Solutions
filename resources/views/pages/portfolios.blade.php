@extends('layouts.app')

@section('title', 'Our Portfolios – MS Solutions')

@section('content')
    @php
        $hero = $sections['portfolios_hero'] ?? null;
    @endphp

    <!-- Banner -->
    <section class="hero-slider-section" style="padding: 60px 0;">
        <div class="auto-container">
            <div class="hero-content">
                <span class="sub-title">{{ $hero->badge ?? 'Our Work' }}</span>
                <h1>{{ $hero->title ?? 'Recent Projects & Portfolios' }}</h1>
                <p>{{ $hero->subtitle ?? "Take a look at some of the recent custom web applications, e-commerce stores, and digital campaigns we've built." }}</p>
            </div>
        </div>
    </section>

    <!-- Portfolio Gallery Grid -->
    <section class="py-5">
        <div class="auto-container">
            <div class="row g-4">
                @forelse($portfolios as $portfolio)
                    <div class="col-lg-4 col-md-6">
                        <a href="{{ $portfolio->project_url ?? '#' }}" target="_blank" rel="noopener noreferrer" class="project-block-home3">
                            <img src="{{ $portfolio->image_url }}" alt="{{ $portfolio->title }}">
                            <div class="caption-box">
                                <h4>{{ $portfolio->title }}</h4>
                                <span class="visit-btn">Visit Site <i class="fa fa-external-link-alt"></i></span>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col-12 text-center text-muted">
                        <p>No portfolio items added yet.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
