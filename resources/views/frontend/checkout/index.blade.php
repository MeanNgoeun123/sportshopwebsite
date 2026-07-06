@extends('frontend.layouts.app')

@section('content')

<div class="container py-5">

    <h2 class="fw-bold mb-4">
        🛒 Shopping Cart
    </h2>

    {{-- SUCCESS --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- ERROR --}}
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- EMPTY CART --}}
    @if($cartItems->count() == 0)

        <div class="card shadow-sm border-0">
            <div class="card-body text-center py-5">

                <h4>Your cart is empty</h4>
                <p class="text-muted">Add some products to start shopping.</p>

                <a href="{{ route('shop') }}" class="btn btn-primary">
                    Continue Shopping
                </a>

            </div>
        </div>

    @else

        @php $subtotal = 0; @endphp

        <div class="row">

            {{-- CART ITEMS --}}
            <div class="col-lg-8">

                <div class="card border-0 shadow-sm">
                    <div class="card-body">

                        @foreach($cartItems as $item)

                            @php
                                $price = $item->product->price ?? 0;
                                $lineTotal = $price * $item->quantity;
                                $subtotal += $lineTotal;
                            @endphp

                            <div class="row align-items-center border-bottom py-3">

                                {{-- IMAGE --}}
                                <div class="col-md-2">
                                    <img
                                        src="{{ $item->product && $item->product->image
                                            ? asset('storage/'.$item->product->image)
                                            : asset('images/no-image.png') }}"
                                        class="img-fluid rounded"
                                        alt="">
                                </div>

                                {{-- NAME --}}
                                <div class="col-md-4">
                                    <h6 class="mb-1">
                                        {{ $item->product->name ?? 'Deleted Product' }}
                                    </h6>

                                    <small class="text-muted">
                                        ${{ number_format($price, 2) }}
                                    </small>
                                </div>

                                {{-- UPDATE --}}
                                <div class="col-md-3">

                                    <form action="{{ route('cart.update', $item->id) }}"
                                          method="POST">

                                        @csrf
                                        @method('PUT')

                                        <input type="number"
                                               name="quantity"
                                               value="{{ $item->quantity }}"
                                               min="1"
                                               class="form-control mb-2">

                                        <button class="btn btn-primary btn-sm w-100">
                                            Update
                                        </button>

                                    </form>

                                </div>

                                {{-- TOTAL --}}
                                <div class="col-md-2 text-end">
                                    <strong>${{ number_format($lineTotal, 2) }}</strong>
                                </div>

                                {{-- DELETE --}}
                                <div class="col-md-1 text-end">

                                    <form action="{{ route('cart.destroy', $item->id) }}"
                                          method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger btn-sm">
                                            ×
                                        </button>

                                    </form>

                                </div>

                            </div>

                        @endforeach

                        {{-- CLEAR CART --}}
                        <div class="mt-4">

                            <form action="{{ route('cart.clear') }}" method="POST">
                                @csrf
                                <button class="btn btn-outline-danger">
                                    Clear Cart
                                </button>
                            </form>

                        </div>

                    </div>
                </div>

            </div>

            {{-- SUMMARY --}}
            <div class="col-lg-4">

                @php
                    $shipping = 5;
                    $total = $subtotal + $shipping;
                @endphp

                <div class="card border-0 shadow-sm">
                    <div class="card-body">

                        <h5>Order Summary</h5>

                        <hr>

                        <div class="d-flex justify-content-between">
                            <span>Subtotal</span>
                            <span>${{ number_format($subtotal, 2) }}</span>
                        </div>

                        <div class="d-flex justify-content-between">
                            <span>Shipping</span>
                            <span>${{ number_format($shipping, 2) }}</span>
                        </div>

                        <hr>

                        <div class="d-flex justify-content-between fw-bold fs-5">
                            <span>Total</span>
                            <span>${{ number_format($total, 2) }}</span>
                        </div>

                        <a href="{{ route('checkout.shipping') }}"
                           class="btn btn-success w-100 mt-3">

                            Proceed To Shipping

                        </a>

                        <a href="{{ route('shop') }}"
                           class="btn btn-outline-secondary w-100 mt-2">

                            Continue Shopping

                        </a>

                    </div>
                </div>

            </div>

        </div>

    @endif

</div>

@endsection