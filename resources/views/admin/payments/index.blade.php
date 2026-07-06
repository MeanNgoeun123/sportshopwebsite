@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">

    <h2 class="mb-4">Payments</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">

            <table class="table table-bordered table-striped">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Order ID</th>
                        <th>Payment Method</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th width="180">Action</th>
                    </tr>
                </thead>

                <tbody>

                @forelse($payments as $payment)

                    <tr>
                        <td>{{ $payment->id }}</td>

                        <td>
                            #{{ $payment->order_id }}
                        </td>

                        <td>
                            {{ ucfirst($payment->payment_method) }}
                        </td>

                        <td>
                            ${{ number_format($payment->amount, 2) }}
                        </td>

                        <td>
                            <span class="badge bg-{{
                                $payment->payment_status == 'paid'
                                ? 'success'
                                : ($payment->payment_status == 'failed'
                                    ? 'danger'
                                    : 'warning')
                            }}">
                                {{ ucfirst($payment->payment_status) }}
                            </span>
                        </td>

                        <td>
                            {{ $payment->created_at?->format('d M Y') }}
                        </td>

                        <td>

                            <a href="{{ route('admin.payments.show', $payment->id) }}"
                               class="btn btn-primary btn-sm">
                                View
                            </a>

                            <form action="{{ route('admin.payments.destroy', $payment->id) }}"
                                  method="POST"
                                  style="display:inline;"
                                  onsubmit="return confirm('Delete payment?')">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger btn-sm">
                                    Delete
                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="7" class="text-center">
                            No payments found.
                        </td>
                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>
    </div>

</div>

@endsection