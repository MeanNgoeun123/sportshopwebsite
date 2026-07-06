@extends('frontend.layouts.app')

@section('content')

<<<<<<< HEAD
<style>
.cart-title {
    font-weight: 800;
    letter-spacing: 0.5px;
}

/* TABLE CARD STYLE */
.cart-table {
    background: #fff;
    border-radius: 14px;
    overflow: hidden;
    box-shadow: 0 8px 22px rgba(0,0,0,0.08);
}

/* HEADER */
.table thead {
    background: linear-gradient(135deg, #111, #2c2c2c);
    color: #fff;
}

.table td,
.table th {
    vertical-align: middle;
    font-size: 14px;
    padding: 12px;
}

/* QTY BADGE */
.qty-badge {
    background: #f1f3f5;
    padding: 6px 12px;
    border-radius: 10px;
    font-weight: 600;
    display: inline-block;
}

/* PRICE STYLE */
.price {
    color: #e63946 !important;
    font-weight: 800;
    font-size: 15px;
}

/* SUMMARY BOX */
.cart-summary {
    background: linear-gradient(135deg, #0d6efd, #14759b);
    color: #fff;
    padding: 22px;
    border-radius: 14px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.12);
}

/* CHECKOUT BUTTON */
.btn-checkout {
    border-radius: 10px;
    font-weight: 700;
    padding: 10px;
    transition: 0.3s ease;
}

.btn-checkout:hover {
    transform: scale(1.02);
}

/* REMOVE BUTTON */
.btn-remove {
    border-radius: 8px;
    transition: 0.3s ease;
}

.btn-remove:hover {
    transform: scale(1.05);
}
</style>

<div class="container py-4">

    <h3 class="cart-title mb-4">🛒 Your Cart</h3>

    @if($cartItems->count() > 0)

    <div class="table-responsive cart-table">

        <table class="table align-middle mb-0">

            <thead>
=======
<div class="container py-4">

    <h3>Your Cart</h3>

    @if($cartItems->count() > 0)

    <div class="table-responsive mt-3">

        <table class="table table-bordered align-middle">

            <thead class="table-dark">
>>>>>>> 05db09b21274c2c101a3a70efef01a1844115506
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

                @php $total = 0; @endphp

                @foreach($cartItems as $item)

                    @php
                        $price = $item->product?->price ?? 0;
                        $name = $item->product?->name ?? 'Product Removed';
                        $subtotal = $price * $item->quantity;
                        $total += $subtotal;
                    @endphp

                    <tr>
<<<<<<< HEAD

                        <td class="fw-semibold">
                            {{ $name }}
                        </td>

                        <td class="price">
                            ${{ number_format($price, 2) }}
                        </td>

                        <td>
                            <span class="qty-badge">
                                {{ $item->quantity }}
                            </span>
                        </td>

                        <td class="price">
                            ${{ number_format($subtotal, 2) }}
                        </td>
=======
                        <td>{{ $name }}</td>

                        <td>${{ number_format($price, 2) }}</td>

                        <td>{{ $item->quantity }}</td>

                        <td>${{ number_format($subtotal, 2) }}</td>
>>>>>>> 05db09b21274c2c101a3a70efef01a1844115506

                        <td>
                            <form action="{{ route('cart.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')

<<<<<<< HEAD
                                <button class="btn btn-danger btn-sm btn-remove">
                                    🗑 Remove
                                </button>
                            </form>
                        </td>

=======
                                <button class="btn btn-danger btn-sm">
                                    Remove
                                </button>
                            </form>
                        </td>
>>>>>>> 05db09b21274c2c101a3a70efef01a1844115506
                    </tr>

                @endforeach

            </tbody>

        </table>

    </div>

<<<<<<< HEAD
    <!-- SUMMARY -->
    <div class="cart-summary mt-4">

        <h4 class="mb-3">
            Total: <span class="price">${{ number_format($total, 2) }}</span>
        </h4>

        <a href="{{ url('/checkout') }}" class="btn btn-success btn-checkout w-100">
            ✅ Checkout Now
        </a>

    </div>

    @else

        <div class="alert alert-warning mt-3">
            Your cart is empty 🛒
=======
    <div class="mt-3">
        <h4>Total: ${{ number_format($total, 2) }}</h4>
    </div>

    <a href="{{ url('/checkout') }}" class="btn btn-success mt-2">
        Checkout
    </a>

    @else

        <div class="alert alert-warning mt-3">
            Your cart is empty
>>>>>>> 05db09b21274c2c101a3a70efef01a1844115506
        </div>

        <a href="{{ url('/shop') }}" class="btn btn-primary">
            Continue Shopping
        </a>

    @endif

</div>

@endsection