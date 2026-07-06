@extends('frontend.layouts.app')

@section('content')

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
</div>

@endsection