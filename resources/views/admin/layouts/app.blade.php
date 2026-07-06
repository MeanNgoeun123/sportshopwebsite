<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<title>Admin Panel - SportShop</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<style>

body {
    background:#f8fafc;
    font-family:"Segoe UI", sans-serif;
    transition:0.3s;
}

/* ================= SIDEBAR ================= */
.sidebar {
    width:270px;
    height:100vh;
    position:fixed;
    left:0;
    top:0;
    background:linear-gradient(180deg,#0f172a,#1e293b);
    padding:25px 18px;
}

.brand {
    text-align:center;
    color:white;
    font-size:22px;
    font-weight:700;
    margin-bottom:20px;
}

/* DARK BUTTON */
.dark-toggle {
    width:100%;
    margin-bottom:15px;
}

/* MENU */
.sidebar a {
    display:flex;
    align-items:center;
    gap:12px;
    color:#cbd5e1;
    text-decoration:none;
    padding:12px 15px;
    margin-bottom:8px;
    border-radius:12px;
    transition:0.3s;
}

.sidebar a:hover {
    background:rgba(255,255,255,0.10);
    color:white;
    transform:translateX(6px);
}

.sidebar a.active {
    background:linear-gradient(135deg,#facc15,#f59e0b);
    color:#111;
    font-weight:700;
}

/* CONTENT */
.content {
    margin-left:270px;
    padding:25px;
}

/* CARD */
.card-box {
    border:none;
    border-radius:15px;
    box-shadow:0 10px 25px rgba(0,0,0,0.08);
    background:white;
}

/* ================= DARK MODE ================= */
body.dark-mode {
    background:#0f172a !important;
    color:#e2e8f0 !important;
}

body.dark-mode .card-box {
    background:#1e293b !important;
    color:#e2e8f0 !important;
}

body.dark-mode .sidebar {
    background:#020617 !important;
}

body.dark-mode table {
    color:#e2e8f0 !important;
}


</style>

</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">

    <div class="brand">🏀 SportShop Admin</div>

    <!-- DARK MODE -->
    <button class="btn btn-sm btn-outline-light dark-toggle" onclick="toggleDarkMode()">
        🌙 Dark Mode
    </button>

    <!-- MENU -->
    <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active':'' }}">
        <i class="bi bi-speedometer2"></i> Dashboard
    </a>
    
    

    <a href="{{ route('admin.products.index') }}" class="{{ request()->routeIs('admin.products.*') ? 'active':'' }}">
        <i class="bi bi-box"></i> Products
    </a>

    <a href="{{ route('admin.categories.index') }}" class="{{ request()->routeIs('admin.categories.*') ? 'active':'' }}">
        <i class="bi bi-list"></i> Categories
    </a>
    <a href="{{ route('admin.sliders.index') }}"
   class="{{ request()->routeIs('admin.sliders.*') ? 'active' : '' }}">
    <i class="bi bi-images"></i> Slides
</a>

    <!-- ✅ BRANDS FIXED -->
    <a href="{{ route('admin.brands.index') }}" class="{{ request()->routeIs('admin.brands.*') ? 'active':'' }}">
        <i class="bi bi-tags"></i> Brands
    </a>

    <a href="{{ route('admin.orders.index') }}" class="{{ request()->routeIs('admin.orders.*') ? 'active':'' }}">
        <i class="bi bi-cart"></i> Orders
    </a>

    <a href="{{ route('admin.users.index') }}" class="{{ request()->routeIs('admin.users.*') ? 'active':'' }}">
        <i class="bi bi-people"></i> Users
    </a>
    <a href="{{ route('admin.payments.index') }}" class="{{ request()->routeIs('admin.payments.*') ? 'active':'' }}">
    <i class="bi bi-credit-card"></i> Payments
</a>

    <a href="{{ route('admin.settings.index') }}" class="{{ request()->routeIs('admin.settings.*') ? 'active':'' }}">
        <i class="bi bi-gear"></i> Settings
    </a>

    <hr>

    <a href="{{ route('home') }}">
        <i class="bi bi-house"></i> Back To Site
    </a>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="btn btn-danger w-100 mt-2">
            <i class="bi bi-box-arrow-right"></i> Logout
        </button>
    </form>

</div>

<!-- CONTENT -->
<div class="content">
    @yield('content')
</div>

<!-- DARK MODE SCRIPT -->
<script>
function toggleDarkMode() {
    document.body.classList.toggle("dark-mode");

    localStorage.setItem(
        "darkMode",
        document.body.classList.contains("dark-mode") ? "on" : "off"
    );
}

document.addEventListener("DOMContentLoaded", function () {
    if (localStorage.getItem("darkMode") === "on") {
        document.body.classList.add("dark-mode");
    }
});
</script>

</body>
</html>