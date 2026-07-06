@extends('frontend.layouts.app')

@section('content')

<<<<<<< HEAD
<style>
.shop-section{
    background:#f8fafc;
    min-height:100vh;
    padding:60px 0;
}

.shop-title{
    text-align:center;
    font-size:48px;
    font-weight:800;
    color:#111827;
    margin-bottom:50px;
}

.product-card{
    border:none;
    border-radius:20px;
    overflow:hidden;
    background:#fff;
    transition:all .3s ease;
    box-shadow:0 10px 25px rgba(0,0,0,.08);
}

.product-card:hover{
    transform:translateY(-10px);
    box-shadow:0 20px 40px rgba(0,0,0,.15);
}

.product-image{
    width:100%;
    height:280px;
    object-fit:cover;
}

.product-body{
    padding:20px;
}

.product-name{
    font-size:20px;
    font-weight:700;
    color:#111827;
    margin-bottom:10px;
}

.product-price{
    font-size:28px;
    font-weight:800;
    color:#16a34a;
    margin-bottom:10px;
}

.stock{
    font-size:14px;
    font-weight:600;
    margin-bottom:20px;
}

.stock-in{
    color:#16a34a;
}

.stock-out{
    color:#dc2626;
}

.view-btn{
    width:100%;
    border:none;
    border-radius:12px;
    padding:12px;
    background:#111827;
    color:white;
    font-weight:600;
    transition:.3s;
}

.view-btn:hover{
    background:#2563eb;
    color:white;
}

.product-badge{
    position:absolute;
    top:15px;
    left:15px;
    background:#ef4444;
    color:white;
    padding:6px 12px;
    border-radius:20px;
    font-size:12px;
    font-weight:700;
}

.empty-box{
    background:white;
    padding:40px;
    border-radius:20px;
    text-align:center;
    box-shadow:0 5px 15px rgba(0,0,0,.08);
}
</style>

<section class="shop-section">

    <div class="container">

        <h1 class="shop-title">
            Shop All Products
        </h1>

        <div class="row g-4">

            @forelse($products as $product)

            <div class="col-xl-3 col-lg-4 col-md-6">

                <div class="card product-card h-100 position-relative">

                    <span class="product-badge">
                        New
                    </span>

                    <img
                        src="{{ $product->image ? asset('storage/'.$product->image) : 'https://via.placeholder.com/500x500' }}"
                        alt="{{ $product->name }}"
                        class="product-image">

                    <div class="product-body d-flex flex-column">

                        <h5 class="product-name">
                            {{ $product->name }}
                        </h5>

                        <div class="product-price">
                            ${{ number_format($product->price,2) }}
                        </div>

                        @if($product->stock > 0)
                            <div class="stock stock-in">
                                ✓ In Stock ({{ $product->stock }})
                            </div>
                        @else
                            <div class="stock stock-out">
                                Out Of Stock
                            </div>
                        @endif

                        <a href="{{ url('/product/'.$product->id) }}"
                           class="btn view-btn mt-auto">
                            View Product
                        </a>

                    </div>

                </div>

            </div>

            @empty

            <div class="col-12">

                <div class="empty-box">

                    <h3>No Products Found</h3>

                    <p class="text-muted mb-0">
                        Products will appear here when available.
                    </p>

=======
<div class="container py-4">

    <h3 class="mb-4">Shop All Products</h3>

    <div class="row mt-3">

        @forelse($products as $product)

        <div class="col-md-3 mb-4">

            <div class="card product-card shadow-sm h-100">

                {{-- PRODUCT IMAGE --}}
                <img src="{{ $product->image 
                            ? asset('storage/' . $product->image) 
                            : 'https://via.placeholder.com/300x300' }}"
                     class="card-img-top"
                     style="height:200px; object-fit:cover;">

                <div class="card-body d-flex flex-column">

                    <h6>{{ $product->name }}</h6>

                    {{-- PRICE --}}
                    <p class="price text-success fw-bold mb-1">
                        ${{ number_format($product->price, 2) }}
                    </p>

                    {{-- STOCK --}}
                    @if($product->stock > 0)
                        <small class="text-success mb-2">
                            In Stock ({{ $product->stock }})
                        </small>
                    @else
                        <small class="text-danger mb-2">
                            Out of Stock
                        </small>
                    @endif

                    {{-- BUTTON --}}
                    <a href="{{ url('/product/'.$product->id) }}"
                       class="btn btn-outline-dark btn-sm w-100 mt-auto">
                        View
                    </a>

>>>>>>> 05db09b21274c2c101a3a70efef01a1844115506
                </div>

            </div>

<<<<<<< HEAD
            @endforelse

        </div>

    </div>

</section>
=======
        </div>

        @empty

        <div class="col-12">
            <div class="alert alert-warning text-center">
                No Products Found
            </div>
        </div>

        @endforelse

    </div>

</div>
>>>>>>> 05db09b21274c2c101a3a70efef01a1844115506

@endsection