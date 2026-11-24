<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\ContactMessage;
use App\Models\Faq;
use App\Models\PageSection;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\Testimonial;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'portfolios' => Portfolio::count(),
            'sections' => PageSection::count(),
            'services' => Service::count(),
            'testimonials' => Testimonial::count(),
            'faqs' => Faq::count(),
            'blogs' => Blog::count(),
            'messages' => ContactMessage::count(),
            'unread_messages' => ContactMessage::where('is_read', false)->count(),
        ];

        $recentPortfolios = Portfolio::orderBy('id', 'desc')->take(5)->get();
        $recentMessages = ContactMessage::orderBy('id', 'desc')->take(5)->get();
        $recentSections = PageSection::orderBy('updated_at', 'desc')->take(6)->get();

        return view('admin.dashboard', compact('stats', 'recentPortfolios', 'recentMessages', 'recentSections'));
    }
}
