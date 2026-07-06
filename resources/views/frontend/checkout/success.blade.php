@extends('frontend.layouts.app')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card border-0 shadow text-center">

                <div class="card-body p-5">

                    {{-- SUCCESS ICON --}}
                    <div class="mb-4">
                        <i class="bi bi-check-circle-fill text-success"
                           style="font-size: 5rem;"></i>
                    </div>

                    {{-- SUCCESS MESSAGE --}}
                    <h2 class="fw-bold text-success mb-3">
                        Payment Successful!
                    </h2>

                    <p class="text-muted mb-4">
                        Thank you for your purchase.
                        Your order has been placed successfully and is now being processed.
                    </p>

                    {{-- ORDER INFO --}}
                    @if(session('order_id'))
                        <div class="alert alert-light border">
                            <strong>Order ID:</strong>
                            #{{ session('order_id') }}
                        </div>
                    @endif

                    {{-- ACTION BUTTONS --}}
                    <div class="d-flex justify-content-center gap-2 flex-wrap">

                        <a href="{{ route('orders') }}"
                           class="btn btn-primary">

                            <i class="bi bi-bag-check"></i>
                            View My Orders

                        </a>

                        <a href="{{ route('shop') }}"
                           class="btn btn-outline-secondary">

                            <i class="bi bi-shop"></i>
                            Continue Shopping

                        </a>

                        <a href="{{ route('home') }}"
                           class="btn btn-outline-dark">

                            <i class="bi bi-house"></i>
                            Back Home

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection