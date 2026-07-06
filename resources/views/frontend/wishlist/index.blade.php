@extends('frontend.layouts.app')

@section('content')

<<<<<<< HEAD
<style>
/* 🌟 Page */
.wishlist-title {
    font-weight: 800;
    letter-spacing: 0.5px;
}

/* 🌟 Card */
.wishlist-card {
    border: none;
    border-radius: 16px;
    overflow: hidden;
    background: #ffffff; /* ✅ clean white */
    transition: all 0.3s ease;
    box-shadow: 0 6px 18px rgba(0,0,0,0.08);
}

.wishlist-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 12px 30px rgba(0,0,0,0.12);
}

/* 🌟 Image */
.wishlist-img {
    width: 100%;
    height: 220px;
    object-fit: contain; /* ✅ show full image */
    background: #f8f9fa; /* nice background */
    padding: 10px;
}

.wishlist-card:hover .wishlist-img {
    transform: scale(1.08);
}

/* 🌟 Product name */
.product-name {
    font-size: 14px;
    font-weight: 600;
    height: 38px;
    overflow: hidden;
    color: #333;
}

/* 🌟 Price */
.price {
    color: #1de16f;
    font-weight: 800;
    font-size: 16px;
}

.price::before {
    content: "💰 ";
}

/* 🌟 Button */
.btn-view {
    border-radius: 10px;
}

.empty-box {
    padding: 60px 20px;
    background: #f8f9fa;
    border-radius: 12px;
}
</style>

<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="wishlist-title">❤️ My Wishlist</h3>
    </div>

    @if($wishlists && $wishlists->count() > 0)

        <div class="row g-3">

            @foreach($wishlists as $item)

                @if($item->product)

                    @php
                        $product = $item->product;

                        $img = $product->image
                            ? asset('storage/' . $product->image)
                            : asset('images/no-image.png');
                    @endphp

                    <div class="col-6 col-md-3">

                        <div class="wishlist-card h-100">

                            <a href="{{ url('/product/'.$product->id) }}">
                                <img src="{{ $img }}"
                                     class="wishlist-img"
                                     alt="{{ $product->name }}"
                                     onerror="this.src='{{ asset('images/no-image.png') }}'">
                            </a>

                            <div class="p-3 d-flex flex-column">

                                <div class="product-name mb-2">
                                    {{ $product->name }}
                                </div>

                                @if(!empty($product->price))
                                    <div class="price mb-2">
                                        ${{ $product->price }}
                                    </div>
                                @endif

                                <div class="mt-auto">

                                    <a href="{{ url('/product/'.$product->id) }}"
                                       class="btn btn-dark btn-sm w-100 btn-view">
                                        👁 View Product
                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>

                @endif

            @endforeach

        </div>

    @else

        <div class="text-center empty-box">
            <h5>😢 Your wishlist is empty</h5>
            <p class="text-muted">Start adding products you love!</p>
            <a href="{{ url('/') }}" class="btn btn-dark mt-2">
                🛍 Continue Shopping
            </a>
        </div>

    @endif

=======
<h3>Wishlist</h3>

<div class="row">
@foreach($wishlists as $item)
    <div class="col-md-3 mb-3">

        <div class="card">

            <img src="{{ asset('products/'.$item->product->image) }}"
                 class="card-img-top">

            <div class="card-body">
                <h6>{{ $item->product->name }}</h6>

                <a href="/product/{{ $item->product->id }}"
                   class="btn btn-dark btn-sm">
                    View
                </a>
            </div>

        </div>

    </div>
@endforeach
>>>>>>> 05db09b21274c2c101a3a70efef01a1844115506
</div>

@endsection