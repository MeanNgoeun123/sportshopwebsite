@extends('frontend.layouts.app')

@section('content')

{{-- ================= SLIDER ================= --}}
@if(isset($sliders) && $sliders->count() > 0)

<div id="homeSlider" class="carousel slide mb-5" data-bs-ride="carousel">

    <div id="homeSlider" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">

    <div class="carousel-inner">

        @foreach($sliders as $key => $slider)

        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">

            <img src="{{ asset('storage/' . $slider->image) }}"
                 class="d-block w-100"
                 style="height: 500px; object-fit: cover;">

            <div class="carousel-caption d-none d-md-block">
                <h2 class="fw-bold">{{ $slider->title }}</h2>
                <p>{{ $slider->subtitle }}</p>
            </div>

        </div>

        @endforeach

    </div>

    {{-- Controls --}}
    <button class="carousel-control-prev" type="button" data-bs-target="#homeSlider" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>

    <button class="carousel-control-next" type="button" data-bs-target="#homeSlider" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>


</div>

@endif


<section class="container mb-5">

    <h2 class="section-title text-center mb-4">Popular Brands</h2>

    <div class="row g-4">

        @forelse($brands as $brand)

        <div class="col-lg-3 col-md-4 col-sm-6">

            <div class="card product-card h-100 border-0 shadow-sm">

                <img
                    src="{{ asset('storage/' . ($brand->logo ?? $brand->image ?? '')) }}"
                    onerror="this.src='https://via.placeholder.com/400x250'"
                    class="card-img-top p-3"
                    style="height:220px;object-fit:contain;">

                <div class="card-body text-center">

                    <h5 class="fw-bold">{{ $brand->name }}</h5>

                    <a href="{{ url('/brand/'.$brand->id) }}"
                       class="btn btn-primary w-100 mt-2">
                        View Brand
                    </a>

                </div>

            </div>

        </div>

        @empty
        <div class="col-12">
            <div class="alert alert-warning text-center">No Brands Found</div>
        </div>
        @endforelse

    </div>

</section>
<section class="container mb-5">

    <h2 class="section-title text-center mb-4">Shop By Categories</h2>

    <div class="row g-4">

        @forelse($categories as $category)

        <div class="col-lg-3 col-md-4 col-sm-6">

            <div class="card product-card h-100 border-0 shadow-sm">

                <img
                    src="{{ $category->image 
                        ? asset('storage/' . $category->image) 
                        : 'https://via.placeholder.com/400x250' }}"
                    class="card-img-top"
                    style="height:220px;object-fit:cover;">

                <div class="card-body text-center">

                    <h5 class="fw-bold">{{ $category->name }}</h5>

                    <a href="{{ url('/category/'.$category->id) }}"
                       class="btn btn-outline-dark w-100 mt-2">
                        Browse Category
                    </a>

                </div>

            </div>

        </div>

        @empty
        <div class="col-12">
            <div class="alert alert-warning text-center">No Categories Found</div>
        </div>
        @endforelse

    </div>

</section>
<section class="container mb-5">

    <h2 class="section-title text-center mb-4">Latest Products</h2>

    <div class="row g-4">

        @forelse($products as $product)

        <div class="col-lg-3 col-md-4 col-sm-6">

            <div class="card product-card h-100 border-0 shadow-sm">

                <img
                    src="{{ $product->image 
                        ? asset('storage/' . $product->image) 
                        : 'https://via.placeholder.com/400x250' }}"
                    class="card-img-top"
                    style="height:250px;object-fit:cover;">

                <div class="card-body">

                    <h5 class="fw-bold">{{ $product->name }}</h5>

                    <div class="text-success fw-bold fs-5">
                        ${{ number_format($product->price, 2) }}
                    </div>

                </div>

                <div class="card-footer bg-white border-0">

                    <a href="{{ url('/product/'.$product->id) }}"
                       class="btn btn-dark w-100">
                        View Product
                    </a>

                </div>

            </div>

        </div>

        @empty
        <div class="col-12">
            <div class="alert alert-warning text-center">No Products Found</div>
        </div>
        @endforelse

    </div>

</section>