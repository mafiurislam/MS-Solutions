@extends('layouts.app')

@section('title', 'Contact Us – MS Solutions')

@section('content')
    @php
        $hero = $sections['contact_hero'] ?? null;
    @endphp

    <!-- Banner -->
    <section class="hero-slider-section" style="padding: 60px 0;">
        <div class="auto-container">
            <div class="hero-content">
                <span class="sub-title">{{ $hero->badge ?? 'Reach Out' }}</span>
                <h1>{{ $hero->title ?? 'Contact MS Solutions' }}</h1>
                <p>{{ $hero->subtitle ?? "We are available 24/7 to discuss your project requirements and offer customized digital proposals." }}</p>
            </div>
        </div>
    </section>

    <!-- Contact Details & Form Section -->
    <section class="py-5">
        <div class="auto-container">
            <div class="row g-4 mb-5">
                <div class="col-md-4">
                    <div class="p-4 bg-white shadow-sm rounded-4 text-center border-top border-4 border-info h-100">
                        <i class="fa fa-phone fa-2x text-info mb-3"></i>
                        <h4 class="h5 fw-bold">Call Us Direct</h4>
                        <p class="text-muted small mb-2">Speak directly with our technical lead.</p>
                        <a href="tel:{{ $siteSettings['contact_phone'] ?? '9382559266' }}" class="text-dark fw-bold text-decoration-none">{{ $siteSettings['contact_phone'] ?? '9382559266' }}</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 bg-white shadow-sm rounded-4 text-center border-top border-4 border-info h-100">
                        <i class="fa fa-envelope fa-2x text-info mb-3"></i>
                        <h4 class="h5 fw-bold">Email Inquiries</h4>
                        <p class="text-muted small mb-2">Send your RFPs or detailed specs.</p>
                        <a href="mailto:{{ $siteSettings['contact_email'] ?? 'mssolutions101@gmail.com' }}" class="text-dark fw-bold text-decoration-none">{{ $siteSettings['contact_email'] ?? 'mssolutions101@gmail.com' }}</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 bg-white shadow-sm rounded-4 text-center border-top border-4 border-info h-100">
                        <i class="fa fa-map-marker-alt fa-2x text-info mb-3"></i>
                        <h4 class="h5 fw-bold">Our Headquarters</h4>
                        <p class="text-muted small mb-2">Visit our digital delivery center.</p>
                        <span class="text-dark fw-bold">{{ $siteSettings['contact_address'] ?? 'Kolkata, West Bengal, India' }}</span>
                    </div>
                </div>
            </div>

            <!-- Galaxy Contact Form -->
            <div class="sec-title text-center">
                <span class="sub-title">DIRECT MESSAGE</span>
                <h2>Send Us A Message</h2>
                <p class="text-success fw-medium"><i class="fab fa-whatsapp me-2"></i> Instant direct WhatsApp message dispatch enabled</p>
            </div>
            <div class="galaxy-card">
                <div class="stars-container">
                    <div class="star star-1"></div>
                    <div class="star star-2"></div>
                </div>
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                <form id="contact-form" action="{{ route('contact.submit') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6"><input type="text" name="name" class="form-control" placeholder="Full Name" required></div>
                        <div class="col-md-6"><input type="email" name="email" class="form-control" placeholder="Email Address" required></div>
                        <div class="col-md-6"><input type="tel" name="phone" class="form-control" placeholder="Phone Number" required></div>
                        <div class="col-md-6"><input type="text" name="subject" class="form-control" placeholder="Subject" required></div>
                        <div class="col-md-6">
                            <select name="website_type" class="form-control" required>
                                <option value="">Select Website Type</option>
                                <option value="Business Website">Business Website</option>
                                <option value="E-Commerce Website">E-Commerce Website</option>
                                <option value="School/College Website">School/College Website</option>
                                <option value="Hospital/Clinic Website">Hospital/Clinic Website</option>
                                <option value="Travel Agency Website">Travel Agency Website</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <select name="budget" class="form-control" required>
                                <option value="">Estimated Budget</option>
                                <option value="₹5,000 – ₹10,000">₹5,000 – ₹10,000</option>
                                <option value="₹10,000 – ₹25,000">₹10,000 – ₹25,000</option>
                                <option value="₹25,000 – ₹50,000">₹25,000 – ₹50,000</option>
                                <option value="₹50,000+">₹50,000+</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <textarea name="message" class="form-control" rows="4" placeholder="Your Message / Detailed Requirements" required></textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="theme-btn btn-style-one w-100"><i class="fab fa-whatsapp me-2"></i> Send Message on WhatsApp</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
