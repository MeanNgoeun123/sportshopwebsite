@extends('admin.layouts.app')

@section('content')

<h2>Orders</h2>

<table class="table table-bordered bg-white">

    <thead>
        <tr>
            <th>ID</th>
            <th>User</th>
            <th>Total</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        @forelse($orders as $order)
        <tr>
            <td>{{ $order->id }}</td>

            <td>{{ $order->user->name ?? 'Guest' }}</td>

            <td>${{ number_format($order->total_price, 2) }}</td>

            <td>
                <span class="badge bg-info">
                    {{ ucfirst($order->status) }}
                </span>
            </td>

            <td>
                <a href="{{ route('admin.orders.show', $order->id) }}"
                   class="btn btn-primary btn-sm">
                    View
                </a>

                <form action="{{ route('admin.orders.destroy', $order->id) }}"
                      method="POST"
                      style="display:inline;"
                      onsubmit="return confirm('Delete this order?')">

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center">
                No orders found.
            </td>
        </tr>
        @endforelse
    </tbody>

</table>

@endsection