@extends('frontend.layouts.app')

@section('content')
<div class="container py-5">

    <div class="card shadow border-0">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">
                <i class="bi bi-bag-check"></i>
                Order Details
            </h4>
        </div>

        <div class="card-body">

            <div class="row mb-4">
                <div class="col-md-6">
                    <h6>Order ID</h6>
                    <p>#{{ $order->id }}</p>
                </div>

                <div class="col-md-6">
                    <h6>Status</h6>
                    <span class="badge bg-success">
                        {{ ucfirst($order->status) }}
                    </span>
                </div>
            </div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($order->orderItems as $item)
                        <tr>
                            <td>{{ $item->product->name ?? 'Product Deleted' }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>${{ number_format($item->price, 2) }}</td>
                            <td>${{ number_format($item->quantity * $item->price, 2) }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">
                                No order items found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="text-end mt-3">
                <h4>
                    Total:
                    ${{ number_format($order->total_price, 2) }}
                </h4>
            </div>

            <a href="{{ route('orders.index') }}" class="btn btn-secondary mt-3">
                <i class="bi bi-arrow-left"></i>
                Back to Orders
            </a>

        </div>
    </div>

</div>
@endsection