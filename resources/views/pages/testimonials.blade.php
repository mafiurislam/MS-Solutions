@extends('layouts.app')

@section('title', 'Client Testimonials – MS Solutions')

@section('content')
    @php
        $hero = $sections['testimonials_hero'] ?? null;
    @endphp

    <!-- Banner -->
    <section class="hero-slider-section" style="padding: 60px 0;">
        <div class="auto-container">
            <div class="hero-content">
                <span class="sub-title">{{ $hero->badge ?? 'Client Stories' }}</span>
                <h1>{{ $hero->title ?? 'What Our Clients Say About Us' }}</h1>
                <p>{{ $hero->subtitle ?? 'Read reviews and success stories from companies that scaled with MS Solutions.' }}</p>
            </div>
        </div>
    </section>

    <!-- Testimonials Cards Grid -->
    <section class="py-5">
        <div class="auto-container">
            <div class="row g-4">
                @foreach($testimonials as $testi)
                    <div class="col-lg-6">
                        <div class="card border-0 shadow-sm rounded-4 p-4 h-100">
                            <div class="text-warning mb-2">
                                @for($i = 0; $i < ($testi->rating ?? 5); $i++)
                                    <i class="fa fa-star"></i>
                                @endfor
                            </div>
                            <p class="text-muted fst-italic">"{{ $testi->review_text }}"</p>
                            <div class="d-flex align-items-center mt-auto pt-3 border-top">
                                <div>
                                    <h4 class="h6 fw-bold mb-0">{{ $testi->client_name }}</h4>
                                    <span class="small text-muted">{{ $testi->client_role_company }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
