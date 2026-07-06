@extends('frontend.layouts.app')

@section('content')

<div class="container py-4">

    <h3>Your Cart</h3>

    @if($cartItems->count() > 0)

    <div class="table-responsive mt-3">

        <table class="table table-bordered align-middle">

            <thead class="table-dark">
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
                        <td>{{ $name }}</td>

                        <td>${{ number_format($price, 2) }}</td>

                        <td>{{ $item->quantity }}</td>

                        <td>${{ number_format($subtotal, 2) }}</td>

                        <td>
                            <form action="{{ route('cart.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm">
                                    Remove
                                </button>
                            </form>
                        </td>
                    </tr>

                @endforeach

            </tbody>

        </table>

    </div>

    <div class="mt-3">
        <h4>Total: ${{ number_format($total, 2) }}</h4>
    </div>

    <a href="{{ url('/checkout') }}" class="btn btn-success mt-2">
        Checkout
    </a>

    @else

        <div class="alert alert-warning mt-3">
            Your cart is empty
        </div>

        <a href="{{ url('/shop') }}" class="btn btn-primary">
            Continue Shopping
        </a>

    @endif

</div>

@endsection