@extends('admin.layouts.app')

@section('title', 'View Message')
@section('page_title', 'Inquiry Details')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.messages.index') }}" class="text-info text-decoration-none small">
        <i class="fa fa-arrow-left me-1"></i> Back to Inquiries
    </a>
</div>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="admin-card">
            <div class="admin-card-header d-flex justify-content-between align-items-center">
                <h5><i class="fa fa-envelope-open text-info me-2"></i> {{ $message->subject ?? 'Message Inquiry' }}</h5>
                <span class="text-muted small">{{ $message->created_at->format('d M, Y - h:i A') }}</span>
            </div>
            <div class="admin-card-body">
                <div class="p-3 bg-dark bg-opacity-50 rounded-4 border border-secondary border-opacity-25 mb-4">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <small class="text-muted d-block">From Name</small>
                            <span class="fw-bold text-white fs-6">{{ $message->name }}</span>
                        </div>
                        <div class="col-md-6">
                            <small class="text-muted d-block">Email Address</small>
                            <a href="mailto:{{ $message->email }}" class="text-info fw-semibold">{{ $message->email }}</a>
                        </div>
                        <div class="col-md-6">
                            <small class="text-muted d-block">Phone Number</small>
                            @if($message->phone)
                                <a href="tel:{{ $message->phone }}" class="text-white">{{ $message->phone }}</a>
                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $message->phone) }}" target="_blank" class="ms-2 text-success small"><i class="fab fa-whatsapp"></i> Chat</a>
                            @else
                                <span class="text-muted">Not provided</span>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <small class="text-muted d-block">Website Type & Budget</small>
                            <span class="badge badge-purple me-1">{{ $message->website_type ?? 'N/A' }}</span>
                            <span class="badge bg-success bg-opacity-25 text-success">{{ $message->budget ?? 'N/A' }}</span>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <h6 class="text-info fw-bold mb-2">Message Content:</h6>
                    <div class="p-3 bg-dark bg-opacity-25 rounded-3 border border-secondary border-opacity-25 text-white" style="white-space: pre-wrap; font-size: 0.95rem; line-height: 1.6;">
{{ $message->message }}
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center pt-3 border-top border-secondary border-opacity-25">
                    <form method="POST" action="{{ route('admin.messages.destroy', $message) }}" onsubmit="return confirm('Delete this inquiry?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger rounded-pill px-4 btn-sm">
                            <i class="fa fa-trash me-1"></i> Delete Inquiry
                        </button>
                    </form>
                    <a href="mailto:{{ $message->email }}?subject=Re:%20{{ urlencode($message->subject ?? 'Inquiry via MS Solutions') }}" class="btn btn-theme-primary rounded-pill px-4 btn-sm">
                        <i class="fa fa-reply me-1"></i> Reply via Email
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
