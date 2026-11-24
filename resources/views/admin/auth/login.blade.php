<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login – MS Solutions</title>

    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/logo.svg') }}?v=1">
    <link rel="icon" type="image/png" sizes="64x64" href="{{ asset('images/favicon.png') }}?v=1">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}?v=1">
    <link rel="apple-touch-icon" href="{{ asset('images/logo.svg') }}?v=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --primary: #01D8E1;
            --primary-dark: #00a8af;
            --bg-dark: #0b1120;
            --card-dark: rgba(17, 24, 39, 0.85);
            --border-glow: rgba(1, 216, 225, 0.25);
        }
        body {
            font-family: 'Lexend', sans-serif;
            background: radial-gradient(circle at top right, #0f2b38 0%, #0b1120 60%, #050811 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #f3f4f6;
            padding: 20px;
            position: relative;
            overflow-x: hidden;
        }
        .glow-blob {
            position: absolute;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(1, 216, 225, 0.15) 0%, transparent 70%);
            border-radius: 50%;
            pointer-events: none;
            filter: blur(40px);
        }
        .blob-1 { top: -100px; right: -100px; }
        .blob-2 { bottom: -100px; left: -100px; }

        .login-card {
            background: var(--card-dark);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid var(--border-glow);
            border-radius: 24px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.5), 0 0 30px rgba(1, 216, 225, 0.1);
            width: 100%;
            max-width: 460px;
            padding: 40px;
            position: relative;
            z-index: 10;
        }
        .brand-logo-wrap {
            text-align: center;
            margin-bottom: 28px;
        }
        .brand-logo-wrap img {
            max-width: 180px;
            filter: drop-shadow(0 0 12px rgba(1, 216, 225, 0.3));
        }
        .form-control {
            background: rgba(30, 41, 59, 0.7);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: #fff;
            padding: 12px 16px;
            border-radius: 12px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            background: rgba(30, 41, 59, 0.95);
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(1, 216, 225, 0.25);
            color: #fff;
        }
        .form-control::placeholder {
            color: #94a3b8;
        }
        .input-group-text {
            background: rgba(30, 41, 59, 0.7);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-right: none;
            color: var(--primary);
            border-radius: 12px 0 0 12px;
        }
        .input-group .form-control {
            border-left: none;
            border-radius: 0 12px 12px 0;
        }
        .btn-login {
            background: linear-gradient(135deg, #01D8E1 0%, #009ca3 100%);
            border: none;
            color: #0b1120;
            font-weight: 700;
            padding: 13px;
            border-radius: 12px;
            width: 100%;
            font-size: 1rem;
            letter-spacing: 0.5px;
            box-shadow: 0 8px 20px rgba(1, 216, 225, 0.3);
            transition: all 0.3s ease;
        }
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 25px rgba(1, 216, 225, 0.5);
            color: #000;
        }
        .credentials-hint {
            background: rgba(1, 216, 225, 0.08);
            border: 1px dashed rgba(1, 216, 225, 0.3);
            border-radius: 12px;
            padding: 12px 16px;
            font-size: 0.85rem;
            margin-bottom: 24px;
        }
    </style>
</head>
<body>
    <div class="glow-blob blob-1"></div>
    <div class="glow-blob blob-2"></div>

    <div class="login-card">
        <div class="brand-logo-wrap">
            <img src="{{ asset('images/logo.svg') }}" alt="MS Solutions">
            <h4 class="mt-3 fw-bold text-white">Admin Control Center</h4>
            <p class="text-secondary small">Sign in to manage portfolios, sections & content</p>
        </div>

        <div class="credentials-hint">
            <div class="d-flex align-items-center mb-1">
                <i class="fa fa-info-circle text-info me-2"></i>
                <span class="fw-semibold text-info">Authorized Credentials</span>
            </div>
            <div class="d-flex justify-content-between small text-light mt-1">
                <span>Username: <strong class="text-white">Mafiur</strong></span>
                <span>Password: <strong class="text-white">12345678</strong></span>
            </div>
        </div>

        @if($errors->any())
            <div class="alert alert-danger py-2 px-3 small rounded-3 mb-3 border-0 bg-danger text-white">
                <i class="fa fa-triangle-exclamation me-1"></i> {{ $errors->first() }}
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success py-2 px-3 small rounded-3 mb-3 border-0 bg-success text-white">
                <i class="fa fa-check me-1"></i> {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label small text-secondary fw-semibold">Username or Email</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                    <input type="text" name="login" class="form-control" placeholder="Enter username" value="{{ old('login', 'Mafiur') }}" required autofocus>
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label small text-secondary fw-semibold">Password</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                    <input type="password" name="password" class="form-control" placeholder="Enter password" value="12345678" required>
                </div>
            </div>

            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" checked>
                    <label class="form-check-label small text-secondary" for="remember">Keep me logged in</label>
                </div>
                <a href="{{ route('home') }}" class="small text-info text-decoration-none"><i class="fa fa-arrow-left me-1"></i> Live Site</a>
            </div>

            <button type="submit" class="btn btn-login">
                <i class="fa fa-shield-alt me-2"></i> Access Dashboard
            </button>
        </form>
    </div>
</body>
</html>
