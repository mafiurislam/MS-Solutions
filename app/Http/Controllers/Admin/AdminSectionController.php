<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminSectionController extends Controller
{
    public function index(Request $request)
    {
        $currentPage = $request->query('page_filter', 'all');

        $query = PageSection::orderBy('page')->orderBy('order');
        if ($currentPage !== 'all') {
            $query->where('page', $currentPage);
        }
        $sections = $query->get();

        $pageList = [
            'all' => 'All Sections',
            'home' => 'Home Page',
            'about' => 'About Page',
            'services' => 'Services Page',
            'portfolios' => 'Portfolios Page',
            'blog' => 'Blog Page',
            'testimonials' => 'Testimonials Page',
            'faq' => 'FAQ Page',
            'contact' => 'Contact Page',
        ];

        return view('admin.sections.index', compact('sections', 'currentPage', 'pageList'));
    }

    public function create()
    {
        return view('admin.sections.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'page' => 'required|string|max:50',
            'section_name' => 'required|string|max:150',
            'section_key' => 'required|string|max:100|unique:page_sections,section_key',
            'badge' => 'nullable|string|max:100',
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:5120',
            'button_text' => 'nullable|string|max:100',
            'button_link' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['order'] = $validated['order'] ?? 0;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('sections', 'public');
            $validated['image'] = $path;
        }

        PageSection::create($validated);

        return redirect()->route('admin.sections.index', ['page_filter' => $validated['page']])
            ->with('success', 'Section created successfully!');
    }

    public function edit(PageSection $section)
    {
        return view('admin.sections.edit', compact('section'));
    }

    public function update(Request $request, PageSection $section)
    {
        $validated = $request->validate([
            'section_name' => 'required|string|max:150',
            'badge' => 'nullable|string|max:100',
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:5120',
            'button_text' => 'nullable|string|max:100',
            'button_link' => 'nullable|string|max:255',
            'extra_json' => 'nullable|string',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['order'] = $validated['order'] ?? 0;

        if ($request->filled('extra_json')) {
            $decoded = json_decode($request->input('extra_json'), true);
            if (json_last_error() === JSON_ERROR_NONE) {
                $validated['extra_data'] = $decoded;
            }
        }

        if ($request->hasFile('image')) {
            if ($section->image && !str_starts_with($section->image, 'images/')) {
                Storage::disk('public')->delete($section->image);
            }
            $path = $request->file('image')->store('sections', 'public');
            $validated['image'] = $path;
        }

        $section->update($validated);

        return redirect()->route('admin.sections.index', ['page_filter' => $section->page])
            ->with('success', 'Section "' . $section->section_name . '" updated successfully!');
    }

    public function destroy(PageSection $section)
    {
        if ($section->image && !str_starts_with($section->image, 'images/')) {
            Storage::disk('public')->delete($section->image);
        }
        $page = $section->page;
        $section->delete();

        return redirect()->route('admin.sections.index', ['page_filter' => $page])
            ->with('success', 'Section deleted successfully!');
    }
}
