@extends('frontend.layouts.app')

@section('content')

<style>
.orders-title {
    font-weight: 800;
}

/* CARD */
.order-card {
    border: none;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 8px 22px rgba(0,0,0,0.06);
}

/* ORDER ITEM */
.order-item {
    padding: 18px;
    border-bottom: 1px solid #c7950a;
}

/* STATUS STEPS */
.track {
    display: flex;
    justify-content: space-between;
    margin-top: 12px;
    position: relative;
}

.track::before {
    content: "";
    position: absolute;
    top: 12px;
    left: 0;
    right: 0;
    height: 3px;
    background: #cc2711;
    z-index: 0;
}

.step {
    text-align: center;
    position: relative;
    z-index: 1;
    flex: 1;
}

.step-circle {
    width: 25px;
    height: 25px;
    border-radius: 50%;
    background: #af085c;
    margin: 0 auto;
    line-height: 25px;
    font-size: 12px;
    color: #f8e009;
}

.step-label {
    font-size: 12px;
    margin-top: 5px;
    color: #1e5a8f;
}

/* ACTIVE */
.step.active .step-circle {
    background: #0d6efd;
}

.step.active .step-label {
    color: #0d6efd;
    font-weight: 600;
}

.step.done .step-circle {
    background: #198754;
}

.step.done .step-label {
    color: #198754;
}
</style>

<div class="container py-5">

    <h2 class="mb-4 orders-title">
        🧾 My Orders Tracking
    </h2>

    <div class="card order-card">

        <div class="card-body p-0">

            @forelse($orders as $order)

                @php
                    $status = strtolower($order->status ?? 'processing');
                @endphp

                <div class="order-item">

                    <div class="d-flex justify-content-between">

                        <div>
                            <h5 class="mb-1">Order #{{ $order->id }}</h5>
                            <small class="text-muted">
                                {{ optional($order->created_at)->format('d M Y') }}
                            </small>
                        </div>

                        <span class="badge bg-dark">
                            {{ ucfirst($status) }}
                        </span>

                    </div>

                    <!-- TRACKING -->
                    <div class="track mt-3">

                        <!-- PROCESSING -->
                        <div class="step {{ in_array($status, ['processing','shipped','delivered']) ? 'done' : '' }}">
                            <div class="step-circle">1</div>
                            <div class="step-label">Processing</div>
                        </div>

                        <!-- SHIPPED -->
                        <div class="step {{ in_array($status, ['shipped','delivered']) ? 'done' : '' }}">
                            <div class="step-circle">2</div>
                            <div class="step-label">Shipped</div>
                        </div>

                        <!-- DELIVERED -->
                        <div class="step {{ $status === 'delivered' ? 'done' : '' }}">
                            <div class="step-circle">3</div>
                            <div class="step-label">Delivered</div>
                        </div>

                    </div>

                </div>

            @empty

                <div class="text-center p-5">
                    <h5>No Orders Found</h5>
                    <p class="text-muted">You haven't placed any orders yet.</p>
                    <a href="{{ route('shop') }}" class="btn btn-primary">
                        🛍 Start Shopping
                    </a>
                </div>

            @endforelse

        </div>

    </div>

</div>

@endsection