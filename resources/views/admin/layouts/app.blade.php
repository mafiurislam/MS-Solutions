<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') – MS Solutions</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/logo.svg') }}?v=1">
    <link rel="icon" type="image/png" sizes="64x64" href="{{ asset('images/favicon.png') }}?v=1">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}?v=1">
    <link rel="apple-touch-icon" href="{{ asset('images/logo.svg') }}?v=1">

    <!-- Google Fonts & FontAwesome -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Bootstrap 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --primary: #01D8E1;
            --primary-dark: #009ca3;
            --sidebar-bg: #0b1120;
            --main-bg: #0f172a;
            --card-bg: #1e293b;
            --border-color: rgba(255, 255, 255, 0.08);
            --text-main: #f8fafc;
            --text-muted: #94a3b8;
        }

        body {
            font-family: 'Lexend', sans-serif;
            background-color: var(--main-bg);
            color: var(--text-main);
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        /* Layout Structure */
        .admin-wrapper {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar Styling */
        .admin-sidebar {
            width: 270px;
            background-color: var(--sidebar-bg);
            border-right: 1px solid var(--border-color);
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 1000;
            transition: all 0.3s ease;
        }

        .sidebar-brand {
            padding: 24px 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            border-bottom: 1px solid var(--border-color);
        }

        .sidebar-brand img {
            max-height: 38px;
        }

        .sidebar-brand .brand-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: #fff;
            line-height: 1.2;
        }

        .sidebar-brand .brand-badge {
            font-size: 0.65rem;
            background: linear-gradient(135deg, #01D8E1 0%, #3b82f6 100%);
            color: #0b1120;
            padding: 2px 6px;
            border-radius: 4px;
            font-weight: 800;
            text-transform: uppercase;
        }

        .sidebar-menu {
            padding: 16px 12px;
            flex-grow: 1;
            overflow-y: auto;
        }

        .menu-category {
            font-size: 0.72rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            color: #64748b;
            padding: 12px 14px 6px;
        }

        .nav-item-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 14px;
            color: var(--text-muted);
            text-decoration: none;
            border-radius: 10px;
            font-size: 0.92rem;
            font-weight: 500;
            margin-bottom: 4px;
            transition: all 0.2s ease;
        }

        .nav-item-link i {
            font-size: 1.1rem;
            width: 22px;
            text-align: center;
            transition: all 0.2s ease;
        }

        .nav-item-link:hover {
            color: #fff;
            background: rgba(255, 255, 255, 0.05);
            transform: translateX(4px);
        }

        .nav-item-link.active {
            color: #0b1120;
            background: linear-gradient(135deg, #01D8E1 0%, #00bcbf 100%);
            font-weight: 600;
            box-shadow: 0 4px 15px rgba(1, 216, 225, 0.3);
        }

        .nav-item-link.active i {
            color: #0b1120;
        }

        .nav-item-link .badge-counter {
            margin-left: auto;
            background: #ef4444;
            color: white;
            font-size: 0.75rem;
            padding: 2px 7px;
            border-radius: 10px;
            font-weight: 700;
        }

        /* Sidebar User Card */
        .sidebar-footer {
            padding: 16px;
            border-top: 1px solid var(--border-color);
            background: rgba(15, 23, 42, 0.5);
        }

        .user-profile-widget {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-avatar-circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #01D8E1 0%, #8b5cf6 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            color: #0b1120;
            font-size: 1.1rem;
            box-shadow: 0 0 10px rgba(1, 216, 225, 0.3);
        }

        /* Main Content Container */
        .admin-main {
            margin-left: 270px;
            flex-grow: 1;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            transition: all 0.3s ease;
        }

        /* Top Navbar */
        .admin-topbar {
            height: 70px;
            background: rgba(11, 17, 32, 0.8);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--border-color);
            padding: 0 28px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 900;
        }

        .topbar-left {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .btn-sidebar-toggle {
            display: none;
            background: transparent;
            border: 1px solid var(--border-color);
            color: var(--text-main);
            border-radius: 8px;
            padding: 6px 12px;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        /* Content Body */
        .admin-content {
            padding: 30px;
            flex-grow: 1;
        }

        /* Custom Cards */
        .admin-card {
            background-color: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            margin-bottom: 24px;
        }

        .admin-card-header {
            padding: 18px 24px;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: rgba(255, 255, 255, 0.02);
        }

        .admin-card-header h5 {
            margin: 0;
            font-size: 1.05rem;
            font-weight: 700;
            color: #fff;
        }

        .admin-card-body {
            padding: 24px;
        }

        /* Buttons & Forms */
        .btn-theme-primary {
            background: linear-gradient(135deg, #01D8E1 0%, #00a4ab 100%);
            border: none;
            color: #0b1120;
            font-weight: 600;
            padding: 8px 18px;
            border-radius: 10px;
            transition: all 0.2s ease;
            box-shadow: 0 4px 12px rgba(1, 216, 225, 0.25);
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-theme-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(1, 216, 225, 0.4);
            color: #000;
        }

        .form-control, .form-select {
            background-color: rgba(15, 23, 42, 0.8);
            border: 1px solid var(--border-color);
            color: #fff;
            border-radius: 10px;
            padding: 10px 14px;
        }

        .form-control:focus, .form-select:focus {
            background-color: #0f172a;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(1, 216, 225, 0.2);
            color: #fff;
        }

        .form-label {
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--text-muted);
            margin-bottom: 6px;
        }

        /* Tables */
        .admin-table {
            color: var(--text-main);
            margin-bottom: 0;
            vertical-align: middle;
        }

        .admin-table th {
            font-size: 0.78rem;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            color: var(--text-muted);
            border-bottom: 1px solid var(--border-color);
            padding: 12px 16px;
            background: rgba(15, 23, 42, 0.5);
        }

        .admin-table td {
            padding: 14px 16px;
            border-bottom: 1px solid var(--border-color);
            background: transparent;
            color: #e2e8f0;
        }

        .admin-table tr:hover td {
            background: rgba(255, 255, 255, 0.02);
        }

        /* Badges */
        .badge-cyan {
            background: rgba(1, 216, 225, 0.15);
            color: #01D8E1;
            border: 1px solid rgba(1, 216, 225, 0.3);
            font-weight: 600;
            padding: 4px 10px;
            border-radius: 6px;
        }

        .badge-purple {
            background: rgba(168, 85, 247, 0.15);
            color: #c084fc;
            border: 1px solid rgba(168, 85, 247, 0.3);
            font-weight: 600;
            padding: 4px 10px;
            border-radius: 6px;
        }

        /* Mobile responsiveness */
        @media (max-width: 991px) {
            .admin-sidebar {
                transform: translateX(-100%);
            }
            .admin-sidebar.show {
                transform: translateX(0);
            }
            .admin-main {
                margin-left: 0;
            }
            .btn-sidebar-toggle {
                display: block;
            }
        }
    </style>
    @stack('styles')
</head>
<body>
    <div class="admin-wrapper">
        <!-- Sidebar -->
        <aside class="admin-sidebar" id="adminSidebar">
            <div class="sidebar-brand">
                <img src="{{ asset('images/logo.svg') }}" alt="MS Solutions">
                <div>
                    <div class="brand-title">MS Solutions</div>
                    <span class="brand-badge">Admin Pro</span>
                </div>
            </div>

            <div class="sidebar-menu">
                <div class="menu-category">Overview</div>
                <a href="{{ route('admin.dashboard') }}" class="nav-item-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fa fa-gauge-high"></i>
                    <span>Dashboard</span>
                </a>

                <div class="menu-category">Main Management</div>
                <a href="{{ route('admin.portfolios.index') }}" class="nav-item-link {{ request()->routeIs('admin.portfolios.*') ? 'active' : '' }}">
                    <i class="fa fa-briefcase"></i>
                    <span>Portfolios (CRUD)</span>
                </a>
                <a href="{{ route('admin.sections.index') }}" class="nav-item-link {{ request()->routeIs('admin.sections.*') ? 'active' : '' }}">
                    <i class="fa fa-layer-group"></i>
                    <span>Page Sections</span>
                </a>
                <a href="{{ route('admin.services.index') }}" class="nav-item-link {{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
                    <i class="fa fa-cubes"></i>
                    <span>Services</span>
                </a>

                <div class="menu-category">Content & Media</div>
                <a href="{{ route('admin.testimonials.index') }}" class="nav-item-link {{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}">
                    <i class="fa fa-comment-dots"></i>
                    <span>Testimonials</span>
                </a>
                <a href="{{ route('admin.faqs.index') }}" class="nav-item-link {{ request()->routeIs('admin.faqs.*') ? 'active' : '' }}">
                    <i class="fa fa-circle-question"></i>
                    <span>FAQs</span>
                </a>
                <a href="{{ route('admin.blogs.index') }}" class="nav-item-link {{ request()->routeIs('admin.blogs.*') ? 'active' : '' }}">
                    <i class="fa fa-newspaper"></i>
                    <span>Blog & News</span>
                </a>

                <div class="menu-category">Communication & Setup</div>
                <a href="{{ route('admin.messages.index') }}" class="nav-item-link {{ request()->routeIs('admin.messages.*') ? 'active' : '' }}">
                    <i class="fa fa-envelope"></i>
                    <span>Inquiries</span>
                    @php $unread = \App\Models\ContactMessage::where('is_read', false)->count(); @endphp
                    @if($unread > 0)
                        <span class="badge-counter">{{ $unread }}</span>
                    @endif
                </a>
                <a href="{{ route('admin.settings.index') }}" class="nav-item-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                    <i class="fa fa-sliders"></i>
                    <span>Site Settings</span>
                </a>
            </div>

            <div class="sidebar-footer">
                <div class="user-profile-widget">
                    <div class="user-avatar-circle">
                        {{ strtoupper(substr(Auth::user()->name ?? 'M', 0, 1)) }}
                    </div>
                    <div class="overflow-hidden">
                        <div class="fw-bold text-white text-truncate">{{ Auth::user()->name ?? 'Mafiur' }}</div>
                        <small class="text-info d-block">Administrator</small>
                    </div>
                    <form method="POST" action="{{ route('logout') }}" class="ms-auto">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-danger border-0" title="Sign Out">
                            <i class="fa fa-power-off"></i>
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <!-- Main Wrapper -->
        <div class="admin-main">
            <!-- Topbar -->
            <header class="admin-topbar">
                <div class="topbar-left">
                    <button class="btn btn-sidebar-toggle" id="sidebarToggle">
                        <i class="fa fa-bars"></i>
                    </button>
                    <h5 class="mb-0 fw-bold d-none d-sm-block">@yield('page_title', 'Dashboard')</h5>
                </div>
                <div class="topbar-right">
                    <a href="{{ route('home') }}" target="_blank" class="btn btn-sm btn-outline-info rounded-pill px-3">
                        <i class="fa fa-globe me-1"></i> View Live Site
                    </a>
                    <a href="{{ route('admin.portfolios.create') }}" class="btn btn-sm btn-theme-primary rounded-pill px-3">
                        <i class="fa fa-plus me-1"></i> New Portfolio
                    </a>
                </div>
            </header>

            <!-- Alerts -->
            <div class="admin-content">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show border-0 bg-success bg-opacity-25 text-white mb-4 d-flex align-items-center" role="alert">
                        <i class="fa fa-circle-check fs-5 me-2 text-success"></i>
                        <div>{{ session('success') }}</div>
                        <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show border-0 bg-danger bg-opacity-25 text-white mb-4" role="alert">
                        <div class="d-flex align-items-center mb-1">
                            <i class="fa fa-triangle-exclamation fs-5 me-2 text-danger"></i>
                            <strong>Please check the following errors:</strong>
                        </div>
                        <ul class="mb-0 ps-4 small">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @yield('content')
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('adminSidebar');
            const toggle = document.getElementById('sidebarToggle');
            if(toggle && sidebar) {
                toggle.addEventListener('click', function() {
                    sidebar.classList.toggle('show');
                });
            }
        });
    </script>
    @stack('scripts')
</body>
</html>
