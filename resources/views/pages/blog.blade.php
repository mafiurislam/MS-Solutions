@extends('layouts.app')

@section('title', 'Our Blog & News – MS Solutions')

@section('content')
    @php
        $hero = $sections['blog_hero'] ?? null;
    @endphp

    <!-- Banner -->
    <section class="hero-slider-section" style="padding: 60px 0;">
        <div class="auto-container">
            <div class="hero-content">
                <span class="sub-title">{{ $hero->badge ?? 'Our Insights' }}</span>
                <h1>{{ $hero->title ?? 'Latest Articles & Digital Growth Insights' }}</h1>
                <p>{{ $hero->subtitle ?? 'Industry insights, web technology updates, and digital marketing tutorials from our engineering team.' }}</p>
            </div>
        </div>
    </section>

    <!-- Blog Articles Grid -->
    <section class="py-5">
        <div class="auto-container">
            <div class="row g-4">
                @foreach($blogs as $blog)
                    <div class="col-lg-4 col-md-6">
                        <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">
                            <img src="{{ $blog->image_url }}" class="card-img-top" alt="{{ $blog->title }}" style="height: 220px; object-fit: cover;">
                            <div class="card-body p-4 d-flex flex-column">
                                <span class="badge bg-info-subtle text-info mb-2 align-self-start">{{ $blog->category }}</span>
                                <h3 class="h5 fw-bold mb-2"><a href="#" class="text-dark text-decoration-none">{{ $blog->title }}</a></h3>
                                <p class="text-muted small flex-grow-1">{{ $blog->excerpt }}</p>
                                <hr>
                                <div class="d-flex justify-content-between text-muted small">
                                    <span><i class="fa fa-user me-1"></i> {{ $blog->author }}</span>
                                    <span><i class="fa fa-calendar me-1"></i> {{ $blog->published_at ? $blog->published_at->format('d M, Y') : 'Recent' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
