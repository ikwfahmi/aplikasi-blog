<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Blog Kami')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
        }
        .navbar-custom {
            background-color: #1a252f;
            padding: 1rem 0;
        }
        .navbar-custom .navbar-brand {
            color: #fff;
            font-weight: 700;
            font-size: 1.5rem;
            letter-spacing: 0.5px;
        }
        .navbar-custom .navbar-brand span {
            display: block;
            font-size: 0.75rem;
            font-weight: 400;
            color: #aeb6bf;
            margin-top: 2px;
        }
        .navbar-custom .nav-link {
            color: #d1d8e0;
            font-size: 0.9rem;
            margin-left: 1rem;
            transition: color 0.2s;
        }
        .navbar-custom .nav-link:hover, .navbar-custom .nav-link.active {
            color: #fff;
        }
        .footer-custom {
            background-color: #1a252f;
            color: #aeb6bf;
            padding: 1.5rem 0;
            font-size: 0.85rem;
            text-align: center;
            margin-top: 3rem;
        }
    </style>
    @stack('styles')
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container">
        <a class="navbar-brand" href="{{ route('public.index') }}">
            Blog Kami
            <span>Artikel terbaru seputar teknologi dan pemrograman</span>
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('public.index') ? 'active' : '' }}" href="{{ route('public.index') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Artikel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Kategori</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Tentang</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container my-5">
    @yield('content')
</div>

<footer class="footer-custom">
    <div class="container">
        &copy; {{ date('Y') }} Blog Kami. Seluruh hak cipta dilindungi.
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
