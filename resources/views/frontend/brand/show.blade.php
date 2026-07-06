@extends('frontend.layouts.app')

@section('content')

<<<<<<< HEAD
<style>
.brand-page{
    background:#f4f6f9;
    min-height:100vh;
    padding:70px 0;
}

.brand-header{
    text-align:center;
    margin-bottom:50px;
}

.brand-header h1{
    font-size:48px;
    font-weight:800;
    color:#111827;
}

.brand-header p{
    color:#6b7280;
    font-size:18px;
}

.product-card{
    background:#fff;
    border:none;
    border-radius:20px;
    overflow:hidden;
    transition:all .3s ease;
    box-shadow:0 10px 30px rgba(0,0,0,.08);
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
    font-size:30px;
    font-weight:800;
    color:#16a34a;
    margin-bottom:20px;
}

.view-btn{
    width:100%;
    border:none;
    border-radius:12px;
    padding:12px;
    background:#111827;
    color:#fff;
    font-weight:600;
    transition:.3s;
}

.view-btn:hover{
    background:#2563eb;
    color:#fff;
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

<section class="brand-page">

    <div class="container">

        <div class="brand-header">
            <h1>{{ $brand->name }}</h1>
            <p>Explore premium products from this brand</p>
        </div>

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

                        <a href="{{ url('/product/'.$product->id) }}"
                           class="btn view-btn mt-auto">
                            View Product
                        </a>

                    </div>
=======
<div class="container py-4">

    <h2 class="mb-4">Brand: {{ $brand->name }}</h2>

    <div class="row">

        @forelse($products as $product)

        <div class="col-md-3 mb-4">

            <div class="card h-100 shadow-sm">

                <img src="{{ $product->image 
                            ? asset('storage/'.$product->image) 
                            : 'https://via.placeholder.com/300x300' }}"
                     class="card-img-top"
                     style="height:200px;object-fit:cover;">

                <div class="card-body">

                    <h6>{{ $product->name }}</h6>

                    <p class="text-success">
                        ${{ number_format($product->price, 2) }}
                    </p>

                    <a href="{{ url('/product/'.$product->id) }}"
                       class="btn btn-outline-dark btn-sm w-100">
                        View Product
                    </a>
>>>>>>> 05db09b21274c2c101a3a70efef01a1844115506

                </div>

            </div>

<<<<<<< HEAD
            @empty

            <div class="col-12">
                <div class="empty-box">
                    <h4>No Products Found</h4>
                    <p>This brand currently has no products available.</p>
                </div>
            </div>

            @endforelse

        </div>

    </div>

</section>
=======
        </div>

        @empty

        <div class="col-12">
            <div class="alert alert-warning text-center">
                No products for this brand
            </div>
        </div>

        @endforelse

    </div>

</div>
>>>>>>> 05db09b21274c2c101a3a70efef01a1844115506

@endsection