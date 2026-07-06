@extends('frontend.layouts.app')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card shadow border-0">

                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">
                        💳 Payment
                    </h4>
                </div>

                <div class="card-body">

                    {{-- Success Message --}}
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- Error Message --}}
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    {{-- Validation Errors --}}
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="mb-4">

                        <h5>Order Summary</h5>

                        <table class="table table-bordered">
                            <tr>
                                <th>Subtotal</th>
                                <td>${{ number_format($subtotal, 2) }}</td>
                            </tr>

                            <tr>
                                <th>Shipping</th>
                                <td>${{ number_format($shipping, 2) }}</td>
                            </tr>

                            <tr>
                                <th>Total</th>
                                <td>
                                    <strong>
                                        ${{ number_format($total_price, 2) }}
                                    </strong>
                                </td>
                            </tr>
                        </table>

                    </div>

                    <form action="{{ route('checkout.payment.process') }}"
                          method="POST">

                        @csrf

                        <h5 class="mb-3">
                            Select Payment Method
                        </h5>

                        {{-- Cash --}}
                        <div class="form-check border rounded p-3 mb-3">
                            <input class="form-check-input"
                                   type="radio"
                                   name="payment_method"
                                   value="cash"
                                   required>

                            <label class="form-check-label">
                                💵 Cash On Delivery
                            </label>
                        </div>

                        {{-- ABA --}}
                        <div class="form-check border rounded p-3 mb-3">
                            <input class="form-check-input"
                                   type="radio"
                                   name="payment_method"
                                   value="aba">

                            <label class="form-check-label">
                                🏦 ABA Bank
                            </label>
                        </div>

                        {{-- ACLEDA --}}
                        <div class="form-check border rounded p-3 mb-3">
                            <input class="form-check-input"
                                   type="radio"
                                   name="payment_method"
                                   value="acleda">

                            <label class="form-check-label">
                                🏦 ACLEDA Bank
                            </label>
                        </div>

                        {{-- Wing --}}
                        <div class="form-check border rounded p-3 mb-3">
                            <input class="form-check-input"
                                   type="radio"
                                   name="payment_method"
                                   value="wing">

                            <label class="form-check-label">
                                📱 Wing Money
                            </label>
                        </div>

                        {{-- QR Payment --}}
                        <div class="border rounded p-3 mb-4 text-center">

                            <h6>QR Payment</h6>

                            <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=SportShop"
                                 alt="QR Code"
                                 class="img-fluid">

                            <p class="mt-2 text-muted">
                                Scan QR with ABA, ACLEDA, or Wing App
                            </p>

                        </div>

                        <button type="submit"
                                class="btn btn-success w-100">

                            Place Order

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection