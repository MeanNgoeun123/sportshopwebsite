@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Admin Dashboard</h2>
        <span class="text-muted">Welcome back 👋</span>
    </div>

    <!-- STATS CARDS -->
    <div class="row g-4">

        <!-- PRODUCTS -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 p-3 stat-card">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted">Products</h6>
                        <h2 class="fw-bold">{{ $products }}</h2>
                    </div>
                    <div class="icon-box bg-primary text-white">
                        <i class="bi bi-box fs-3"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- ORDERS -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 p-3 stat-card">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted">Orders</h6>
                        <h2 class="fw-bold">{{ $orders }}</h2>
                    </div>
                    <div class="icon-box bg-success text-white">
                        <i class="bi bi-cart fs-3"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- USERS -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 p-3 stat-card">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted">Users</h6>
                        <h2 class="fw-bold">{{ $users }}</h2>
                    </div>
                    <div class="icon-box bg-warning text-white">
                        <i class="bi bi-people fs-3"></i>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- EXTRA SECTION -->
    <div class="row mt-5">

        <div class="col-md-6">
            <div class="card border-0 shadow-sm rounded-4 p-4">
                <h5 class="fw-bold">Quick Actions</h5>
                <hr>
                <a href="/admin/products/create" class="btn btn-primary w-100 mb-2">
                    + Add New Product
                </a>
                <a href="/admin/orders" class="btn btn-success w-100 mb-2">
                    View Orders
                </a>
                <a href="/admin/users" class="btn btn-dark w-100">
                    Manage Users
                </a>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card border-0 shadow-sm rounded-4 p-4">
                <h5 class="fw-bold">System Overview</h5>
                <hr>
                <p class="text-muted">
                    Your SportShop admin panel is running smoothly.
                    Manage products, orders, and users easily.
                </p>

                <div class="progress mb-2">
                    <div class="progress-bar bg-primary" style="width: 70%"></div>
                </div>
                <small class="text-muted">System Health: 70%</small>
            </div>
        </div>

    </div>

</div>

<!-- STYLES -->
<style>
.stat-card {
    transition: 0.3s;
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
}

.icon-box {
    width: 60px;
    height: 60px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
}
</style>

@endsection