@extends('admin.layouts.app')

@section('title', 'Contact Inquiries')
@section('page_title', 'Client Contact Inquiries')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
    <div>
        <h4 class="fw-bold mb-1 text-white">Client Inquiries & Leads</h4>
        <p class="text-muted small mb-0">Messages submitted through the Galaxy Contact Form and website contact points.</p>
    </div>
</div>

<div class="admin-card">
    <div class="table-responsive">
        <table class="table admin-table align-middle">
            <thead>
                <tr>
                    <th>Sender Name</th>
                    <th>Email & Phone</th>
                    <th>Website Type & Budget</th>
                    <th>Subject & Message</th>
                    <th>Date</th>
                    <th class="text-end">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($messages as $msg)
                    <tr class="{{ !$msg->is_read ? 'table-active' : '' }}">
                        <td>
                            <div class="fw-bold text-white">{{ $msg->name }}</div>
                            @if(!$msg->is_read)
                                <span class="badge bg-danger py-0">New</span>
                            @endif
                        </td>
                        <td>
                            <div><a href="mailto:{{ $msg->email }}" class="text-info text-decoration-none small">{{ $msg->email }}</a></div>
                            @if($msg->phone)
                                <small class="text-muted"><i class="fa fa-phone me-1"></i> {{ $msg->phone }}</small>
                            @endif
                        </td>
                        <td>
                            <span class="badge badge-purple mb-1">{{ $msg->website_type ?? 'Website' }}</span>
                            @if($msg->budget)
                                <div class="small text-success">{{ $msg->budget }}</div>
                            @endif
                        </td>
                        <td class="text-muted small" style="max-width: 280px;">
                            <strong class="text-white d-block">{{ $msg->subject ?? 'General Inquiry' }}</strong>
                            {{ Str::limit($msg->message, 80) }}
                        </td>
                        <td class="text-secondary small">{{ $msg->created_at->format('d M, Y H:i') }}</td>
                        <td class="text-end">
                            <a href="{{ route('admin.messages.show', $msg) }}" class="btn btn-sm btn-outline-info rounded-3 me-1">
                                <i class="fa fa-eye"></i> View
                            </a>
                            <form method="POST" action="{{ route('admin.messages.destroy', $msg) }}" class="d-inline" onsubmit="return confirm('Delete this message?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger rounded-3">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-5">
                            <i class="fa fa-inbox fa-3x text-secondary mb-3 d-block"></i>
                            <p>No messages received yet.</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
