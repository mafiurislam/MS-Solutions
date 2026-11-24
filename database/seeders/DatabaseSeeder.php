<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Portfolio;
use App\Models\PageSection;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\Faq;
use App\Models\Blog;
use App\Models\SiteSetting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Admin User
        User::updateOrCreate(
            ['username' => 'Mafiur'],
            [
                'name' => 'Mafiur',
                'email' => 'mafiur@mssolutions.com',
                'password' => Hash::make('12345678'),
                'is_admin' => true,
            ]
        );

        // 2. Portfolios
        $portfolios = [
            [
                'title' => 'Sundarban Safari Tours',
                'slug' => 'sundarban-safari-tours',
                'category' => 'Travel & Tourism',
                'image' => 'images/portfolio_sundarban.png',
                'project_url' => 'https://sundarbansafaritours.com/',
                'description' => 'A premier wildlife safari and eco-tourism booking portal built with modern booking workflows and high responsiveness.',
                'is_featured' => true,
                'order' => 1,
            ],
            [
                'title' => 'Kolkata Fast Travels',
                'slug' => 'kolkata-fast-travels',
                'category' => 'Transport & Booking',
                'image' => 'images/portfolio_kolkata_travels.png',
                'project_url' => 'https://kolkatafasttravels.com/',
                'description' => 'Cab booking and inter-city tour service website with instant fare calculation and quick WhatsApp reservation.',
                'is_featured' => true,
                'order' => 2,
            ],
            [
                'title' => 'Asha Nursery E-Store',
                'slug' => 'asha-nursery-e-store',
                'category' => 'E-Commerce',
                'image' => 'images/portfolio_asha_nursery.png',
                'project_url' => 'https://ashanursery.com/',
                'description' => 'Online nursery plant catalog and gardening ecommerce experience with integrated ordering and shipping details.',
                'is_featured' => true,
                'order' => 3,
            ],
            [
                'title' => 'Smile Foundation India',
                'slug' => 'smile-foundation-india',
                'category' => 'NGO & Charity',
                'image' => 'images/portfolio_smile_foundation.png',
                'project_url' => 'https://www.smilefoundationindia.org/',
                'description' => 'Comprehensive social welfare platform promoting child education, healthcare outreach, and transparent donations.',
                'is_featured' => true,
                'order' => 4,
            ],
            [
                'title' => 'Kisna Diamond & Jewelry',
                'slug' => 'kisna-diamond-jewelry',
                'category' => 'Luxury E-Commerce',
                'image' => 'images/portfolio_kisna.png',
                'project_url' => 'https://www.kisna.com/',
                'description' => 'Luxury certified diamond and gold jewelry storefront featuring rich product showcases and filterable catalogs.',
                'is_featured' => true,
                'order' => 5,
            ],
            [
                'title' => 'SPAR India Hypermarket',
                'slug' => 'spar-india-hypermarket',
                'category' => 'Retail Hypermarket',
                'image' => 'images/portfolio_spar_india.png',
                'project_url' => 'https://www.sparindia.com/',
                'description' => 'Hypermarket online presence displaying weekly deals, department categories, store locators, and customer loyalty promotions.',
                'is_featured' => true,
                'order' => 6,
            ],
        ];

        foreach ($portfolios as $p) {
            Portfolio::updateOrCreate(['title' => $p['title']], $p);
        }

        // 3. Page Sections
        $sections = [
            // HOME: Hero
            [
                'page' => 'home',
                'section_key' => 'home_hero',
                'section_name' => 'Hero Banner Section',
                'badge' => 'Your Digital Growth Partner',
                'title' => 'Empowering Businesses with Cutting-Edge Digital Solutions',
                'subtitle' => 'We deliver high-impact web development, custom software solutions, digital marketing, and user-centric designs that scale your business online.',
                'button_text' => 'Get Started Today',
                'button_link' => '/contact',
                'extra_data' => [
                    'whatsapp_btn_text' => 'WhatsApp Us',
                    'whatsapp_btn_link' => 'https://wa.me/919382559266?text=Hi%2C+I+want+to+know+more+about+MS+Solutions+services.',
                ],
                'order' => 1,
            ],
            // HOME: Portfolio (Immediately after Hero)
            [
                'page' => 'home',
                'section_key' => 'home_portfolio',
                'section_name' => 'Recent Portfolio Showcase',
                'badge' => 'OUR PORTFOLIO',
                'title' => 'Our Recent Work',
                'subtitle' => 'Take a look at custom web applications, e-commerce stores, and digital campaigns we have delivered.',
                'order' => 2,
            ],
            // HOME: 5 Core Feature Blocks
            [
                'page' => 'home',
                'section_key' => 'home_services_5',
                'section_name' => '5 Core Feature Blocks',
                'badge' => 'WHAT WE SPECIALIZE IN',
                'title' => 'Our Core Digital Capabilities',
                'subtitle' => 'Specialized offerings engineered for rapid growth',
                'extra_data' => [
                    'items' => [
                        ['icon' => 'fa fa-cube', 'title' => 'Product Crafting', 'text' => 'Custom product development tailored for your business.'],
                        ['icon' => 'fa fa-bullhorn', 'title' => 'Digital Marketing', 'text' => 'Strategic online marketing to boost engagement and growth.'],
                        ['icon' => 'fa fa-shield-alt', 'title' => 'Security System', 'text' => 'Advanced enterprise web security and protection.'],
                        ['icon' => 'fa fa-paint-brush', 'title' => 'UI/UX Designing', 'text' => 'Intuitive, modern interfaces built for user engagement.'],
                        ['icon' => 'fa fa-chart-line', 'title' => 'Data Analysis', 'text' => 'Actionable business intelligence and performance data.'],
                    ]
                ],
                'order' => 3,
            ],
            // HOME: About Us
            [
                'page' => 'home',
                'section_key' => 'home_about',
                'section_name' => 'Get to Know Us Section',
                'badge' => 'Get to Know Us',
                'title' => 'We Are MS Solutions – Your Digital Partner',
                'subtitle' => 'MS Solutions is a premier digital agency specializing in website development, digital marketing, and modern web design. We help businesses establish a powerful online presence with innovative technology and dedicated support.',
                'image' => 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=800&q=80',
                'button_text' => 'Get in Touch',
                'button_link' => '/contact',
                'extra_data' => [
                    'feature_1_icon' => 'fa fa-chart-pie',
                    'feature_1_title' => 'Leading in Digital Marketing',
                    'feature_1_desc' => 'We apply industry best practices and automated strategies to maximize your ROI.',
                    'feature_2_icon' => 'fa fa-code',
                    'feature_2_title' => 'Expert Development Team',
                    'feature_2_desc' => 'Custom web applications engineered for high performance, security, and scalability.',
                ],
                'order' => 4,
            ],
            // HOME: Tech Tabs
            [
                'page' => 'home',
                'section_key' => 'home_tech_tabs',
                'section_name' => 'Technical Expertise & Tech Stack',
                'badge' => 'TECHNICAL EXPERTISE',
                'title' => 'Our Specialized Expertise & Technology Stack',
                'subtitle' => 'Explore our core service domains and the modern technologies we leverage to drive your digital growth.',
                'order' => 5,
            ],
            // HOME: Contact Section
            [
                'page' => 'home',
                'section_key' => 'home_contact',
                'section_name' => 'Galaxy Card Contact Form',
                'badge' => 'GET IN TOUCH',
                'title' => "Let's Work Together",
                'subtitle' => 'Your message will be sent directly via WhatsApp to our team',
                'order' => 6,
            ],
            // HOME: FAQ
            [
                'page' => 'home',
                'section_key' => 'home_faq',
                'section_name' => 'Home FAQ Section',
                'badge' => 'QUESTIONS & ANSWERS',
                'title' => 'Frequently Asked Questions',
                'subtitle' => 'Everything you need to know about working with MS Solutions',
                'order' => 7,
            ],
            // HOME: Global Serving
            [
                'page' => 'home',
                'section_key' => 'home_global',
                'section_name' => 'Serving Globally Section',
                'title' => 'We Are Serving Globally',
                'subtitle' => 'Delivering robust digital experiences across global markets.',
                'order' => 8,
            ],
            // HOME: Clients
            [
                'page' => 'home',
                'section_key' => 'home_clients',
                'section_name' => 'Client Logos Section',
                'title' => 'Trusted By Leading Companies',
                'extra_data' => [
                    'clients' => ['TechStart', 'DigitalHub', 'GrowthAgency', 'EduTech Pro', 'GlobalConnect']
                ],
                'order' => 9,
            ],
            // ABOUT PAGE: Hero
            [
                'page' => 'about',
                'section_key' => 'about_hero',
                'section_name' => 'About Page Banner',
                'badge' => 'Who We Are',
                'title' => 'About MS Solutions',
                'subtitle' => 'Dedicated to delivering state-of-the-art web technology, digital marketing expertise, and visual elegance.',
                'order' => 1,
            ],
            // ABOUT PAGE: Mission & Vision
            [
                'page' => 'about',
                'section_key' => 'about_story',
                'section_name' => 'Mission & Vision Story',
                'badge' => 'Our Story & Mission',
                'title' => 'Transforming Ideas into Digital Reality',
                'subtitle' => 'At MS Solutions, we craft custom web systems, mobile applications, and digital marketing strategies designed to give your enterprise a distinct competitive edge.',
                'extra_data' => [
                    'mission_title' => 'Our Mission',
                    'mission_text' => 'To empower businesses worldwide with responsive, secure, and profit-generating web solutions.',
                    'vision_title' => 'Our Vision',
                    'vision_text' => 'To become the benchmark for quality, innovation, and client satisfaction in digital development.',
                ],
                'order' => 2,
            ],
            // SERVICES PAGE: Hero
            [
                'page' => 'services',
                'section_key' => 'services_hero',
                'section_name' => 'Services Page Banner',
                'badge' => 'What We Offer',
                'title' => 'Our Specialized Services',
                'subtitle' => 'End-to-end digital solutions designed to grow your audience, secure your platforms, and boost revenues.',
                'order' => 1,
            ],
            // PORTFOLIOS PAGE: Hero
            [
                'page' => 'portfolios',
                'section_key' => 'portfolios_hero',
                'section_name' => 'Portfolios Page Banner',
                'badge' => 'Our Work',
                'title' => 'Recent Projects & Portfolios',
                'subtitle' => "Take a look at some of the recent custom web applications, e-commerce stores, and digital campaigns we've built.",
                'order' => 1,
            ],
            // BLOG PAGE: Hero
            [
                'page' => 'blog',
                'section_key' => 'blog_hero',
                'section_name' => 'Blog Page Banner',
                'badge' => 'Our Insights',
                'title' => 'Latest Articles & Digital Growth Insights',
                'subtitle' => 'Industry insights, web technology updates, and digital marketing tutorials from our engineering team.',
                'order' => 1,
            ],
            // TESTIMONIALS PAGE: Hero
            [
                'page' => 'testimonials',
                'section_key' => 'testimonials_hero',
                'section_name' => 'Testimonials Page Banner',
                'badge' => 'Testimonials',
                'title' => 'Client Success Stories',
                'subtitle' => 'See what our global partners and satisfied clients have to say about working with MS Solutions.',
                'order' => 1,
            ],
            // FAQ PAGE: Hero
            [
                'page' => 'faq',
                'section_key' => 'faq_hero',
                'section_name' => 'FAQ Page Banner',
                'badge' => 'Got Questions?',
                'title' => 'Frequently Asked Questions',
                'subtitle' => 'Quick answers to common questions about our custom web design, development, and marketing packages.',
                'order' => 1,
            ],
            // CONTACT PAGE: Hero
            [
                'page' => 'contact',
                'section_key' => 'contact_hero',
                'section_name' => 'Contact Page Banner',
                'badge' => 'Reach Out',
                'title' => 'Contact MS Solutions',
                'subtitle' => "We are available 24/7 to discuss your project requirements and offer customized digital proposals.",
                'order' => 1,
            ],
        ];

        foreach ($sections as $sec) {
            PageSection::updateOrCreate(['section_key' => $sec['section_key']], $sec);
        }

        // 4. Services
        $services = [
            [
                'title' => 'Website Development',
                'slug' => 'website-development',
                'icon' => 'fa fa-code',
                'short_description' => 'High-speed, responsive, custom-coded websites built with modern frameworks and robust CMS backend management.',
                'quote_link' => 'https://wa.me/919382559266?text=Hi%2C+I+am+interested+in+Web+Development+service.',
                'order' => 1,
            ],
            [
                'title' => 'Digital Marketing',
                'slug' => 'digital-marketing',
                'icon' => 'fa fa-bullhorn',
                'short_description' => 'Comprehensive marketing strategies including Google Ads, Facebook/Instagram campaigns, and brand growth tactics.',
                'quote_link' => 'https://wa.me/919382559266?text=Hi%2C+I+am+interested+in+Digital+Marketing+service.',
                'order' => 2,
            ],
            [
                'title' => 'UI/UX Designing',
                'slug' => 'ui-ux-designing',
                'icon' => 'fa fa-paint-brush',
                'short_description' => 'User-first interface designs and interactive prototypes that engage visitors and maximize customer retention.',
                'quote_link' => 'https://wa.me/919382559266?text=Hi%2C+I+am+interested+in+UI/UX+Designing+service.',
                'order' => 3,
            ],
            [
                'title' => 'SEO Optimization',
                'slug' => 'seo-optimization',
                'icon' => 'fa fa-search',
                'short_description' => 'On-page and technical SEO to boost your organic search ranking on Google, driving qualified customer leads.',
                'quote_link' => 'https://wa.me/919382559266?text=Hi%2C+I+am+interested+in+SEO+Optimization+service.',
                'order' => 4,
            ],
            [
                'title' => 'Security Systems',
                'slug' => 'security-systems',
                'icon' => 'fa fa-shield-alt',
                'short_description' => 'Enterprise security audits, SSL certificate deployment, DDoS shielding, and automated vulnerability scanning.',
                'quote_link' => 'https://wa.me/919382559266?text=Hi%2C+I+am+interested+in+Security+Systems+service.',
                'order' => 5,
            ],
            [
                'title' => 'Custom Software Solutions',
                'slug' => 'custom-software-solutions',
                'icon' => 'fa fa-cogs',
                'short_description' => 'Tailored software, CRM/ERP integrations, and API backends built to automate your business operations.',
                'quote_link' => 'https://wa.me/919382559266?text=Hi%2C+I+am+interested+in+Custom+Software+service.',
                'order' => 6,
            ],
        ];

        foreach ($services as $srv) {
            Service::updateOrCreate(['slug' => $srv['slug']], $srv);
        }

        // 5. Testimonials
        $testimonials = [
            [
                'client_name' => 'Rajesh Kumar',
                'client_role_company' => 'Founder, TechStart Solutions',
                'review_text' => 'MS Solutions transformed our online presence completely. Their website development team created a stunning, responsive site that perfectly represents our brand. The digital marketing strategies they implemented boosted our leads significantly!',
                'rating' => 5,
                'order' => 1,
            ],
            [
                'client_name' => 'Priya Sharma',
                'client_role_company' => 'CEO, Digital Commerce Hub',
                'review_text' => 'Working with MS Solutions has been an absolute pleasure. Their UI/UX designing expertise is exceptional. Our e-commerce website converts visitors seamlessly, and their technical support is top-notch.',
                'rating' => 5,
                'order' => 2,
            ],
            [
                'client_name' => 'Amit Patel',
                'client_role_company' => 'Director, Growth Marketing Agency',
                'review_text' => "MS Solutions' digital marketing and SEO services were a total game-changer for us. Our organic Google placement doubled within 2 months. Truly dedicated and results-driven!",
                'rating' => 5,
                'order' => 3,
            ],
            [
                'client_name' => 'Sneha Sen',
                'client_role_company' => 'Co-Founder, EduLearn Online',
                'review_text' => 'The entire team at MS Solutions provided unparalleled dedication from wireframes to deployment. The code is fast, clean, and our users love the interface.',
                'rating' => 5,
                'order' => 4,
            ],
        ];

        foreach ($testimonials as $t) {
            Testimonial::updateOrCreate(['client_name' => $t['client_name']], $t);
        }

        // 6. FAQs
        $faqs = [
            [
                'question' => 'What is the difference between web design and development?',
                'answer' => 'Web design focuses on visual layout, typography, graphic aesthetics, and user experience interface, while web development involves writing backend logic, frontend scripts, database schemas, and functionality that power the website.',
                'page_or_category' => 'general',
                'order' => 1,
            ],
            [
                'question' => 'How long does it take to build a complete business website?',
                'answer' => 'A standard business website usually takes 3 to 7 business days, depending on content preparation, customization requirements, and feature scope.',
                'page_or_category' => 'general',
                'order' => 2,
            ],
            [
                'question' => 'Are all websites built by MS Solutions mobile responsive?',
                'answer' => 'Yes! Every website we craft is 100% responsive, optimized for smartphones, tablets, laptops, and desktop computers.',
                'page_or_category' => 'general',
                'order' => 3,
            ],
            [
                'question' => 'What is a front-end website developer?',
                'answer' => 'A front-end developer builds the visible interface that users interact with directly in web browsers using HTML, CSS, JavaScript, and modern frontend frameworks.',
                'page_or_category' => 'development',
                'order' => 4,
            ],
            [
                'question' => 'What is WordPress website development?',
                'answer' => 'WordPress website development involves customizing themes, plugins, custom post types, and WooCommerce stores to allow non-technical business owners to easily edit website content.',
                'page_or_category' => 'cms',
                'order' => 5,
            ],
        ];

        foreach ($faqs as $f) {
            Faq::updateOrCreate(['question' => $f['question']], $f);
        }

        // 7. Blogs
        $blogs = [
            [
                'title' => 'Social Media Success: Pro Strategies for Businesses',
                'slug' => 'social-media-success-pro-strategies-for-businesses',
                'category' => 'Digital Marketing',
                'excerpt' => 'Learn how targeted ad campaigns and organic branding build consumer trust and high conversions.',
                'content' => 'Building a loyal social following requires consistency, authenticity, and actionable analytics. In this guide, we dive deep into how brand storytelling and hyper-targeted advertising produce maximum ROI for modern brands.',
                'image' => 'https://images.unsplash.com/photo-1611162617474-5b21e879e113?auto=format&fit=crop&w=600&q=80',
                'author' => 'Admin',
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'Web Design Essentials for Optimal User Experience',
                'slug' => 'web-design-essentials-for-optimal-user-experience',
                'category' => 'Web Design',
                'excerpt' => 'Key visual design, typography, spacing, and micro-interactions that elevate your brand online.',
                'content' => 'Modern users form an opinion of your business in less than 50 milliseconds. Discover the visual hierarchy, color psychology, and mobile-friendly standards that transform casual visitors into paying customers.',
                'image' => 'https://images.unsplash.com/photo-1507238691740-187a5b1d37b8?auto=format&fit=crop&w=600&q=80',
                'author' => 'Admin',
                'published_at' => now()->subDays(10),
            ],
            [
                'title' => 'Digital Branding Mastery: Your Ultimate Guide',
                'slug' => 'digital-branding-mastery-your-ultimate-guide',
                'category' => 'SEO & Growth',
                'excerpt' => 'Discover step-by-step techniques to improve domain authority, page speed, and organic rank.',
                'content' => 'Search engines prioritize user experience, speed, and topical relevance. Here are the actionable on-page SEO strategies and performance optimizations we implement on every website project.',
                'image' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=600&q=80',
                'author' => 'Admin',
                'published_at' => now()->subDays(15),
            ],
        ];

        foreach ($blogs as $b) {
            Blog::updateOrCreate(['slug' => $b['slug']], $b);
        }

        // 8. Site Settings
        $settings = [
            'site_title' => 'MS Solutions',
            'site_tagline' => 'Professional Web Design & Digital Growth Solutions',
            'contact_email' => 'mssolutions101@gmail.com',
            'contact_phone' => '9382559266',
            'contact_address' => 'Kolkata, West Bengal, India',
            'whatsapp_number' => '919382559266',
            'facebook_url' => 'https://facebook.com',
            'twitter_url' => 'https://twitter.com',
            'instagram_url' => 'https://instagram.com',
            'linkedin_url' => 'https://linkedin.com',
            'footer_about' => 'MS Solutions is a trusted digital agency offering web development, UI/UX designing, digital marketing, and software solutions. We help businesses expand online with scalable technology and expert support.',
            'copyright_text' => '© 2026 MS Solutions. All Rights Reserved.',
        ];

        foreach ($settings as $key => $val) {
            SiteSetting::set($key, $val);
        }
    }
}
