<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminBlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::orderBy('published_at', 'desc')->get();
        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:200',
            'category' => 'required|string|max:100',
            'excerpt' => 'required|string',
            'content' => 'required|string',
            'author' => 'nullable|string|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:5120',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['author'] = $validated['author'] ?? 'Admin';
        $validated['published_at'] = now();
        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('blogs', 'public');
            $validated['image'] = $path;
        }

        Blog::create($validated);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog article published successfully!');
    }

    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:200',
            'category' => 'required|string|max:100',
            'excerpt' => 'required|string',
            'content' => 'required|string',
            'author' => 'nullable|string|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:5120',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['author'] = $validated['author'] ?? 'Admin';
        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            if ($blog->image && !str_starts_with($blog->image, 'images/') && !str_starts_with($blog->image, 'http')) {
                Storage::disk('public')->delete($blog->image);
            }
            $path = $request->file('image')->store('blogs', 'public');
            $validated['image'] = $path;
        }

        $blog->update($validated);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog article updated successfully!');
    }

    public function destroy(Blog $blog)
    {
        if ($blog->image && !str_starts_with($blog->image, 'images/') && !str_starts_with($blog->image, 'http')) {
            Storage::disk('public')->delete($blog->image);
        }
        $blog->delete();

        return redirect()->route('admin.blogs.index')->with('success', 'Blog article deleted successfully!');
    }
}
