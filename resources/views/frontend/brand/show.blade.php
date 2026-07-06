@extends('frontend.layouts.app')

@section('content')

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

                </div>

            </div>

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

@endsection