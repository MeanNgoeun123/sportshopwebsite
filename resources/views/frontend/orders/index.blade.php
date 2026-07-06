@extends('frontend.layouts.app')

@section('content')

<div class="container py-5">

    <h2 class="mb-4">
        <i class="bi bi-bag"></i> My Orders
    </h2>

    <div class="card shadow-sm border-0">

        <div class="card-body">

            @forelse($orders as $order)

                <div class="d-flex justify-content-between align-items-center border-bottom py-3">

                    <div>
                        <h5 class="mb-1">
                            Order #{{ $order->id }}
                        </h5>

                        <small class="text-muted">
                            {{ optional($order->created_at)->format('d M Y') ?? 'N/A' }}
                        </small>
                    </div>

                    <span class="badge bg-{{ $order->status === 'delivered' ? 'success' : 'warning' }}">
                        {{ $order->status ?? 'Pending' }}
                    </span>

                </div>

            @empty

                <div class="text-center py-5">
                    <h5>No Orders Found</h5>
                    <p class="text-muted">You haven't placed any orders yet.</p>

                    <a href="{{ route('shop') }}" class="btn btn-primary mt-2">
                        Start Shopping
                    </a>
                </div>

            @endforelse

        </div>

    </div>

</div>

@endsection