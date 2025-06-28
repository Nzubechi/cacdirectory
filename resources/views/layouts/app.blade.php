<!doctype html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    {{-- <title>{{ config('app.name', 'CAC Directory') }}</title> --}}
    <title>Directory - CAC Oke Igbala Ketu</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">

    <!-- Bootstrap + Custom -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/auth.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
</head>
<body>
    <nav class="navbar navbar-expand-lg px-3" style="background-color: transparent;">
        <div class="container-fluid theme-container">
            <a class="navbar-brand" href="{{ route('auth.start') }}">
                <img src="{{ asset('assets/images/logo.png') }}" class="" style="width: 2em;" alt="Logo.png">
            </a>
            <div class="d-flex align-items-center gap-3">
                <span class="theme-toggle" onclick="toggleTheme()" title="Toggle Theme">🌞</span>
                @auth
                    <form method="POST" action="{{ route('auth.logout') }}" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-outline-light btn-sm">Logout</button>
                    </form>
                @endauth
            </div>
        </div>
    </nav>

    <div class="container container-body">
        @yield('content')
    </div>

    <!-- Theme Toggle Script -->
    <script>
        function setTheme(theme) {
            document.documentElement.setAttribute('data-theme', theme);
            localStorage.setItem('theme', theme);
            document.querySelector('.theme-toggle').textContent = theme === 'dark' ? '🌙' : '🌞';
        }

        function toggleTheme() {
            const currentTheme = localStorage.getItem('theme') || 'light';
            const newTheme = currentTheme === 'light' ? 'dark' : 'light';
            setTheme(newTheme);
        }

        (function () {
            const savedTheme = localStorage.getItem('theme') || 'light';
            setTheme(savedTheme);
        })();
    </script>
</body>
</html>
