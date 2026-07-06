<!DOCTYPE html>
<html lang="en">
<<<<<<< HEAD

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
=======
<head>
    <meta charset="UTF-8">
    <title>Admin Panel - Mini Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap 5 + Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Google Fonts (Inter) for modern look -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #f0f2f8;
            font-family: 'Inter', 'Segoe UI', system-ui, -apple-system, sans-serif;
            overflow-x: hidden;
        }

        /* ========= SIDEBAR MODERN ========= */
        .sidebar {
            width: 280px;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            background: #0a0f1c;
            backdrop-filter: blur(0px);
            color: #eef2ff;
            overflow-y: auto;
            transition: all 0.25s ease-in-out;
            z-index: 1050;
            box-shadow: 8px 0 30px rgba(0, 0, 0, 0.12);
            border-right: 1px solid rgba(255, 255, 255, 0.05);
        }

        /* scrollbar inside sidebar */
        .sidebar::-webkit-scrollbar {
            width: 5px;
        }
        .sidebar::-webkit-scrollbar-track {
            background: #141b2b;
        }
        .sidebar::-webkit-scrollbar-thumb {
            background: #fbbf24;
            border-radius: 10px;
        }

        .brand {
            padding: 28px 20px;
            text-align: center;
            font-size: 1.65rem;
            font-weight: 800;
            letter-spacing: -0.3px;
            background: linear-gradient(135deg, #FFFFFF 0%, #FBBF24 100%);
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
            border-bottom: 1px solid rgba(255,255,255,0.08);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        .brand i {
            background: none;
            background-clip: unset;
            -webkit-background-clip: unset;
            color: #fbbf24;
            font-size: 28px;
        }
        .brand span {
            background: linear-gradient(135deg, #fff, #fbbf24);
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            gap: 14px;
            color: #b9c3e2;
            text-decoration: none;
            padding: 12px 24px;
            margin: 4px 12px;
            border-radius: 14px;
            transition: all 0.2s;
            font-size: 0.95rem;
            font-weight: 500;
        }

        .sidebar a i {
            font-size: 1.35rem;
            width: 28px;
            text-align: center;
        }

        .sidebar a:hover {
            background: rgba(251, 191, 36, 0.12);
            color: #ffffff;
            transform: translateX(4px);
        }

        .sidebar a.active {
            background: #fbbf24;
            color: #0a0f1c;
            font-weight: 600;
            box-shadow: 0 6px 12px rgba(251, 191, 36, 0.25);
        }

        .sidebar a.active i {
            color: #0a0f1c;
        }

        hr {
            margin: 20px 20px;
            border-color: rgba(255,255,255,0.08);
        }

        /* logout button */
        .logout-btn {
            width: calc(100% - 40px);
            margin: 20px auto 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            border-radius: 40px;
            font-weight: 600;
            background: #dc2626;
            border: none;
            padding: 12px 0;
            font-size: 0.9rem;
            transition: 0.2s;
            color: white;
        }
        .logout-btn:hover {
            background: #b91c1c;
            transform: translateY(-2px);
            box-shadow: 0 6px 14px rgba(220,38,38,0.3);
        }

        /* main content area */
        .content {
            margin-left: 280px;
            min-height: 100vh;
            padding: 28px 32px;
            transition: all 0.25s;
        }

        /* topbar card */
        .topbar {
            background: #ffffff;
            padding: 18px 28px;
            border-radius: 28px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.03), 0 2px 4px rgba(0, 0, 0, 0.02);
            margin-bottom: 32px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            border: 1px solid rgba(0,0,0,0.03);
        }
        .topbar h4 {
            margin: 0;
            font-weight: 700;
            background: linear-gradient(135deg, #1e293b, #2d3a4e);
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
            letter-spacing: -0.2px;
            font-size: 1.65rem;
        }
        .topbar .badge-date {
            background: #f1f5f9;
            padding: 8px 18px;
            border-radius: 60px;
            font-size: 0.85rem;
            font-weight: 500;
            color: #334155;
        }

        /* card style */
        .card-box {
            border: none;
            border-radius: 28px;
            background: white;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05), 0 2px 4px rgba(0, 0, 0, 0.02);
            transition: all 0.25s ease;
            overflow: hidden;
        }
        .card-box:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 30px -12px rgba(0, 0, 0, 0.12);
        }

        /* responsive - tablet & mobile */
        @media (max-width: 992px) {
            .sidebar {
                width: 260px;
            }
            .content {
                margin-left: 260px;
                padding: 20px;
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                width: 280px;
                transition: transform 0.2s ease;
                z-index: 1060;
            }
            .sidebar.mobile-open {
                transform: translateX(0);
            }
            .content {
                margin-left: 0 !important;
                padding: 20px 16px;
            }
            .topbar h4 {
                font-size: 1.3rem;
            }
            /* hamburger menu btn */
            .mobile-menu-toggle {
                display: flex;
                align-items: center;
                justify-content: center;
                background: white;
                border-radius: 60px;
                padding: 8px 14px;
                box-shadow: 0 4px 12px rgba(0,0,0,0.05);
                border: none;
                font-weight: 500;
            }
        }

        @media (min-width: 769px) {
            .mobile-menu-toggle {
                display: none;
            }
            .sidebar-overlay {
                display: none;
            }
        }

        /* overlay for mobile sidebar */
        .sidebar-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.4);
            backdrop-filter: blur(3px);
            z-index: 1055;
            display: none;
        }
        .sidebar-overlay.active {
            display: block;
        }

        /* dashboard stats cards enhancements */
        .stat-icon {
            width: 54px;
            height: 54px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 20px;
            background: rgba(251, 191, 36, 0.12);
            color: #fbbf24;
            font-size: 28px;
        }

        /* alerts & tables inside content */
        .table-responsive-custom {
            border-radius: 24px;
            overflow: hidden;
        }

        /* button & form style override for admin */
        .btn-primary-custom {
            background: #fbbf24;
            border: none;
            color: #0f172a;
            font-weight: 600;
        }
        .btn-primary-custom:hover {
            background: #eab308;
            transform: scale(0.98);
        }

        footer small {
            opacity: 0.6;
        }

        /* smooth transitions */
        a, button {
            transition: all 0.2s;
        }
    </style>
    @stack('styles')
</head>
<body>

<!-- Mobile Overlay -->
<div class="sidebar-overlay" id="sidebarOverlay"></div>

<!-- SIDEBAR (modern) -->
<div class="sidebar" id="adminSidebar">
    <div class="brand">
        <i class="bi bi-shop-window"></i>
        <span>Mini Shop</span>
    </div>

    <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        <i class="bi bi-speedometer2"></i> <span>Dashboard</span>
    </a>

    <a href="{{ route('admin.products.index') }}" class="{{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
        <i class="bi bi-box-seam"></i> <span>Products</span>
    </a>

    <a href="{{ route('admin.categories.index') }}" class="{{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
        <i class="bi bi-grid-3x3-gap-fill"></i> <span>Categories</span>
    </a>

    <a href="{{ route('admin.brands.index') }}" class="{{ request()->routeIs('admin.brands.*') ? 'active' : '' }}">
        <i class="bi bi-tags"></i> <span>Brands</span>
    </a>

    <a href="{{ route('admin.orders.index') }}" class="{{ request()->routeIs('admin.orders.*') ? 'active' : '' }}">
        <i class="bi bi-cart-check"></i> <span>Orders</span>
    </a>

    <a href="{{ route('admin.users.index') }}" class="{{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
        <i class="bi bi-people"></i> <span>Users</span>
    </a>

    <a href="{{ route('admin.sliders.index') }}" class="{{ request()->routeIs('admin.sliders.*') ? 'active' : '' }}">
        <i class="bi bi-images"></i> <span>Sliders</span>
    </a>

    <a href="{{ route('admin.coupons.index') }}" class="{{ request()->routeIs('admin.coupons.*') ? 'active' : '' }}">
        <i class="bi bi-ticket-perforated"></i> <span>Coupons</span>
    </a>

    <a href="{{ route('admin.payments.index') }}" class="{{ request()->routeIs('admin.payments.*') ? 'active' : '' }}">
        <i class="bi bi-credit-card"></i> <span>Payments</span>
    </a>

    <a href="{{ route('admin.settings.index') }}" class="{{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
        <i class="bi bi-gear-wide-connected"></i> <span>Settings</span>
>>>>>>> 05db09b21274c2c101a3a70efef01a1844115506
    </a>

    <hr>

<<<<<<< HEAD
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

=======
    <a href="{{ route('home') }}" target="_self">
        <i class="bi bi-house-door"></i> <span>Back to Site</span>
    </a>

    <!-- LOGOUT with sweet confirm (optional but improved) -->
    <form method="POST" action="{{ route('logout') }}" id="logoutForm">
        @csrf
        <button type="button" class="btn btn-danger logout-btn" id="logoutBtn">
            <i class="bi bi-box-arrow-right"></i> Logout
        </button>
    </form>
</div>

<!-- MAIN CONTENT -->
<div class="content">
    <!-- TOPBAR with mobile toggle & greeting -->
    <div class="topbar">
        <div class="d-flex align-items-center gap-3">
            <button class="btn mobile-menu-toggle" id="mobileMenuToggle" style="background:#fff; border:1px solid #e9ecef;">
                <i class="bi bi-list fs-4"></i>
            </button>
            <h4><i class="bi bi-person-circle me-2" style="color:#fbbf24;"></i> Admin Panel</h4>
        </div>
        <div class="badge-date">
            <i class="bi bi-calendar-week"></i> 
            <span id="currentDate"></span>
        </div>
    </div>

    <!-- YIELD CONTENT (child pages) -->
    @yield('content')
</div>

<!-- Bootstrap JS + Custom Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 for better logout confirm (optional but adds pro feeling) -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    (function() {
        // ------------------------------
        // 1) Set current date in topbar
        const dateSpan = document.getElementById('currentDate');
        if (dateSpan) {
            const today = new Date();
            const options = { year: 'numeric', month: 'long', day: 'numeric' };
            dateSpan.innerText = today.toLocaleDateString(undefined, options);
        }

        // 2) Mobile Sidebar Toggle logic
        const sidebar = document.getElementById('adminSidebar');
        const overlay = document.getElementById('sidebarOverlay');
        const toggleBtn = document.getElementById('mobileMenuToggle');
        
        function closeMobileMenu() {
            if (sidebar && window.innerWidth <= 768) {
                sidebar.classList.remove('mobile-open');
                if (overlay) overlay.classList.remove('active');
                document.body.style.overflow = '';
            }
        }

        function openMobileMenu() {
            if (window.innerWidth <= 768) {
                sidebar.classList.add('mobile-open');
                if (overlay) overlay.classList.add('active');
                document.body.style.overflow = 'hidden';
            }
        }

        if (toggleBtn) {
            toggleBtn.addEventListener('click', (e) => {
                e.preventDefault();
                if (sidebar.classList.contains('mobile-open')) {
                    closeMobileMenu();
                } else {
                    openMobileMenu();
                }
            });
        }

        if (overlay) {
            overlay.addEventListener('click', () => {
                closeMobileMenu();
            });
        }

        // handle window resize: if screen > 768 and sidebar has mobile-open, remove classes
        window.addEventListener('resize', () => {
            if (window.innerWidth > 768) {
                if (sidebar) sidebar.classList.remove('mobile-open');
                if (overlay) overlay.classList.remove('active');
                document.body.style.overflow = '';
            }
        });

        // 3) Logout with SweetAlert confirmation - prevents accidental logout
        const logoutBtn = document.getElementById('logoutBtn');
        const logoutForm = document.getElementById('logoutForm');
        
        if (logoutBtn && logoutForm) {
            logoutBtn.addEventListener('click', (e) => {
                e.preventDefault();
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You will be logged out of the admin panel!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#dc2626',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Yes, logout',
                    cancelButtonText: 'Cancel',
                    backdrop: true,
                    background: '#fff',
                    customClass: {
                        popup: 'rounded-4 shadow-lg'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        // show loading
                        Swal.fire({
                            title: 'Logging out...',
                            text: 'Please wait',
                            icon: 'info',
                            showConfirmButton: false,
                            allowOutsideClick: false,
                            didOpen: () => {
                                Swal.showLoading();
                                logoutForm.submit();
                            }
                        });
                    }
                });
            });
        }
        
        // 4) Improve active route detection for categories and sub-paths (just make sure original blade also works)
        // We additionally add active parent style for dynamic sections. This is already handled by Laravel request()->routeIs()
        // but if child pages use nested routes like admin.products.edit, the class will match admin.products.* pattern.
        // For extra safety: manually highlight if needed for non-standard routes? Not required because of robust pattern.
        
        // 5) Add tooltip initializations for any element with data-bs-toggle="tooltip"
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
        
        // 6) Optional: add CSRF token to all ajax calls if any dynamic forms exist
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
        if (csrfToken) {
            window.axios = window.axios || {};
            // if you use axios, set default header, but not necessary
        }
        
        // 7) Improve card loading / add nice entrance
        document.body.classList.add('loaded');
        
        // 8) small console message for devs
        console.log('✅ Admin Panel Enhanced — Modern Layout Active');
    })();
</script>

<!-- Additional dynamic style for alerts & content wrapping -->
<style>
    /* smooth page transitions for child views */
    .content > * {
        animation: fadeSlideUp 0.3s ease-out;
    }
    @keyframes fadeSlideUp {
        from {
            opacity: 0;
            transform: translateY(12px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    /* custom table and buttons inside admin */
    .table thead th {
        background-color: #f8fafc;
        border-bottom: 2px solid #e2e8f0;
        font-weight: 600;
        color: #1e293b;
    }
    .btn-warning {
        background-color: #fbbf24;
        border-color: #fbbf24;
        color: #0f172a;
        font-weight: 500;
    }
    .btn-warning:hover {
        background-color: #eab308;
        border-color: #eab308;
    }
    /* better dropdown & pagination */
    .pagination .page-link {
        border-radius: 10px;
        margin: 0 4px;
        color: #1e293b;
        border: 1px solid #e2e8f0;
    }
    .pagination .active .page-link {
        background-color: #fbbf24;
        border-color: #fbbf24;
        color: #0f172a;
        font-weight: bold;
    }
    /* action buttons spacing */
    .action-btns {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }
    /* card style for dashboard widgets */
    .stat-card {
        padding: 1.2rem;
        border-radius: 28px;
    }
</style>

@stack('scripts')
>>>>>>> 05db09b21274c2c101a3a70efef01a1844115506
</body>
</html>