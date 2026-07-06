@extends('frontend.layouts.app')

@section('content')

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

                </div>

            </div>

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

@endsection