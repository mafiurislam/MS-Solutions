@extends('layouts.app')

@section('title', 'About Us – MS Solutions')

@section('content')
    @php
        $hero = $sections['about_hero'] ?? null;
        $story = $sections['about_story'] ?? null;
    @endphp

    <!-- Page Title Banner -->
    <section class="hero-slider-section" style="padding: 60px 0;">
        <div class="auto-container">
            <div class="hero-content">
                <span class="sub-title">{{ $hero->badge ?? 'Who We Are' }}</span>
                <h1>{{ $hero->title ?? 'About MS Solutions' }}</h1>
                <p>{{ $hero->subtitle ?? 'Dedicated to delivering state-of-the-art web technology, digital marketing expertise, and visual elegance.' }}</p>
            </div>
        </div>
    </section>

    <!-- About Detail Section -->
    <section class="about-section">
        <div class="auto-container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12">
                    <div class="sec-title">
                        <span class="sub-title">{{ $story->badge ?? 'Our Story & Mission' }}</span>
                        <h2>{{ $story->title ?? 'Transforming Ideas into Digital Reality' }}</h2>
                        <p class="text-muted">{{ $story->subtitle ?? 'At MS Solutions, we craft custom web systems, mobile applications, and digital marketing strategies designed to give your enterprise a distinct competitive edge.' }}</p>
                    </div>
                    <div class="row g-4 mt-2">
                        <div class="col-md-6">
                            <div class="p-3 border rounded-3 bg-light">
                                <h4 class="h5 fw-bold text-dark mb-2"><i class="fa fa-bullseye text-info me-2"></i> {{ $story->extra_data['mission_title'] ?? 'Our Mission' }}</h4>
                                <p class="small text-muted mb-0">{{ $story->extra_data['mission_text'] ?? 'To empower businesses worldwide with responsive, secure, and profit-generating web solutions.' }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3 border rounded-3 bg-light">
                                <h4 class="h5 fw-bold text-dark mb-2"><i class="fa fa-eye text-info me-2"></i> {{ $story->extra_data['vision_title'] ?? 'Our Vision' }}</h4>
                                <p class="small text-muted mb-0">{{ $story->extra_data['vision_text'] ?? 'To become the benchmark for quality, innovation, and client satisfaction in digital development.' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 mt-4 mt-lg-0">
                    <div class="about-image-box">
                        <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=800&q=80" alt="About MS Solutions">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Counter Banner -->
    <section class="py-5 bg-dark text-white">
        <div class="auto-container">
            <div class="row text-center g-4">
                <div class="col-md-3 col-6">
                    <div class="display-5 fw-bold text-info">100+</div>
                    <div class="text-muted small mt-1">Websites Delivered</div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="display-5 fw-bold text-info">99%</div>
                    <div class="text-muted small mt-1">Client Satisfaction</div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="display-5 fw-bold text-info">5+</div>
                    <div class="text-muted small mt-1">Years Experience</div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="display-5 fw-bold text-info">24/7</div>
                    <div class="text-muted small mt-1">Dedicated Support</div>
                </div>
            </div>
        </div>
    </section>
@endsection
