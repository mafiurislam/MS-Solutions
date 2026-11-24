@extends('layouts.app')

@section('title', 'FAQ – MS Solutions')

@section('content')
    @php
        $hero = $sections['faq_hero'] ?? null;
    @endphp

    <!-- Banner -->
    <section class="hero-slider-section" style="padding: 60px 0;">
        <div class="auto-container">
            <div class="hero-content">
                <span class="sub-title">{{ $hero->badge ?? 'Help Center' }}</span>
                <h1>{{ $hero->title ?? 'Frequently Asked Questions' }}</h1>
                <p>{{ $hero->subtitle ?? 'Answers to common questions about our custom web design, development, and marketing packages.' }}</p>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-5">
        <div class="auto-container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="accordion" id="faqPageAccordion">
                        @foreach($faqs as $index => $faq)
                            <div class="accordion-item">
                                <h3 class="accordion-header" id="faqHeadingP{{ $faq->id }}">
                                    <button class="accordion-button {{ $index > 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseP{{ $faq->id }}">
                                        {{ $faq->question }}
                                    </button>
                                </h3>
                                <div id="faqCollapseP{{ $faq->id }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" data-bs-parent="#faqPageAccordion">
                                    <div class="accordion-body">
                                        {{ $faq->answer }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
