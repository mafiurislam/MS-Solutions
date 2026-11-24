@extends('layouts.app')

@section('title', ($sections['home_hero']->title ?? 'MS Solutions – Professional Web Design & Digital Growth Solutions'))

@section('content')
    @php
        $hero = $sections['home_hero'] ?? null;
        $coreServices = $sections['home_services_5'] ?? null;
        $about = $sections['home_about'] ?? null;
        $techTabs = $sections['home_tech_tabs'] ?? null;
        $portfolioSec = $sections['home_portfolio'] ?? null;
        $contactSec = $sections['home_contact'] ?? null;
        $faqSec = $sections['home_faq'] ?? null;
        $globalSec = $sections['home_global'] ?? null;
        $clientsSec = $sections['home_clients'] ?? null;
    @endphp

    <!-- Hero Section -->
    <section class="hero-slider-section">
        <div class="auto-container">
            <div class="hero-content">
                @if($hero && $hero->badge)
                    <span class="sub-title">{{ $hero->badge }}</span>
                @else
                    <span class="sub-title">Your Digital Growth Partner</span>
                @endif

                <h1>{{ $hero->title ?? 'Empowering Businesses with Cutting-Edge Digital Solutions' }}</h1>
                <p>{{ $hero->subtitle ?? 'We deliver high-impact web development, custom software solutions, digital marketing, and user-centric designs that scale your business online.' }}</p>
                <div class="btn-group-hero">
                    <a href="{{ $hero->button_link ?? route('contact') }}" class="theme-btn btn-style-one">{{ $hero->button_text ?? 'Get Started Today' }}</a>
                    <a href="{{ $hero->extra_data['whatsapp_btn_link'] ?? ('https://wa.me/' . ($siteSettings['whatsapp_number'] ?? '919382559266') . '?text=Hi%2C+I+want+to+know+more+about+MS+Solutions+services.') }}" target="_blank" class="theme-btn btn-style-outline">
                        <i class="fab fa-whatsapp me-2"></i> {{ $hero->extra_data['whatsapp_btn_text'] ?? 'WhatsApp Us' }}
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Recent Work Portfolio Showcase (Moved right after Banner) -->
    <section class="projects-section-home3" style="padding-top: 60px;">
        <div class="auto-container">
            <div class="sec-title text-center">
                <span class="sub-title">{{ $portfolioSec->badge ?? 'OUR PORTFOLIO' }}</span>
                <h2>{{ $portfolioSec->title ?? 'Our Recent Work' }}</h2>
                @if($portfolioSec && $portfolioSec->subtitle)
                    <p class="text-muted">{{ $portfolioSec->subtitle }}</p>
                @endif
            </div>
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
                        <p>No portfolios available yet.</p>
                    </div>
                @endforelse
            </div>
            <div class="text-center mt-5">
                <a href="{{ route('portfolios') }}" class="theme-btn btn-style-one">View All Portfolios <i class="fa fa-arrow-right ms-2"></i></a>
            </div>
        </div>
    </section>

    <!-- 5 Core Feature Blocks -->
    <section class="services-section-home3">
        <div class="auto-container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 justify-content-center">
                @if(isset($coreServices->extra_data['items']) && is_array($coreServices->extra_data['items']))
                    @foreach($coreServices->extra_data['items'] as $item)
                        <div class="col service-block-new-3">
                            <div class="inner-box">
                                <i class="icon {{ $item['icon'] ?? 'fa fa-cube' }}"></i>
                                <h3 class="title"><a href="{{ route('services') }}">{{ $item['title'] ?? '' }}</a></h3>
                                <div class="text">{{ $item['text'] ?? '' }}</div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col service-block-new-3">
                        <div class="inner-box">
                            <i class="icon fa fa-cube"></i>
                            <h3 class="title"><a href="{{ route('services') }}">Product Crafting</a></h3>
                            <div class="text">Custom product development tailored for your business.</div>
                        </div>
                    </div>
                    <div class="col service-block-new-3">
                        <div class="inner-box">
                            <i class="icon fa fa-bullhorn"></i>
                            <h3 class="title"><a href="{{ route('services') }}">Digital Marketing</a></h3>
                            <div class="text">Strategic online marketing to boost engagement and growth.</div>
                        </div>
                    </div>
                    <div class="col service-block-new-3">
                        <div class="inner-box">
                            <i class="icon fa fa-shield-alt"></i>
                            <h3 class="title"><a href="{{ route('services') }}">Security System</a></h3>
                            <div class="text">Advanced enterprise web security and protection.</div>
                        </div>
                    </div>
                    <div class="col service-block-new-3">
                        <div class="inner-box">
                            <i class="icon fa fa-paint-brush"></i>
                            <h3 class="title"><a href="{{ route('services') }}">UI/UX Designing</a></h3>
                            <div class="text">Intuitive, modern interfaces built for user engagement.</div>
                        </div>
                    </div>
                    <div class="col service-block-new-3">
                        <div class="inner-box">
                            <i class="icon fa fa-chart-line"></i>
                            <h3 class="title"><a href="{{ route('services') }}">Data Analysis</a></h3>
                            <div class="text">Actionable business intelligence and performance data.</div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Get to Know Us Section -->
    <section class="about-section">
        <div class="auto-container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12">
                    <div class="sec-title">
                        <span class="sub-title">{{ $about->badge ?? 'Get to Know Us' }}</span>
                        <h2>{{ $about->title ?? 'We Are MS Solutions – Your Digital Partner' }}</h2>
                        <p class="text-muted">{{ $about->subtitle ?? 'MS Solutions is a premier digital agency specializing in website development, digital marketing, and modern web design. We help businesses establish a powerful online presence with innovative technology and dedicated support.' }}</p>
                    </div>
                    <div class="about-info-box">
                        <div class="icon"><i class="{{ $about->extra_data['feature_1_icon'] ?? 'fa fa-chart-pie' }}"></i></div>
                        <div>
                            <h4 class="title">{{ $about->extra_data['feature_1_title'] ?? 'Leading in Digital Marketing' }}</h4>
                            <div class="text">{{ $about->extra_data['feature_1_desc'] ?? 'We apply industry best practices and automated strategies to maximize your ROI.' }}</div>
                        </div>
                    </div>
                    <div class="about-info-box">
                        <div class="icon"><i class="{{ $about->extra_data['feature_2_icon'] ?? 'fa fa-code' }}"></i></div>
                        <div>
                            <h4 class="title">{{ $about->extra_data['feature_2_title'] ?? 'Expert Development Team' }}</h4>
                            <div class="text">{{ $about->extra_data['feature_2_desc'] ?? 'Custom web applications engineered for high performance, security, and scalability.' }}</div>
                        </div>
                    </div>
                    <a href="{{ $about->button_link ?? route('contact') }}" class="theme-btn btn-style-one mt-3">{{ $about->button_text ?? 'Get in Touch' }}</a>
                </div>
                <div class="col-lg-6 col-md-12 mt-4 mt-lg-0">
                    <div class="about-image-box">
                        <img src="{{ $about->image_url ?? 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=800&q=80' }}" alt="MS Solutions Team">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Interactive Tech Stack Tabs Section -->
    <section class="interactive-services-section">
        <div class="auto-container">
            <div class="sec-title text-center">
                <span class="sub-title">{{ $techTabs->badge ?? 'TECHNICAL EXPERTISE' }}</span>
                <h2>{{ $techTabs->title ?? 'Our Specialized Expertise & Technology Stack' }}</h2>
                <p class="text-muted">{{ $techTabs->subtitle ?? 'Explore our core service domains and the modern technologies we leverage to drive your digital growth.' }}</p>
            </div>

            <div class="services-tab-main-box">
                <div class="row g-0">
                    <div class="col-lg-3 side-tab-column">
                        <div class="premium-tab-item active" data-tab="service-web">
                            <i class="fa fa-code"></i>
                            <span>Web Development</span>
                        </div>
                        <div class="premium-tab-item" data-tab="service-marketing">
                            <i class="fa fa-bullhorn"></i>
                            <span>Digital Marketing</span>
                        </div>
                        <div class="premium-tab-item" data-tab="service-ui">
                            <i class="fa fa-paint-brush"></i>
                            <span>UI/UX Designing</span>
                        </div>
                        <div class="premium-tab-item" data-tab="service-seo">
                            <i class="fa fa-search"></i>
                            <span>SEO Optimization</span>
                        </div>
                        <div class="premium-tab-item" data-tab="service-security">
                            <i class="fa fa-shield-alt"></i>
                            <span>Security System</span>
                        </div>
                    </div>

                    <div class="col-lg-9 tab-content-column">
                        <!-- Tab 1: Web Dev -->
                        <div class="premium-content-panel active" id="service-web">
                            <h3>Website Development</h3>
                            <p class="text-muted mb-4">Engineering high-speed, secure web applications, e-commerce stores, and enterprise portals using cutting-edge frameworks.</p>
                            <div class="row g-3">
                                <div class="col-md-6"><div class="tech-card"><div class="tech-logo">PHP</div><div class="tech-info"><div class="tech-name">Laravel / PHP</div><div class="tech-subtitle">Backend Architecture</div></div></div></div>
                                <div class="col-md-6"><div class="tech-card"><div class="tech-logo">WP</div><div class="tech-info"><div class="tech-name">WordPress / Woo</div><div class="tech-subtitle">CMS & E-Commerce</div></div></div></div>
                                <div class="col-md-6"><div class="tech-card"><div class="tech-logo">JS</div><div class="tech-info"><div class="tech-name">React / Vue</div><div class="tech-subtitle">Dynamic Interfaces</div></div></div></div>
                                <div class="col-md-6"><div class="tech-card"><div class="tech-logo">SQL</div><div class="tech-info"><div class="tech-name">MySQL / SQLite</div><div class="tech-subtitle">Database Design</div></div></div></div>
                            </div>
                            <a href="https://wa.me/{{ $siteSettings['whatsapp_number'] ?? '919382559266' }}?text=Hi%2C+I+am+interested+in+Web+Development+service." target="_blank" class="premium-btn-whatsapp"><i class="fab fa-whatsapp"></i> Chat on WhatsApp</a>
                        </div>

                        <!-- Tab 2: Marketing -->
                        <div class="premium-content-panel" id="service-marketing">
                            <h3>Digital Marketing</h3>
                            <p class="text-muted mb-4">Strategic data-driven campaigns maximizing engagement, reach, customer acquisition, and high return on investment.</p>
                            <div class="row g-3">
                                <div class="col-md-6"><div class="tech-card"><div class="tech-logo">FB</div><div class="tech-info"><div class="tech-name">Meta Ads Manager</div><div class="tech-subtitle">FB & IG Campaigns</div></div></div></div>
                                <div class="col-md-6"><div class="tech-card"><div class="tech-logo">GA</div><div class="tech-info"><div class="tech-name">Google Ads / PPC</div><div class="tech-subtitle">Search & Display</div></div></div></div>
                                <div class="col-md-6"><div class="tech-card"><div class="tech-logo">EM</div><div class="tech-info"><div class="tech-name">Email Marketing</div><div class="tech-subtitle">Automation & Funnels</div></div></div></div>
                                <div class="col-md-6"><div class="tech-card"><div class="tech-logo">AN</div><div class="tech-info"><div class="tech-name">Google Analytics 4</div><div class="tech-subtitle">Conversion Tracking</div></div></div></div>
                            </div>
                            <a href="https://wa.me/{{ $siteSettings['whatsapp_number'] ?? '919382559266' }}?text=Hi%2C+I+am+interested+in+Digital+Marketing+service." target="_blank" class="premium-btn-whatsapp"><i class="fab fa-whatsapp"></i> Chat on WhatsApp</a>
                        </div>

                        <!-- Tab 3: UI/UX -->
                        <div class="premium-content-panel" id="service-ui">
                            <h3>UI/UX Designing</h3>
                            <p class="text-muted mb-4">User-centered research and visually stunning interfaces designed for smooth customer journeys and conversions.</p>
                            <div class="row g-3">
                                <div class="col-md-6"><div class="tech-card"><div class="tech-logo">FG</div><div class="tech-info"><div class="tech-name">Figma</div><div class="tech-subtitle">Wireframing & Prototyping</div></div></div></div>
                                <div class="col-md-6"><div class="tech-card"><div class="tech-logo">PS</div><div class="tech-info"><div class="tech-name">Photoshop / Illustrator</div><div class="tech-subtitle">Vector & Graphic Assets</div></div></div></div>
                                <div class="col-md-6"><div class="tech-card"><div class="tech-logo">DS</div><div class="tech-info"><div class="tech-name">Design Systems</div><div class="tech-subtitle">Consistent UI Libraries</div></div></div></div>
                                <div class="col-md-6"><div class="tech-card"><div class="tech-logo">MR</div><div class="tech-info"><div class="tech-name">Mobile First Design</div><div class="tech-subtitle">Responsive Grids</div></div></div></div>
                            </div>
                            <a href="https://wa.me/{{ $siteSettings['whatsapp_number'] ?? '919382559266' }}?text=Hi%2C+I+am+interested+in+UI/UX+Designing+service." target="_blank" class="premium-btn-whatsapp"><i class="fab fa-whatsapp"></i> Chat on WhatsApp</a>
                        </div>

                        <!-- Tab 4: SEO -->
                        <div class="premium-content-panel" id="service-seo">
                            <h3>SEO Optimization</h3>
                            <p class="text-muted mb-4">Comprehensive organic growth tactics that elevate your domain authority and drive qualified organic search traffic.</p>
                            <div class="row g-3">
                                <div class="col-md-6"><div class="tech-card"><div class="tech-logo">SC</div><div class="tech-info"><div class="tech-name">Google Search Console</div><div class="tech-subtitle">Indexing & Monitoring</div></div></div></div>
                                <div class="col-md-6"><div class="tech-card"><div class="tech-logo">SM</div><div class="tech-info"><div class="tech-name">Semrush / Ahrefs</div><div class="tech-subtitle">Keyword & Competitor Intel</div></div></div></div>
                                <div class="col-md-6"><div class="tech-card"><div class="tech-logo">OP</div><div class="tech-info"><div class="tech-name">On-Page Schema</div><div class="tech-subtitle">Structured JSON-LD Data</div></div></div></div>
                                <div class="col-md-6"><div class="tech-card"><div class="tech-logo">CW</div><div class="tech-info"><div class="tech-name">Core Web Vitals</div><div class="tech-subtitle">Page Speed & Optimization</div></div></div></div>
                            </div>
                            <a href="https://wa.me/{{ $siteSettings['whatsapp_number'] ?? '919382559266' }}?text=Hi%2C+I+am+interested+in+SEO+Optimization+service." target="_blank" class="premium-btn-whatsapp"><i class="fab fa-whatsapp"></i> Chat on WhatsApp</a>
                        </div>

                        <!-- Tab 5: Security -->
                        <div class="premium-content-panel" id="service-security">
                            <h3>Security System</h3>
                            <p class="text-muted mb-4">Hardening web infrastructure against malware, cyber threats, and DDoS vectors.</p>
                            <div class="row g-3">
                                <div class="col-md-6"><div class="tech-card"><div class="tech-logo">CF</div><div class="tech-info"><div class="tech-name">Cloudflare</div><div class="tech-subtitle">WAF & DDoS Protection</div></div></div></div>
                                <div class="col-md-6"><div class="tech-card"><div class="tech-logo">SSL</div><div class="tech-info"><div class="tech-name">OpenSSL</div><div class="tech-subtitle">End-to-End Encryption</div></div></div></div>
                                <div class="col-md-6"><div class="tech-card"><div class="tech-logo">SN</div><div class="tech-info"><div class="tech-name">Snyk</div><div class="tech-subtitle">Vulnerability Scan</div></div></div></div>
                                <div class="col-md-6"><div class="tech-card"><div class="tech-logo">FW</div><div class="tech-info"><div class="tech-name">Firewall Guard</div><div class="tech-subtitle">System Shield</div></div></div></div>
                            </div>
                            <a href="https://wa.me/{{ $siteSettings['whatsapp_number'] ?? '919382559266' }}?text=Hi%2C+I+am+interested+in+Security+System+service." target="_blank" class="premium-btn-whatsapp"><i class="fab fa-whatsapp"></i> Chat on WhatsApp</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Galaxy Card Contact Form -->
    <section class="contact-section">
        <div class="auto-container">
            <div class="sec-title text-center">
                <span class="sub-title">{{ $contactSec->badge ?? 'GET IN TOUCH' }}</span>
                <h2>{{ $contactSec->title ?? "Let's Work Together" }}</h2>
                <p class="text-success fw-medium"><i class="fab fa-whatsapp me-2"></i> {{ $contactSec->subtitle ?? 'Your message will be sent directly via WhatsApp to our team' }}</p>
            </div>
            <div class="galaxy-card">
                <div class="stars-container">
                    <div class="star star-1"></div>
                    <div class="star star-2"></div>
                </div>
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

    <!-- FAQ Section -->
    <section class="faq-section-home1">
        <div class="auto-container">
            <div class="sec-title text-center">
                <span class="sub-title">{{ $faqSec->badge ?? 'QUESTIONS & ANSWERS' }}</span>
                <h2>{{ $faqSec->title ?? 'Frequently Asked Questions' }}</h2>
                @if($faqSec && $faqSec->subtitle)
                    <p class="text-muted">{{ $faqSec->subtitle }}</p>
                @endif
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="accordion" id="faqAccordion">
                        @foreach($faqs as $index => $faq)
                            <div class="accordion-item">
                                <h3 class="accordion-header" id="faqHeading{{ $faq->id }}">
                                    <button class="accordion-button {{ $index > 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse{{ $faq->id }}">
                                        {{ $faq->question }}
                                    </button>
                                </h3>
                                <div id="faqCollapse{{ $faq->id }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" data-bs-parent="#faqAccordion">
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

    <!-- Serving In Flag Grid Section -->
    <section class="serving-in-section">
        <div class="auto-container">
            <div class="sec-title text-center">
                <h2>{{ $globalSec->title ?? 'We Are Serving Globally' }}</h2>
            </div>
            <div class="flag-grid">
                <div class="flag-block"><img src="https://flagcdn.com/w80/in.png" alt="India"><span class="country-name">India</span></div>
                <div class="flag-block"><img src="https://flagcdn.com/w80/us.png" alt="USA"><span class="country-name">USA</span></div>
                <div class="flag-block"><img src="https://flagcdn.com/w80/gb.png" alt="UK"><span class="country-name">UK</span></div>
                <div class="flag-block"><img src="https://flagcdn.com/w80/ae.png" alt="UAE"><span class="country-name">UAE</span></div>
                <div class="flag-block"><img src="https://flagcdn.com/w80/ca.png" alt="Canada"><span class="country-name">Canada</span></div>
                <div class="flag-block"><img src="https://flagcdn.com/w80/de.png" alt="Germany"><span class="country-name">Germany</span></div>
                <div class="flag-block"><img src="https://flagcdn.com/w80/au.png" alt="Australia"><span class="country-name">Australia</span></div>
                <div class="flag-block"><img src="https://flagcdn.com/w80/jp.png" alt="Japan"><span class="country-name">Japan</span></div>
            </div>
        </div>
    </section>

    <!-- Client Logos Section -->
    <section class="clients-section">
        <div class="auto-container">
            <div class="clients-grid">
                @if(isset($clientsSec->extra_data['clients']) && is_array($clientsSec->extra_data['clients']))
                    @foreach($clientsSec->extra_data['clients'] as $client)
                        <div class="client-logo-item">{{ $client }}</div>
                    @endforeach
                @else
                    <div class="client-logo-item">TechStart</div>
                    <div class="client-logo-item">DigitalHub</div>
                    <div class="client-logo-item">GrowthAgency</div>
                    <div class="client-logo-item">EduTech Pro</div>
                    <div class="client-logo-item">GlobalConnect</div>
                @endif
            </div>
        </div>
    </section>
@endsection
