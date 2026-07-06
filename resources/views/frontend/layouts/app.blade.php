<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD

    <title>{{ config('app.name', 'SportShop') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
    body{
        background:#f5f7fb;
        font-family:'Segoe UI',sans-serif;
        padding-top:80px;
        min-height:100vh;
        display:flex;
        flex-direction:column;
        transition:0.3s;
    }

    /* NAVBAR */
    .navbar{
        background:rgba(15,23,42,.95);
        backdrop-filter:blur(10px);
        position:fixed;
        top:0;
        left:0;
        right:0;
        z-index:999;
        transition:0.3s;
    }

    /* LOGO ICON */
    .logo-icon {
        font-size: 28px;
        color: #0d6efd;
        transition: all 0.3s ease;
    }

    /* LOGO TEXT */
    .logo-text{
        background:linear-gradient(90deg,#0d6efd,#00d4ff);
        -webkit-background-clip:text;
        -webkit-text-fill-color:transparent;
        font-size:26px;
        font-weight:800;
    }

    /* LOGO HOVER */
    .navbar-brand:hover .logo-icon {
        transform: rotate(-12deg) scale(1.15);
        color: #00d4ff;
    }

    /* NAV LINKS */
    .nav-link{
        color:#fff !important;
    }

    .nav-link:hover,
    .nav-link.active{
        color:#0d6efd !important;
    }

    /* SEARCH */
    .search-box input{
        border-radius:30px;
    }

    /* CART BADGE */
    .cart-badge {
    position: absolute;
    top: -5px;
    right: -5px;
    background: red;
    color: white;
    font-size: 12px;
    width: 18px;
    height: 18px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

    /* FOOTER */
    .footer{
        background:#0f172a;
        color:white;
        margin-top:auto;
        transition:0.3s;
    }

    .footer a{
        color:white;
        text-decoration:none;
    }

    .footer a:hover{
        color:#0d6efd;
    }

    /* ================= DARK MODE ================= */
    body.dark-mode{
        background:#0b1220;
        color:#e5e7eb;
    }

    body.dark-mode .navbar{
        background:rgba(2,6,23,.95);
    }

    body.dark-mode .footer{
        background:#020617;
    }

    body.dark-mode .nav-link{
        color:#e5e7eb !important;
    }

    body.dark-mode .nav-link:hover,
    body.dark-mode .nav-link.active{
        color:#60a5fa !important;
    }

    body.dark-mode .dropdown-menu{
        background:#0f172a;
        color:#e5e7eb;
    }

    body.dark-mode .dropdown-item{
        color:#e5e7eb;
    }

    body.dark-mode .dropdown-item:hover{
        background:#1e293b;
    }

    body.dark-mode .form-control{
        background:#0f172a;
        border:1px solid #334155;
        color:#e5e7eb;
    }

    body.dark-mode .form-control::placeholder{
        color:#94a3b8;
    }
    .nav-custom {
    color: #fff;
    font-weight: 500;
    position: relative;
    transition: all 0.3s ease;
    padding: 8px 14px;
    border-radius: 8px;
}

/* Hover effect */
.nav-custom:hover {
    background: rgba(255, 255, 255, 0.1);
    color: #00d4ff;
    transform: translateY(-2px);
}

/* Active link */
.nav-custom.active {
    color: #00d4ff !important;
    font-weight: 600;
}

/* underline animation */
.nav-custom::after {
    content: "";
    position: absolute;
    left: 10px;
    bottom: 4px;
    width: 0%;
    height: 2px;
    background: #00d4ff;
    transition: 0.3s;
}

.nav-custom:hover::after,
.nav-custom.active::after {
    width: 70%;
}
</style>
</head>

<body>

{{-- NAVBAR --}}
<nav class="navbar navbar-expand-lg navbar-dark shadow">

    <div class="container">

        <!-- LOGO -->
        <a class="navbar-brand d-flex align-items-center gap-2" href="{{ url('/') }}">

    <!-- SPORT ICON -->
    <i <i class="bi bi-dribbble logo-icon"></i></i>

    <!-- TEXT -->
    <span class="logo-text">SportShop</span>

</a>

        <!-- TOGGLER -->
        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

           <!-- LEFT MENU -->

<ul class="navbar-nav me-auto ms-lg-3 gap-2">

    <li class="nav-item">
        <a class="nav-link nav-custom {{ request()->is('/') ? 'active' : '' }}"
           href="{{ url('/') }}">
            <i class="bi bi-house-door me-1"></i> Home
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link nav-custom {{ request()->is('shop*') ? 'active' : '' }}"
           href="{{ route('shop') }}">
            <i class="bi bi-bag me-1"></i> Shop
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link nav-custom {{ request()->is('contact*') ? 'active' : '' }}"
           href="{{ url('/contact') }}">
            <i class="bi bi-telephone me-1"></i> Contact
        </a>
    </li>

</ul>
            <!-- SEARCH -->
            <form class="d-flex search-box me-lg-3"
                  method="GET"
                  action="{{ route('shop') }}">

                <input class="form-control me-2"
                       type="search"
                       name="search"
                       value="{{ request('search') }}"
                       placeholder="Search products...">

                <button class="btn btn-outline-light">
                    <i class="bi bi-search"></i>
                </button>

            </form>

            <!-- RIGHT SIDE -->
            <div class="d-flex align-items-center gap-2">

                <!-- DARK MODE -->
                <button id="darkToggle"
                        class="btn btn-outline-light">
                    <i class="bi bi-moon"></i>
                </button>

                <!-- WISHLIST -->
                <a href="{{ url('/wishlist') }}"
                   class="btn btn-outline-light position-relative">
                    <i class="bi bi-heart"></i>
                </a>

<!-- CART -->
<a href="{{ url('/cart') }}"
   class="btn btn-outline-light position-relative">

    <i class="bi bi-cart3"></i>

@php
    $cart = session('cart', []);

    if (!is_array($cart)) {
        $cart = [];
    }

    $cartCount = 0;

    foreach ($cart as $item) {
        $cartCount += $item['quantity'] ?? 0;
    }
@endphp

@if($cartCount > 0)
    <span class="cart-badge">
        {{ $cartCount }}
    </span>
@endif

    @if($cartCount > 0)
        <span class="cart-badge">
            {{ $cartCount }}
        </span>
    @endif

</a>

                @guest

                    <a href="{{ route('login') }}"
                       class="btn btn-outline-info">
                        Login
                    </a>

                    <a href="{{ route('register') }}"
                       class="btn btn-primary">
                        Register
                    </a>

                @else

                    <!-- USER DROPDOWN -->
                    <div class="dropdown">

                        <button class="btn btn-outline-light dropdown-toggle d-flex align-items-center gap-2"
                                data-bs-toggle="dropdown"
                                style="border-radius:30px;">

                            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=0d6efd&color=fff"
                                 width="32"
                                 height="32"
                                 class="rounded-circle border"
                                 alt="avatar">

                            <span class="d-none d-md-inline">
                                {{ Auth::user()->name }}
                            </span>

                        </button>

                        <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-2"
    style="border-radius:12px; min-width:220px;">
    {{-- Admin Dashboard --}}
    @if(Auth::user()->role === 'admin')

        <li>
            <a class="dropdown-item text-warning"
               href="{{ url('/admin/dashboard') }}">

                <i class="bi bi-speedometer2 me-2"></i>
                Admin Dashboard

            </a>
        </li>

    @endif
    {{-- Profile --}}
    <li>
        <a class="dropdown-item"
           href="{{ url('/profile') }}">

            <i class="bi bi-person-circle me-2"></i>
            My Profile

        </a>
    </li>
    {{-- Orders --}}
    <li>
        <a class="dropdown-item"
           href="{{ url('/orders') }}">

            <i class="bi bi-bag me-2"></i>
            My Orders

        </a>
    </li>

                            <li><hr class="dropdown-divider"></li>

                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                            class="dropdown-item text-danger">
                                        <i class="bi bi-box-arrow-right me-2"></i>
                                        Logout
                                    </button>
                                </form>
                            </li>

                        </ul>

                    </div>

                @endguest

            </div>

        </div>
    </div>
</nav>

{{-- CONTENT --}}
@if(request()->is('/'))
    @yield('content')
@else
    <div class="container mt-4">
        @yield('content')
    </div>
@endif

{{-- FOOTER --}}
<footer class="footer mt-auto sticky-footer">
    <div class="container py-5">
        <div class="row g-4">

            <!-- BRAND -->
            <div class="col-md-4">
                <h5 class="fw-bold">SportShop</h5>
                <p class="mb-0">
                    Sports & fitness store built for athletes and lifestyle lovers.
                </p>
            </div>

            <!-- LINKS -->
            <div class="col-md-4">
                <h5 class="fw-bold">Quick Links</h5>
                <ul class="list-unstyled mt-3">
                    <li class="mb-2">
                        <a class="footer-link" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="mb-2">
                        <a class="footer-link" href="{{ route('shop') }}">Shop</a>
                    </li>
                    <li class="mb-2">
                        <a class="footer-link" href="{{ url('/contact') }}">Contact</a>
                    </li>
                </ul>
            </div>

            <!-- CONTACT -->
            <div class="col-md-4">
                <h5 class="fw-bold">Contact</h5>
                <p class="mb-1">📍 Phnom Penh, Cambodia</p>
                <p class="mb-1">📞 +855 000 000 000</p>
                <p class="mb-0">✉ support@sportshop.com</p>
            </div>

        </div>
    </div>

    <!-- BOTTOM BAR -->
    <div class="text-center py-3 border-top border-secondary footer-bottom">
        © {{ date('Y') }} SportShop. All rights reserved.
    </div>
</footer>

<style>
/* ================= FOOTER BASE ================= */
.footer {
    background: #0f172a;
    color: #ffffff;
    position: relative;
    overflow: hidden;
}

/* LINKS */
.footer-link {
    color: #cbd5e1;
    text-decoration: none;
    display: inline-block;
    transition: all 0.3s ease;
}

.footer-link:hover {
    color: #0d6efd;
    transform: translateX(6px);
}

/* BOTTOM BAR */
.footer-bottom {
    background: rgba(0,0,0,0.2);
    backdrop-filter: blur(8px);
    animation: fadeUp 0.8s ease;
}

/* ANIMATION */
@keyframes fadeUp {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* FLOATING GLOW EFFECT */
.footer::before {
    content: "";
    position: absolute;
    width: 300px;
    height: 300px;
    background: rgba(13, 110, 253, 0.2);
    filter: blur(100px);
    top: -80px;
    left: -120px;
    animation: floatGlow 6s infinite alternate ease-in-out;
    pointer-events: none;
}

@keyframes floatGlow {
    from { transform: translateY(0px); }
    to { transform: translateY(30px); }
}

/* DARK MODE */
body.dark-mode .footer {
    background: #020617;
}

/* LIGHT MODE */
body.light-mode .footer {
    background: #f8fafc;
    color: #0f172a;
}

body.light-mode .footer-link {
    color: #334155;
}
</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

{{-- DARK MODE SCRIPT --}}
<script>
    const toggle = document.getElementById("darkToggle");
    const body = document.body;

    // load saved theme
    if (localStorage.getItem("theme") === "dark") {
        body.classList.add("dark-mode");
        toggle.innerHTML = '<i class="bi bi-sun"></i>';
    }

    toggle.addEventListener("click", function () {
        body.classList.toggle("dark-mode");

        if (body.classList.contains("dark-mode")) {
            localStorage.setItem("theme", "dark");
            toggle.innerHTML = '<i class="bi bi-sun"></i>';
        } else {
            localStorage.setItem("theme", "light");
            toggle.innerHTML = '<i class="bi bi-moon"></i>';
        }
    });
</script>

=======
    <title>{{ config('app.name', 'Mini Shop') }} | Sports & Fitness Gear</title>

    <!-- Bootstrap 5 + Icons + Fonts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700;14..32,800&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #0d6efd;
            --primary-dark: #0a58ca;
            --secondary: #6c757d;
            --dark-bg: #0b1120;
            --card-bg: #ffffff;
            --text-main: #1e293b;
            --text-muted: #475569;
            --text-light: #f8fafc;
            --accent-glow: rgba(13,110,253,0.15);
            --border-light: rgba(0,0,0,0.05);
        }

        body {
            background: linear-gradient(145deg, #f9fafc 0%, #f1f5f9 100%);
            font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;
            padding-top: 80px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            color: var(--text-main);
        }

        /* refined typography */
        h1, h2, h3, h4, h5, h6 {
            font-weight: 700;
            letter-spacing: -0.02em;
            color: #0f172a;
        }

        /* GLASSMORPHISM NAVBAR — luxury & readable */
        .navbar {
            background: rgba(10, 25, 47, 0.92);
            backdrop-filter: blur(16px);
            box-shadow: 0 12px 28px -8px rgba(0,0,0,0.12);
            border-bottom: 1px solid rgba(255,255,255,0.08);
            transition: all 0.2s ease;
        }

        .navbar-brand {
            font-size: 28px;
            font-weight: 800;
            letter-spacing: -0.5px;
            background: linear-gradient(135deg, #FFFFFF 0%, #90cdf4 100%);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }

        .logo-text {
            background: linear-gradient(90deg, #f0f9ff, #7ab8ff);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 800;
        }

        .nav-link {
            color: #eef2ff !important;
            font-weight: 500;
            font-size: 0.95rem;
            margin: 0 4px;
            transition: 0.2s;
            position: relative;
        }

        .nav-link:hover {
            color: white !important;
            text-shadow: 0 0 6px rgba(13,110,253,0.6);
        }

        .nav-link.active {
            color: #ffffff !important;
            background: linear-gradient(120deg, #0d6efd20, transparent);
            border-radius: 12px;
            font-weight: 600;
        }

        /* search styling */
        .search-box input {
            border-radius: 48px;
            background: rgba(255,255,255,0.12);
            border: 1px solid rgba(255,255,255,0.25);
            color: white !important;
            padding: 0.5rem 1rem;
            backdrop-filter: blur(4px);
            transition: all 0.2s;
        }

        .search-box input:focus {
            background: rgba(255,255,255,0.2);
            border-color: #0d6efd;
            box-shadow: 0 0 0 3px rgba(13,110,253,0.4);
            color: white;
        }

        .search-box input::placeholder {
            color: #cdd9ff;
            font-weight: 400;
        }

        .btn-outline-light {
            border-color: rgba(255,255,255,0.5);
            color: white;
            transition: 0.2s;
        }

        .btn-outline-light:hover {
            background: #0d6efd;
            border-color: #0d6efd;
            color: white;
            transform: translateY(-1px);
        }

        /* cart badge - clean & visible */
        .cart-badge {
            position: absolute;
            top: -8px;
            right: -8px;
            background: linear-gradient(145deg, #dc2626, #b91c1c);
            color: #ffffff;
            font-size: 10px;
            width: 19px;
            height: 19px;
            border-radius: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            box-shadow: 0 2px 6px rgba(0,0,0,0.2);
            border: 1px solid rgba(255,255,255,0.4);
        }

        /* footer design enhanced */
        .footer {
            background: #0b1120;
            color: #e2e8f0;
            margin-top: auto;
            border-top: 1px solid rgba(255,255,255,0.05);
        }

        .footer h5 {
            color: white;
            font-weight: 700;
            margin-bottom: 1rem;
            letter-spacing: -0.2px;
            position: relative;
            display: inline-block;
        }

        .footer a {
            color: #cbd5e6;
            text-decoration: none;
            transition: 0.2s;
            font-weight: 400;
        }

        .footer a:hover {
            color: #3b82f6;
            padding-left: 5px;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.08);
            padding: 1.2rem;
            text-align: center;
            font-size: 0.85rem;
            color: #94a3b8;
        }

        /* dropdown modern */
        .dropdown-menu {
            background: rgba(15, 23, 42, 0.98);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 20px;
            box-shadow: 0 20px 35px -12px rgba(0,0,0,0.3);
        }

        .dropdown-item {
            color: #f1f5f9;
            font-weight: 500;
            border-radius: 14px;
            margin: 4px 8px;
        }

        .dropdown-item:hover {
            background: rgba(13,110,253,0.3);
            color: white;
        }

        /* BUTTON primary style */
        .btn-primary {
            background: linear-gradient(105deg, #0d6efd, #0b5ed7);
            border: none;
            border-radius: 40px;
            padding: 8px 24px;
            font-weight: 600;
            transition: all 0.2s;
            box-shadow: 0 4px 8px rgba(13,110,253,0.2);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            background: linear-gradient(105deg, #0b5ed7, #0a58ca);
            box-shadow: 0 12px 18px -8px rgba(13,110,253,0.4);
        }

        .btn-outline-info {
            border-radius: 40px;
            color: #90e0ff;
            border-color: #90e0ff;
        }

        .btn-outline-info:hover {
            background: #0d6efd;
            border-color: #0d6efd;
            color: white;
        }

        /* main content container refinement */
        .container-custom {
            max-width: 1280px;
            margin: 0 auto;
        }

        /* special for homepage without extra container shift */
        .full-width-hero {
            width: 100%;
        }

        /* card enhancements for better text contrast */
        .card, .product-card {
            background: var(--card-bg);
            border: 1px solid rgba(0,0,0,0.04);
            border-radius: 28px;
            transition: all 0.25s ease;
            box-shadow: 0 8px 20px -6px rgba(0,0,0,0.05);
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 24px 36px -12px rgba(0,0,0,0.12);
        }

        /* text readability */
        p, li, .text-readable {
            color: var(--text-muted);
            line-height: 1.5;
        }

        strong, b {
            color: #0f172a;
        }

        /* responsiveness */
        @media (max-width: 768px) {
            body {
                padding-top: 70px;
            }
            .navbar-brand {
                font-size: 22px;
            }
        }

        /* custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #eef2ff;
        }
        ::-webkit-scrollbar-thumb {
            background: #0d6efd;
            border-radius: 12px;
        }
    </style>
</head>
<body>

    {{-- PREMIUM NAVBAR WITH PERFECT TEXT COLOR CONTRAST --}}
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top shadow-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <span class="logo-text">⚡ Mini Shop</span>
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto ms-lg-4">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">
                            <i class="bi bi-house-door me-1"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('shop*') ? 'active' : '' }}" href="{{ route('shop') }}">
                            <i class="bi bi-grid-3x3-gap-fill me-1"></i> Shop
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('contact*') ? 'active' : '' }}" href="{{ url('/contact') }}">
                            <i class="bi bi-chat-dots me-1"></i> Contact
                        </a>
                    </li> 
                </ul>

                {{-- SEARCH with elevated contrast--}}
                <form class="d-flex search-box me-lg-3 my-2 my-lg-0" method="GET" action="{{ route('shop') }}">
                    <input class="form-control me-2" type="search" name="search" value="{{ request('search') }}" placeholder="🔍 Find your gear...">
                    <button class="btn btn-outline-light" type="submit"><i class="bi bi-search"></i></button>
                </form>

                {{-- RIGHT ACTIONS --}}
                <div class="d-flex align-items-center gap-2">
                    <a href="{{ url('/wishlist') }}" class="btn btn-outline-light position-relative" style="border-radius: 40px;">
                        <i class="bi bi-heart"></i>
                    </a>

                    <a href="{{ url('/cart') }}" class="btn btn-outline-light position-relative" style="border-radius: 40px;">
                        <i class="bi bi-cart3"></i>
                        <span class="cart-badge">{{ collect(session('cart', []))->sum('quantity') }}</span>
                    </a>

                    @guest
                        <a href="{{ route('login') }}" class="btn btn-outline-info me-1">Login</a>
                        <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
                    @else
                        <div class="dropdown">
                            <button class="btn btn-outline-light dropdown-toggle" data-bs-toggle="dropdown" style="border-radius: 50px;">
                                <i class="bi bi-person-circle me-1"></i> {{ Auth::user()->name }}
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                @if(Auth::user()->role === 'admin')
                                    <li><a class="dropdown-item text-warning" href="{{ url('/admin/dashboard') }}"><i class="bi bi-speedometer2"></i> Admin Dashboard</a></li>
                                @endif
                                <li><a class="dropdown-item" href="{{ url('/orders') }}"><i class="bi bi-bag-check"></i> My Orders</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger"><i class="bi bi-box-arrow-right"></i> Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </nav>

    {{-- PAGE CONTENT with flexible layout --}}
    <main class="flex-grow-1">
        @if(request()->is('/'))
            @yield('content')
        @else
            <div class="container mt-4 mb-5">
                @yield('content')
            </div>
        @endif
    </main>

    {{-- FOOTER – refined legibility & modern colors--}}
    <footer class="footer">
        <div class="container py-5">
            <div class="row gy-4">
                <div class="col-md-4">
                    <h5 class="mb-3"><i class="bi bi-cart4 me-2"></i> Mini Shop</h5>
                    <p class="text-secondary-emphasis" style="color: #b9c7da !important;">
                        Mini Shop offers products from leading global brands, including Apple, Samsung, Xiaomi, OPPO, Vivo, Dell, HP, Lenovo, ASUS, Sony, JBL, Bose, Anker, UGREEN, Logitech, and many more, ensuring quality and reliability for our customers.
                    </p>
                    <div class="mt-3">
                        <a href="#" class="me-3 text-light"><i class="bi bi-twitter-x"></i></a>
                        <a href="#" class="me-3 text-light"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="text-light"><i class="bi bi-facebook"></i></a>
                    </div>
                </div>

                <div class="col-md-4">
                    <h5 class="mb-3">Explore</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="{{ url('/') }}"><i class="bi bi-chevron-right small"></i> Home</a></li>
                        <li class="mb-2"><a href="{{ route('shop') }}"><i class="bi bi-chevron-right small"></i> Shop Collection</a></li>
                        <li class="mb-2"><a href="{{ url('/contact') }}"><i class="bi bi-chevron-right small"></i> Support</a></li>
                        <li><a href="#"><i class="bi bi-chevron-right small"></i> Track Order</a></li>
                    </ul>
                </div>

                <div class="col-md-4">
                    <h5 class="mb-3">Customer Hub</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="{{ url('/cart') }}"><i class="bi bi-bag me-1"></i> Shopping Cart</a></li>
                        <li class="mb-2"><a href="{{ url('/wishlist') }}"><i class="bi bi-heart me-1"></i> Wishlist</a></li>
                        <li class="mb-2"><a href="{{ url('/orders') }}"><i class="bi bi-receipt me-1"></i> Order History</a></li>
                        <li><a href="#"><i class="bi bi-question-circle me-1"></i> FAQ</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <span>© {{ date('Y') }} Mini Shop — Built for performance & style. All trademarks belong to their respective owners.</span>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- optional interactive effect to keep badge dynamic when cart updates (helper) --}}
    <script>
        (function() {
            // ensure cart badge updates based on server-side session (live reload not needed but just subtle)
            // This just listens to any potential fetch, but mostly visual enhancer
            const cartBadge = document.querySelector('.cart-badge');
            if (cartBadge) {
                let currentQty = parseInt(cartBadge.innerText) || 0;
                // small glow effect when page loads if qty > 0
                if (currentQty > 0) {
                    cartBadge.style.transform = 'scale(1.05)';
                    setTimeout(() => { cartBadge.style.transform = ''; }, 300);
                }
            }

            // optional : Add active state highlight for current nav link using robust
            const currentPath = window.location.pathname;
            const navLinks = document.querySelectorAll('.nav-link');
            navLinks.forEach(link => {
                const href = link.getAttribute('href');
                if (href && (currentPath === href || (href !== '/' && currentPath.startsWith(href)))) {
                    link.classList.add('active');
                } else if (href === '/' && currentPath === '/') {
                    link.classList.add('active');
                }
            });
        })();
    </script>
    @stack('scripts')
>>>>>>> 05db09b21274c2c101a3a70efef01a1844115506
</body>
</html>