@extends('frontend.layouts.app')

@section('content')

<div class="container py-4">

    {{-- ALERT MESSAGES --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            {{ session('error') }}
            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row g-4">

        {{-- PRODUCT IMAGE --}}
        <div class="col-md-5">

            <div class="card border-0 shadow-sm">
                <div class="card-body text-center">

                    <img
                        src="{{ $product->image
                                ? asset('storage/'.$product->image)
                                : 'https://via.placeholder.com/500x500?text=No+Image' }}"
                        alt="{{ $product->name }}"
                        class="img-fluid rounded">

                </div>
            </div>

        </div>

        {{-- PRODUCT INFO --}}
        <div class="col-md-7">

            <h2 class="fw-bold mb-3">
                {{ $product->name }}
            </h2>

            <h3 class="text-success mb-3">
                ${{ number_format($product->price, 2) }}
            </h3>

            @if($product->category)
                <p class="mb-2">
                    <strong>Category:</strong>
                    {{ $product->category->name }}
                </p>
            @endif

            @if($product->brand)
                <p class="mb-2">
                    <strong>Brand:</strong>
                    {{ $product->brand->name }}
                </p>
            @endif

            <div class="mb-3">
                <strong>Description</strong>
                <p class="text-muted">
                    {{ $product->description }}
                </p>
            </div>

            {{-- STOCK --}}
            <div class="mb-4">

                @if($product->stock > 0)
                    <span class="badge bg-success fs-6">
                        In Stock ({{ $product->stock }})
                    </span>
                @else
                    <span class="badge bg-danger fs-6">
                        Out Of Stock
                    </span>
                @endif

            </div>

            @auth

                {{-- ADD TO CART --}}
                <form action="{{ route('cart.store') }}" method="POST">

                    @csrf

                    <input type="hidden"
                           name="product_id"
                           value="{{ $product->id }}">

                    <div class="mb-3">

                        <label class="form-label">
                            Quantity
                        </label>

                        <input type="number"
                               name="quantity"
                               value="1"
                               min="1"
                               max="{{ $product->stock }}"
                               class="form-control"
                               style="width:120px">

                    </div>

                    <button type="submit"
                            class="btn btn-primary"
                            {{ $product->stock <= 0 ? 'disabled' : '' }}>

                        <i class="bi bi-cart-plus"></i>
                        Add To Cart

                    </button>

                </form>

                {{-- WISHLIST --}}
                <form action="{{ route('wishlist.add', $product->id) }}"
                      method="POST"
                      class="mt-3">

                    @csrf

                    <button type="submit"
                            class="btn btn-outline-danger">

                        <i class="bi bi-heart"></i>
                        Add To Wishlist

                    </button>

                </form>

            @else

                <a href="{{ route('login') }}"
                   class="btn btn-dark">

                    Login To Purchase

                </a>

            @endauth

        </div>

    </div>

</div>

@endsection