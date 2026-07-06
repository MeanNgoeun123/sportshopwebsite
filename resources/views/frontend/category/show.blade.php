@extends('frontend.layouts.app')

@section('content')

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

                </div>

            </div>

        @empty

            <div class="col-12">

                <div class="alert alert-warning text-center empty-box">
                    No products found in this category.
                </div>

            </div>

        @endforelse

    </div>

</div>

@endsection