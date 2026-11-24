<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'MS Solutions – Professional Web Design & Digital Growth Solutions')</title>
    <meta name="description" content="@yield('meta_description', 'MS Solutions – Professional Website Development, Digital Marketing & UI/UX Design Services')">
    <meta name="keywords" content="website development, digital marketing, web designing, SEO services, MS Solutions">
    <meta name="theme-color" content="#01D8E1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Bootstrap CSS & Main CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    @stack('styles')
</head>
<body>

    <div class="page-wrapper">
        <!-- Main Header -->
        <header class="main-header">
            <!-- Header Top -->
            <div class="header-top">
                <div class="auto-container">
                    <div class="inner-container">
                        <div class="top-left">
                            <ul class="list-style-one">
                                <li><i class="fa fa-envelope"></i> <a href="mailto:{{ $siteSettings['contact_email'] ?? 'mssolutions101@gmail.com' }}">{{ $siteSettings['contact_email'] ?? 'mssolutions101@gmail.com' }}</a></li>
                                <li><i class="fa fa-map-marker-alt"></i> {{ $siteSettings['contact_address'] ?? 'Kolkata, West Bengal, India' }}</li>
                            </ul>
                        </div>
                        <div class="top-right">
                            <ul class="useful-links">
                                <li><a href="{{ route('about') }}">About</a></li>
                                <li><a href="{{ route('faq') }}">FAQ</a></li>
                                <li><a href="{{ route('contact') }}">Contact</a></li>
                                @auth
                                    <li><a href="{{ route('admin.dashboard') }}" class="text-warning fw-bold"><i class="fa fa-gauge me-1"></i> Admin</a></li>
                                @else
                                    <li><a href="{{ route('login') }}"><i class="fa fa-lock me-1"></i> Login</a></li>
                                @endauth
                            </ul>
                            <ul class="social-icon-one">
                                <li><a href="{{ $siteSettings['facebook_url'] ?? '#' }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="{{ $siteSettings['twitter_url'] ?? '#' }}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="{{ $siteSettings['instagram_url'] ?? '#' }}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="{{ $siteSettings['linkedin_url'] ?? '#' }}" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="header-lower">
                <div class="auto-container">
                    <div class="main-box">
                        <div class="logo-box">
                            <a href="{{ route('home') }}"><img src="{{ asset('images/logo.svg') }}" alt="{{ $siteSettings['site_title'] ?? 'MS Solutions' }}"></a>
                        </div>
                        <div class="nav-outer">
                            <nav class="main-menu">
                                <ul class="navigation">
                                    <li class="{{ request()->routeIs('home') ? 'current' : '' }}"><a href="{{ route('home') }}">Home</a></li>
                                    <li class="dropdown {{ request()->routeIs('about') || request()->routeIs('testimonials') || request()->routeIs('faq') ? 'current' : '' }}"><a href="#">Pages</a>
                                        <ul>
                                            <li><a href="{{ route('about') }}">About Us</a></li>
                                            <li><a href="{{ route('testimonials') }}">Testimonials</a></li>
                                            <li><a href="{{ route('faq') }}">FAQ</a></li>
                                        </ul>
                                    </li>
                                    <li class="{{ request()->routeIs('services') ? 'current' : '' }}"><a href="{{ route('services') }}">Services</a></li>
                                    <li class="{{ request()->routeIs('portfolios') ? 'current' : '' }}"><a href="{{ route('portfolios') }}">Portfolios</a></li>
                                    <li class="{{ request()->routeIs('blog') ? 'current' : '' }}"><a href="{{ route('blog') }}">Blog</a></li>
                                    <li class="{{ request()->routeIs('contact') ? 'current' : '' }}"><a href="{{ route('contact') }}">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="outer-box">
                            <a href="tel:{{ $siteSettings['contact_phone'] ?? '9382559266' }}" class="info-btn">
                                <i class="fa fa-phone"></i>
                                <div class="info-text">
                                    <small>Call Anytime</small>
                                    {{ $siteSettings['contact_phone'] ?? '9382559266' }}
                                </div>
                            </a>
                            <div class="mobile-nav-toggler"><i class="fa fa-bars"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Mobile Drawer -->
        <div class="menu-backdrop"></div>
        <div class="mobile-menu">
            <div class="upper-box">
                <div class="nav-logo"><a href="{{ route('home') }}"><img src="{{ asset('images/logo.svg') }}" alt="{{ $siteSettings['site_title'] ?? 'MS Solutions' }}"></a></div>
                <div class="close-btn"><i class="fa fa-times"></i></div>
            </div>
            <ul class="navigation">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('about') }}">About Us</a></li>
                <li><a href="{{ route('services') }}">Services</a></li>
                <li><a href="{{ route('portfolios') }}">Portfolios</a></li>
                <li><a href="{{ route('blog') }}">Blog</a></li>
                <li><a href="{{ route('faq') }}">FAQ</a></li>
                <li><a href="{{ route('testimonials') }}">Testimonials</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
                @auth
                    <li><a href="{{ route('admin.dashboard') }}" class="text-warning">Admin Dashboard</a></li>
                @else
                    <li><a href="{{ route('login') }}">Admin Login</a></li>
                @endauth
            </ul>
            <div class="contact-info-box">
                <span class="title">Call Now</span>
                <a href="tel:{{ $siteSettings['contact_phone'] ?? '9382559266' }}">{{ $siteSettings['contact_phone'] ?? '9382559266' }}</a>
            </div>
            <div class="contact-info-box">
                <span class="title">Send Email</span>
                <a href="mailto:{{ $siteSettings['contact_email'] ?? 'mssolutions101@gmail.com' }}">{{ $siteSettings['contact_email'] ?? 'mssolutions101@gmail.com' }}</a>
            </div>
        </div>

        <!-- Main Content Slot -->
        @yield('content')

        <!-- Main Footer -->
        <footer class="main-footer">
            <div class="auto-container">
                <div class="footer-upper">
                    <div class="row g-4">
                        <div class="col-lg-4 col-md-6">
                            <div class="footer-info-block">
                                <i class="fa fa-phone"></i>
                                <div>
                                    <span class="title">Call Anytime</span>
                                    <a href="tel:{{ $siteSettings['contact_phone'] ?? '9382559266' }}">{{ $siteSettings['contact_phone'] ?? '9382559266' }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="footer-info-block">
                                <i class="fa fa-envelope"></i>
                                <div>
                                    <span class="title">Send Email</span>
                                    <a href="mailto:{{ $siteSettings['contact_email'] ?? 'mssolutions101@gmail.com' }}">{{ $siteSettings['contact_email'] ?? 'mssolutions101@gmail.com' }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="footer-info-block">
                                <i class="fa fa-map-marker-alt"></i>
                                <div>
                                    <span class="title">Location</span>
                                    <a href="#">{{ $siteSettings['contact_address'] ?? 'Kolkata, West Bengal, India' }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row g-4">
                    <div class="col-lg-5 col-md-12">
                        <div class="footer-widget">
                            <img src="{{ asset('images/logo-white.svg') }}" alt="{{ $siteSettings['site_title'] ?? 'MS Solutions' }}" width="180" class="mb-3">
                            <p>{{ $siteSettings['footer_about'] ?? 'MS Solutions is a trusted digital agency offering web development, UI/UX designing, digital marketing, and software solutions.' }}</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h5>Quick Links</h5>
                            <ul>
                                <li><a href="{{ route('about') }}">About Us</a></li>
                                <li><a href="{{ route('services') }}">Services</a></li>
                                <li><a href="{{ route('portfolios') }}">Portfolios</a></li>
                                <li><a href="{{ route('contact') }}">Contact Us</a></li>
                                <li><a href="{{ route('admin.dashboard') }}">Admin Portal</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="footer-widget">
                            <h5>Our Services</h5>
                            <ul>
                                <li><a href="{{ route('services') }}">Web Development</a></li>
                                <li><a href="{{ route('services') }}">Digital Marketing</a></li>
                                <li><a href="{{ route('services') }}">UI/UX Designing</a></li>
                                <li><a href="{{ route('services') }}">SEO Optimization</a></li>
                                <li><a href="{{ route('services') }}">Security Systems</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="auto-container">
                    <p>{{ $siteSettings['copyright_text'] ?? '© 2026 MS Solutions. All Rights Reserved.' }}</p>
                </div>
            </div>
        </footer>

        <!-- Floating WhatsApp Widget & Scroll Top -->
        <a href="https://wa.me/{{ $siteSettings['whatsapp_number'] ?? '919382559266' }}" target="_blank" class="whatsapp-float" title="Chat on WhatsApp">
            <i class="fab fa-whatsapp"></i>
        </a>
        <div class="scroll-to-top"><i class="fa fa-angle-up"></i></div>
    </div>

    <!-- Bootstrap Bundle JS & Custom Main JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    @stack('scripts')
</body>
</html>
