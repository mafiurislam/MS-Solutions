@extends('admin.layouts.app')

@section('title', 'Edit Section – ' . $section->section_name)
@section('page_title', 'Edit Section: ' . $section->section_name)

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.sections.index', ['page_filter' => $section->page]) }}" class="text-info text-decoration-none small">
        <i class="fa fa-arrow-left me-1"></i> Back to Sections ({{ ucfirst($section->page) }} Page)
    </a>
</div>

<div class="row justify-content-center">
    <div class="col-lg-9">
        <div class="admin-card">
            <div class="admin-card-header d-flex justify-content-between align-items-center">
                <div>
                    <h5><i class="fa fa-pencil text-info me-2"></i> {{ $section->section_name }}</h5>
                    <span class="badge badge-purple mt-1 text-uppercase">{{ $section->page }} PAGE</span>
                    <span class="text-secondary small font-monospace ms-2">Key: {{ $section->section_key }}</span>
                </div>
                <a href="{{ route('admin.sections.index') }}" class="btn btn-sm btn-outline-secondary rounded-pill">Cancel</a>
            </div>
            <div class="admin-card-body">
                <form method="POST" action="{{ route('admin.sections.update', $section) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row g-3">
                        <div class="col-md-8">
                            <label class="form-label">Section Display Name <span class="text-danger">*</span></label>
                            <input type="text" name="section_name" class="form-control" value="{{ old('section_name', $section->section_name) }}" required>
                            <div class="form-text text-muted">A clear name for this section in your admin dashboard.</div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Badge / Sub-heading Tag</label>
                            <input type="text" name="badge" class="form-control" placeholder="e.g. Your Digital Growth Partner" value="{{ old('badge', $section->badge) }}">
                        </div>

                        <div class="col-12">
                            <label class="form-label">Main Section Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Primary heading shown to visitors" value="{{ old('title', $section->title) }}">
                        </div>

                        <div class="col-12">
                            <label class="form-label">Subtitle / Description Text</label>
                            <textarea name="subtitle" class="form-control" rows="3" placeholder="Supporting text or summary paragraph">{{ old('subtitle', $section->subtitle) }}</textarea>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Additional Content (Optional HTML or paragraphs)</label>
                            <textarea name="content" class="form-control" rows="4" placeholder="Detailed content if applicable...">{{ old('content', $section->content) }}</textarea>
                        </div>

                        <!-- Image Section -->
                        <div class="col-12">
                            <label class="form-label">Section Featured Image</label>
                            <div class="d-flex align-items-center gap-3 mb-2 flex-wrap">
                                @if($section->image)
                                    <img id="imagePreview" src="{{ $section->image_url }}" alt="Section Image" class="rounded-3 border border-secondary" style="height: 90px; width: 140px; object-fit: cover;">
                                @else
                                    <img id="imagePreview" src="#" alt="Preview" class="rounded-3 border border-secondary" style="height: 90px; width: 140px; object-fit: cover; display: none;">
                                @endif
                                <div class="flex-grow-1">
                                    <input type="file" name="image" class="form-control" accept="image/*" id="imageInput">
                                    <div class="form-text text-muted">Upload a new image to replace the current banner or graphic.</div>
                                </div>
                            </div>
                        </div>

                        <!-- Buttons & Links -->
                        <div class="col-md-6">
                            <label class="form-label">Button Text</label>
                            <input type="text" name="button_text" class="form-control" placeholder="e.g. Get Started Today" value="{{ old('button_text', $section->button_text) }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Button Target Link</label>
                            <input type="text" name="button_link" class="form-control" placeholder="e.g. /contact or https://..." value="{{ old('button_link', $section->button_link) }}">
                        </div>

                        <!-- Extra JSON config if present -->
                        @if($section->extra_data)
                            <div class="col-12">
                                <label class="form-label">Structured Section Features (JSON Data)</label>
                                <textarea name="extra_json" class="form-control font-monospace small" rows="5">{{ json_encode($section->extra_data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) }}</textarea>
                                <div class="form-text text-muted">You can customize individual cards, bullet points, and tab settings directly here.</div>
                            </div>
                        @endif

                        <!-- Order & Visibility -->
                        <div class="col-md-6">
                            <label class="form-label">Display Order</label>
                            <input type="number" name="order" class="form-control" value="{{ old('order', $section->order) }}">
                        </div>
                        <div class="col-md-6 d-flex align-items-center">
                            <div class="form-check form-switch mt-4">
                                <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1" {{ $section->is_active ? 'checked' : '' }}>
                                <label class="form-check-label text-white fw-semibold" for="is_active">Visible on Website</label>
                            </div>
                        </div>

                        <div class="col-12 text-end mt-4 pt-3 border-top border-secondary border-opacity-25">
                            <a href="{{ route('admin.sections.index', ['page_filter' => $section->page]) }}" class="btn btn-outline-secondary me-2 rounded-pill px-4">Cancel</a>
                            <button type="submit" class="btn btn-theme-primary rounded-pill px-5">Save Section Changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.getElementById('imageInput').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.getElementById('imagePreview');
                preview.src = e.target.result;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
    });
</script>
@endpush
