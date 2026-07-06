@extends('admin.layouts.app')

@section('content')

<div class="container">

    <h2>Payment Details</h2>

    <div class="card p-3">

        <p><b>Order ID:</b> {{ $payment->order_id }}</p>
        <p><b>Method:</b> {{ $payment->method }}</p>
        <p><b>Amount:</b> ${{ $payment->amount }}</p>

        <form method="POST" action="{{ route('admin.payments.update', $payment->id) }}">
            @csrf
            @method('PUT')

            <label>Status</label>
            <select name="status" class="form-control mb-3">
                <option value="pending" {{ $payment->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="paid" {{ $payment->status == 'paid' ? 'selected' : '' }}>Paid</option>
                <option value="failed" {{ $payment->status == 'failed' ? 'selected' : '' }}>Failed</option>
            </select>

            <button class="btn btn-success">Update</button>
        </form>

    </div>

</div>

@endsection