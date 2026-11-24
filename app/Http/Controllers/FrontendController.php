<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\ContactMessage;
use App\Models\Faq;
use App\Models\PageSection;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home()
    {
        $sections = PageSection::where('page', 'home')->where('is_active', true)->get()->keyBy('section_key');
        $portfolios = Portfolio::where('is_featured', true)->orderBy('order')->take(6)->get();
        $services = Service::where('is_active', true)->orderBy('order')->get();
        $faqs = Faq::where('is_active', true)->where('page_or_category', 'general')->orderBy('order')->get();

        return view('pages.home', compact('sections', 'portfolios', 'services', 'faqs'));
    }

    public function about()
    {
        $sections = PageSection::where('page', 'about')->where('is_active', true)->get()->keyBy('section_key');
        $testimonials = Testimonial::where('is_active', true)->orderBy('order')->take(4)->get();

        return view('pages.about', compact('sections', 'testimonials'));
    }

    public function services()
    {
        $sections = PageSection::where('page', 'services')->where('is_active', true)->get()->keyBy('section_key');
        $services = Service::where('is_active', true)->orderBy('order')->get();

        return view('pages.services', compact('sections', 'services'));
    }

    public function portfolios()
    {
        $sections = PageSection::where('page', 'portfolios')->where('is_active', true)->get()->keyBy('section_key');
        $portfolios = Portfolio::orderBy('order')->get();

        return view('pages.portfolios', compact('sections', 'portfolios'));
    }

    public function blog()
    {
        $sections = PageSection::where('page', 'blog')->where('is_active', true)->get()->keyBy('section_key');
        $blogs = Blog::where('is_active', true)->orderBy('published_at', 'desc')->get();

        return view('pages.blog', compact('sections', 'blogs'));
    }

    public function testimonials()
    {
        $sections = PageSection::where('page', 'testimonials')->where('is_active', true)->get()->keyBy('section_key');
        $testimonials = Testimonial::where('is_active', true)->orderBy('order')->get();

        return view('pages.testimonials', compact('sections', 'testimonials'));
    }

    public function faq()
    {
        $sections = PageSection::where('page', 'faq')->where('is_active', true)->get()->keyBy('section_key');
        $faqs = Faq::where('is_active', true)->orderBy('order')->get();

        return view('pages.faq', compact('sections', 'faqs'));
    }

    public function contact()
    {
        $sections = PageSection::where('page', 'contact')->where('is_active', true)->get()->keyBy('section_key');

        return view('pages.contact', compact('sections'));
    }

    public function submitContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:150',
            'phone' => 'nullable|string|max:30',
            'subject' => 'nullable|string|max:150',
            'website_type' => 'nullable|string|max:100',
            'budget' => 'nullable|string|max:100',
            'message' => 'required|string|max:2000',
        ]);

        $message = ContactMessage::create($validated);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Thank you! Your message has been received.',
                'data' => $message,
            ]);
        }

        return back()->with('success', 'Thank you! Your message has been received.');
    }
}
