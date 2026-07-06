<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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

</body>
</html>