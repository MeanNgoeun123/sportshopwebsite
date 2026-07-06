@extends('frontend.layouts.app')

@section('content')

<<<<<<< HEAD
<style>
body{
    background:#f5f7fa;
}

.category-title{
    text-align:center;
    font-size:42px;
    font-weight:700;
    margin-bottom:40px;
    color:#222;
}

.product-card{
    border:none;
    border-radius:20px;
    overflow:hidden;
    background:#fff;
    box-shadow:0 10px 25px rgba(0,0,0,.08);
    transition:.3s ease;
}

.product-card:hover{
    transform:translateY(-8px);
}

.product-image{
    width:100%;
    height:280px;
    object-fit:cover;
}

.product-name{
    font-size:22px;
    font-weight:700;
    color:#222;
    margin-bottom:15px;
}

.product-price{
    font-size:30px;
    font-weight:700;
    color:#198754;
    margin-bottom:20px;
}

.view-btn{
    border-radius:10px;
    padding:10px;
    font-weight:600;
}

.empty-box{
    background:#fff;
    padding:30px;
    border-radius:15px;
}
</style>

<div class="container py-5">

    <h1 class="category-title">
        Category: {{ $category->name }}
    </h1>

    <div class="row g-4">

        @forelse($products as $product)

            <div class="col-lg-3 col-md-4 col-sm-6">

                <div class="card product-card h-100">

                    <img
                        src="{{ $product->image ? asset('storage/'.$product->image) : asset('images/no-image.jpg') }}"
                        alt="{{ $product->name }}"
                        class="product-image">

                    <div class="card-body d-flex flex-column">

                        <h5 class="product-name">
                            {{ $product->name }}
                        </h5>

                        <div class="product-price">
                            ${{ number_format($product->price,2) }}
                        </div>

                        <a href="{{ url('/product/'.$product->id) }}"
                           class="btn btn-dark view-btn mt-auto">
                            View Product
                        </a>

                    </div>
=======
<div class="container py-4">

    <h2 class="mb-4">Category: {{ $category->name }}</h2>

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

                <div class="alert alert-warning text-center empty-box">
                    No products found in this category.
                </div>

            </div>
=======
        </div>

        @empty

        <div class="col-12">
            <div class="alert alert-warning text-center">
                No products in this category
            </div>
        </div>
>>>>>>> 05db09b21274c2c101a3a70efef01a1844115506

        @endforelse

    </div>

</div>

@endsection