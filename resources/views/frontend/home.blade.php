@extends('frontend.layouts.app')

@section('content')

{{-- ================= SLIDER ================= --}}
@if(isset($sliders) && $sliders->count() > 0)

<div id="homeSlider" class="carousel slide carousel-fade mb-5" data-bs-ride="carousel">


{{-- Indicators --}}
<div class="carousel-indicators">
    @foreach($sliders as $key => $slider)
        <button type="button"
                data-bs-target="#homeSlider"
                data-bs-slide-to="{{ $key }}"
                class="{{ $key == 0 ? 'active' : '' }}"
                aria-current="{{ $key == 0 ? 'true' : 'false' }}"
                aria-label="Slide {{ $key + 1 }}">
        </button>
    @endforeach
</div>

@if(isset($sliders) && $sliders->count() > 0)

<div id="homeSlider" class="carousel slide carousel-fade" data-bs-ride="carousel">

    {{-- Indicators --}}
    <div class="carousel-indicators">
        @foreach($sliders as $key => $slider)
            <button type="button"
                data-bs-target="#homeSlider"
                data-bs-slide-to="{{ $key }}"
                class="{{ $key == 0 ? 'active' : '' }}">
            </button>
        @endforeach
    </div>

    {{-- Slides --}}
    <div class="carousel-inner">

        @foreach($sliders as $key => $slider)
        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">

            <img src="{{ asset('storage/' . $slider->image) }}"
                 class="d-block w-100 slider-image"
                 alt="{{ $slider->title }}">

            <div class="carousel-caption">
                <h1 class="fw-bold">{{ $slider->title }}</h1>

                @if($slider->subtitle)
                    <p class="lead">{{ $slider->subtitle }}</p>
                @endif

               {{-- 🔥 SHOP NOW BUTTON --}} <a href="{{ url('/shop') }}" class="btn-shop"> Shop Now </a>
            </div>

        </div>
        @endforeach

    </div>

   

@endif
</div>

{{-- Controls --}}
<button class="carousel-control-prev"
        type="button"
        data-bs-target="#homeSlider"
        data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
</button>

<button class="carousel-control-next"
        type="button"
        data-bs-target="#homeSlider"
        data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
</button>


</div>


@endif


<style>
/* Remove white space around slider */
.container-fluid.slider-wrapper{
    padding:0;
    margin:0;
}

/* Slider */
#homeSlider{
    width:100%;
}

#homeSlider .carousel-item{
    position:relative;
}

/* Image */
.slider-image{
    width:100%;
    height:650px;
    object-fit:cover;
    object-position:center top;
}

/* Dark overlay */
.carousel-item::before{
    content:"";
    position:absolute;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background:rgba(0,0,0,.45);
    z-index:1;
}

/* Caption */
.carousel-caption{
    z-index:2;
    top:50%;
    bottom:auto;
    transform:translateY(-50%);
}

.slider-content h1{
    color:#fff;
    font-size:60px;
    font-weight:800;
    margin-bottom:15px;
}

.slider-content p{
    color:#fff;
    font-size:22px;
    margin-bottom:20px;
}

/* Arrows */
.carousel-control-prev,
.carousel-control-next{
    z-index:3;
}

/* Mobile */
@media(max-width:768px){

    .slider-image{
        height:350px;
    }

    .slider-content h1{
        font-size:32px;
    }

    .slider-content p{
        font-size:16px;
    }
}
.btn-shop{
    display: inline-flex;
    align-items: center;
    gap: 8px;

    margin-top: 18px;
    padding: 12px 30px;

    font-size: 16px;
    font-weight: 600;
    color: #fff;
    text-decoration: none;

    border-radius: 50px;

    background: linear-gradient(135deg, #ff3d00, #ff9100);

    box-shadow: 
        0 6px 0 #c62d00,              /* bottom depth (3D base) */
        0 10px 25px rgba(255, 61, 0, 0.35);

    position: relative;

    transition: all 0.15s ease;

    animation: floatBtn 3s ease-in-out infinite;
}

/* 🔥 Hover (lift effect) */
.btn-shop:hover{
    transform: translateY(-3px);
    box-shadow: 
        0 9px 0 #c62d00,
        0 15px 35px rgba(255, 61, 0, 0.45);
}

/* 🔥 Active (REAL 3D PRESS DOWN EFFECT) */
.btn-shop:active{
    transform: translateY(5px);
    box-shadow: 
        0 2px 0 #c62d00,
        0 5px 15px rgba(255, 61, 0, 0.25);
}

/* Icon */
.btn-shop i{
    font-size: 18px;
}

/* Floating animation */
@keyframes floatBtn {
    0%   { transform: translateY(0px); }
    50%  { transform: translateY(-6px); }
    100% { transform: translateY(0px); }
}
</style>

{{-- ================= CATEGORIES ================= --}}
<section class="mb-5">

    <div class="container">

        <h2 class="section-title">Shop By Categories</h2>

        <div class="row">

            @forelse($categories as $category)

                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">

                    <div class="card category-card h-100">

                        <div class="category-image-wrapper">

                            <img
                                src="{{ $category->image
                                    ? asset('storage/' . $category->image)
                                    : 'https://via.placeholder.com/400x400' }}"
                                class="category-image"
                                alt="{{ $category->name }}">

                        </div>

                        <div class="card-body text-center">

                            <h5 class="category-name">
                                {{ $category->name }}
                            </h5>

                            <a href="{{ url('/category/'.$category->id) }}"
                               class="btn btn-outline-dark w-100 category-btn">
                                Browse Category
                            </a>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12">
                    <div class="alert alert-warning text-center">
                        No Categories Found
                    </div>
                </div>

            @endforelse

        </div>

    </div>

</section>
<style>
/* Categories */
.section-title{
    text-align:center;
    font-size:42px;
    font-weight:700;
    margin-bottom:40px;
}

.category-card{
    border:none;
    border-radius:15px;
    overflow:hidden;
    box-shadow:0 5px 15px rgba(0,0,0,.1);
    transition:.3s;
}

.category-card:hover{
    transform:translateY(-5px);
}

.category-image-wrapper{
    width:100%;
    height:250px;
    overflow:hidden;
}

.category-image{
    width:100%;
    height:100%;
    object-fit:cover;
    display:block;
    border-radius:0 !important;
}

.category-name{
    font-size:20px;
    font-weight:600;
    margin-bottom:15px;
}

.category-btn{
    border-radius:10px;
}
</style>
</section>


{{-- ================= BRANDS ================= --}}
<section class="py-5">

    <div class="container">

        <h2 class="section-title">Popular Brands</h2>

        <div class="row">

            @forelse($brands as $brand)

                @php
                    $brandImage = $brand->logo ?? $brand->image;
                @endphp

                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">

                    <div class="card product-card h-100">

                        <img
                            src="{{ $brandImage
                                ? asset('storage/' . $brandImage)
                                : 'https://via.placeholder.com/400x250' }}"
                            class="card-img-top brand-image"
                            alt="{{ $brand->name }}">

                        <div class="card-body text-center">

                            <h5 class="fw-bold">{{ $brand->name }}</h5>

                            <a href="{{ url('/brand/'.$brand->id) }}"
                               class="btn btn-primary rounded-pill w-100">
                                View Brand
                            </a>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12">
                    <div class="alert alert-warning">
                        No Brands Found
                    </div>
                </div>

            @endforelse

        </div>

    </div>
    

</section>
<style>
.section-title{
    text-align:center;
    font-size:2.5rem;
    font-weight:700;
    color:#1f2937;
    margin-bottom:50px;
}

.section-title::after{
    content:'';
    display:block;
    width:90px;
    height:4px;
    background:#2563eb;
    margin:12px auto 0;
    border-radius:20px;
}

.product-card{
    border:none;
    border-radius:20px;
    overflow:hidden;
    transition:.3s;
    box-shadow:0 5px 15px rgba(0,0,0,.08);
}

.product-card:hover{
    transform:translateY(-6px);
    box-shadow:0 15px 35px rgba(0,0,0,.15);
}

.brand-image{
    height:220px;
    width:100%;
    object-fit:contain;
    padding:20px;
    background:#fff;
}
</style>
</section>


{{-- ================= PRODUCTS ================= --}}

<section class="mb-5">


<div class="container">

    <h2 class="section-title">Latest Products</h2>

    <div class="row">

        @forelse($products as $product)

        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">

            <div class="card product-card h-100">

                <div class="product-image-wrapper">

                    <img
                        src="{{ $product->image
                            ? asset('storage/' . $product->image)
                            : 'https://via.placeholder.com/400x400' }}"
                        class="product-image"
                        alt="{{ $product->name }}">

                </div>

                <div class="card-body d-flex flex-column">

                    <h5 class="product-title">
                        {{ $product->name }}
                    </h5>

                    <div class="product-price">
                        ${{ number_format($product->price, 2) }}
                    </div>

                    <div class="mt-auto">

                        <a href="{{ url('/product/'.$product->id) }}"
                           class="btn btn-dark product-btn">
                            View Product
                        </a>

                    </div>

                </div>

            </div>

        </div>

        @empty

        <div class="col-12">
            <div class="alert alert-warning">
                No Products Found
            </div>
        </div>

        @endforelse

    </div>

</div>

</section>

<style>

.product-card{
    border:none;
    border-radius:20px;
    overflow:hidden;
    background:#fff;
    transition:.3s ease;
    box-shadow:0 5px 15px rgba(0,0,0,.08);
}

.product-card:hover{
    transform:translateY(-8px);
    box-shadow:0 15px 35px rgba(0,0,0,.15);
}

.product-image-wrapper{
    width:100%;
    aspect-ratio:1/1;
    overflow:hidden;
    background:#f8f9fa;
}

.product-image{
    width:100%;
    height:100%;
    object-fit:cover;
    transition:.4s;
}

.product-card:hover .product-image{
    transform:scale(1.05);
}

.product-card .card-body{
    padding:20px;
}

.product-title{
    font-size:22px;
    font-weight:700;
    color:#222;
    line-height:1.4;
    margin-bottom:12px;
    min-height:60px;
}

.product-price{
    color:#198754;
    font-size:32px;
    font-weight:700;
    margin-bottom:20px;
}

.product-btn{
    width:100%;
    border-radius:50px;
    padding:12px;
    font-size:16px;
    font-weight:600;
}

@media(max-width:768px){

    .product-title{
        font-size:18px;
        min-height:auto;
    }

    .product-price{
        font-size:24px;
    }

    .product-btn{
        padding:10px;
    }
}

</style>


</section>

{{-- ================= CUSTOM CSS ================= --}}

<style>

.section-title{
    font-size:2rem;
    font-weight:700;
    margin-bottom:30px;
    position:relative;
}

.section-title::after{
    content:'';
    display:block;
    width:80px;
    height:4px;
    background:#0d6efd;
    margin-top:10px;
    border-radius:10px;
}

.slider-image{
    width:100%;
    height:600px;
    object-fit:cover;
}

.carousel-item{
    position:relative;
}

.carousel-item::before{
    content:'';
    position:absolute;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background:rgba(0,0,0,.45);
    z-index:1;
}

.carousel-caption{
    z-index:2;
    bottom:50%;
    transform:translateY(50%);
}

.slider-content{
    max-width:700px;
    margin:auto;
}

.slider-content h1{
    font-size:3rem;
    color:#fff;
}

.slider-content p{
    color:#f8f9fa;
}

.product-card{
    transition:all .3s ease;
}

.product-card:hover{
    transform:translateY(-8px);
    box-shadow:0 15px 30px rgba(0,0,0,.15)!important;
}

.btn{
    transition:.3s;
}

@media(max-width:768px){

    .slider-image{
        height:300px;
    }

    .slider-content h1{
        font-size:1.8rem;
    }

    .slider-content p{
        font-size:1rem;
    }

    .carousel-caption{
        bottom:20px;
        transform:none;
    }

    .section-title{
        font-size:1.5rem;
    }
}

</style>

@endsection
