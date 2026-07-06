@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">

    <h2 class="mb-4">Order Details</h2>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>
        </div>
    @endif

    {{-- Error Message --}}
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            {{ session('error') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>
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

    <div class="card shadow-sm">
        <div class="card-body">

            <div class="row mb-3">
                <div class="col-md-12">
                    <strong>User:</strong>
                    {{ $order->user->name ?? 'Guest' }}
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-6">
                    <strong>Total:</strong>
                    ${{ number_format($order->total_price, 2) }}
                </div>

                <div class="col-md-6">
                    <strong>Current Status:</strong>
                    <span class="badge bg-info">
                        {{ ucfirst($order->status) }}
                    </span>
                </div>
            </div>

            <hr>

            <form method="POST" action="{{ route('admin.orders.update', $order->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">
                        Order Status
                    </label>

                    <select name="status" class="form-control">

                        <option value="pending"
                            {{ $order->status == 'pending' ? 'selected' : '' }}>
                            Pending
                        </option>

                        <option value="processing"
                            {{ $order->status == 'processing' ? 'selected' : '' }}>
                            Processing
                        </option>

                        <option value="shipped"
                            {{ $order->status == 'shipped' ? 'selected' : '' }}>
                            Shipped
                        </option>

                        <option value="delivered"
                            {{ $order->status == 'delivered' ? 'selected' : '' }}>
                            Delivered
                        </option>

                        <option value="cancelled"
                            {{ $order->status == 'cancelled' ? 'selected' : '' }}>
                            Cancelled
                        </option>

                    </select>
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-success">
                        Update Status
                    </button>

                    <a href="{{ route('admin.orders.index') }}"
                       class="btn btn-secondary">
                        Back
                    </a>
                </div>

            </form>

        </div>
    </div>

</div>

@endsection