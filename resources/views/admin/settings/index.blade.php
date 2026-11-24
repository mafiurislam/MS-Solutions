@extends('admin.layouts.app')

@section('title', 'Site Settings')
@section('page_title', 'Global Website Settings')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
    <div>
        <h4 class="fw-bold mb-1 text-white">Global Configuration & Branding</h4>
        <p class="text-muted small mb-0">Update contact info, WhatsApp number, social media accounts, and branding details.</p>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-9">
        <div class="admin-card">
            <div class="admin-card-header">
                <h5><i class="fa fa-sliders text-info me-2"></i> General Website Settings</h5>
            </div>
            <div class="admin-card-body">
                <form method="POST" action="{{ route('admin.settings.update') }}">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Website Title</label>
                            <input type="text" name="site_title" class="form-control" value="{{ old('site_title', $settings['site_title'] ?? 'MS Solutions') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Tagline / Subtitle</label>
                            <input type="text" name="site_tagline" class="form-control" value="{{ old('site_tagline', $settings['site_tagline'] ?? '') }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Contact Email</label>
                            <input type="email" name="contact_email" class="form-control" value="{{ old('contact_email', $settings['contact_email'] ?? '') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Contact Phone</label>
                            <input type="text" name="contact_phone" class="form-control" value="{{ old('contact_phone', $settings['contact_phone'] ?? '') }}" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">WhatsApp Number (with country code, no + or spaces)</label>
                            <input type="text" name="whatsapp_number" class="form-control" placeholder="919382559266" value="{{ old('whatsapp_number', $settings['whatsapp_number'] ?? '919382559266') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Office Address</label>
                            <input type="text" name="contact_address" class="form-control" value="{{ old('contact_address', $settings['contact_address'] ?? '') }}">
                        </div>

                        <div class="col-12 mt-4">
                            <h6 class="text-info fw-bold mb-3"><i class="fa fa-share-nodes me-2"></i> Social Media Links</h6>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label"><i class="fab fa-facebook-f text-primary me-1"></i> Facebook URL</label>
                            <input type="url" name="facebook_url" class="form-control" value="{{ old('facebook_url', $settings['facebook_url'] ?? '') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label"><i class="fab fa-twitter text-info me-1"></i> Twitter / X URL</label>
                            <input type="url" name="twitter_url" class="form-control" value="{{ old('twitter_url', $settings['twitter_url'] ?? '') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label"><i class="fab fa-instagram text-danger me-1"></i> Instagram URL</label>
                            <input type="url" name="instagram_url" class="form-control" value="{{ old('instagram_url', $settings['instagram_url'] ?? '') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label"><i class="fab fa-linkedin-in text-info me-1"></i> LinkedIn URL</label>
                            <input type="url" name="linkedin_url" class="form-control" value="{{ old('linkedin_url', $settings['linkedin_url'] ?? '') }}">
                        </div>

                        <div class="col-12 mt-4">
                            <h6 class="text-info fw-bold mb-3"><i class="fa fa-copyright me-2"></i> Footer Content</h6>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Footer About Text</label>
                            <textarea name="footer_about" class="form-control" rows="3">{{ old('footer_about', $settings['footer_about'] ?? '') }}</textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Copyright Notice</label>
                            <input type="text" name="copyright_text" class="form-control" value="{{ old('copyright_text', $settings['copyright_text'] ?? '') }}">
                        </div>

                        <div class="col-12 text-end mt-4 pt-3 border-top border-secondary border-opacity-25">
                            <button type="submit" class="btn btn-theme-primary rounded-pill px-5">Save Settings</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
