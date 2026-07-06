@extends('admin.layouts.app')

@section('content')

<<<<<<< HEAD
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="fw-bold">📦 Orders</h3>
    </div>

    {{-- FILTERS --}}
    <form method="GET" action="{{ route('admin.orders.index') }}" class="d-flex gap-2 mb-3 flex-wrap">

        <input type="text"
               name="search"
               value="{{ request('search') }}"
               class="form-control"
               placeholder="Search order/user">

        <select name="status" class="form-select">
            <option value="">All</option>
            <option value="pending">Pending</option>
            <option value="processing">Processing</option>
            <option value="shipped">Shipped</option>
            <option value="delivered">Delivered</option>
            <option value="cancelled">Cancelled</option>
        </select>

        <input type="text"
               id="date_range"
               name="date_range"
               value="{{ request('date_range') }}"
               class="form-control"
               placeholder="Select date range">

        <button class="btn btn-primary">Search</button>

        <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">Reset</a>

    </form>

    {{-- TABLE --}}
    <div class="card shadow-sm">
        <div class="card-body p-0">

            <table class="table table-hover align-middle mb-0">

                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>

                <tbody>

                    @php
                        $colors = [
                            'pending'=>'warning',
                            'processing'=>'primary',
                            'shipped'=>'info',
                            'delivered'=>'success',
                            'cancelled'=>'danger'
                        ];
                    @endphp

                    @forelse($orders as $order)

                        <tr>

                            <td>
    <span class="badge bg-secondary px-3 py-2 rounded-pill copy-id"
          data-id="{{ $order->id }}"
          style="cursor:pointer;">
        #{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}
    </span>
</td>

                            <td>{{ optional($order->user)->name ?? 'Guest' }}</td>

                            <td>${{ number_format($order->total_price,2) }}</td>

                            {{-- ✅ SIMPLE STATUS (NO DROPDOWN) --}}
                            <td>
                                <span class="badge bg-{{ $colors[$order->status] ?? 'secondary' }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>

                            <td>
                                {{ $order->created_at->format('d M Y') }}
                            </td>

                            <td class="text-end">

                                <a href="{{ route('admin.orders.show',$order->id) }}"
                                   class="btn btn-primary btn-sm">
                                    View
                                </a>

                                <button class="btn btn-danger btn-sm delete-order"
                                        data-id="{{ $order->id }}">
                                    Delete
                                </button>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">
                                No orders found
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>
    </div>

    {{-- PAGINATION --}}
    <div class="mt-3 d-flex justify-content-center">
        {{ $orders->withQueryString()->links('pagination::bootstrap-5') }}
    </div>

</div>

{{-- JS --}}
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
    
flatpickr("#date_range", {
    mode: "range",
    dateFormat: "Y-m-d"
});

/* =========================
   AJAX DELETE (FIXED)
========================= */
document.querySelectorAll('.delete-order').forEach(btn => {
    btn.addEventListener('click', function () {

        if (!confirm('Delete this order?')) return;

        let id = this.dataset.id;
        let row = this.closest('tr');

        fetch(`/admin/orders/${id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            }
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                row.remove();
            } else {
                alert('Failed to delete');
            }
        })
        .catch(err => {
            console.log(err);
            alert('Error deleting');
        });

    });
});

document.querySelectorAll('.copy-id').forEach(el => {
    el.addEventListener('click', function () {
        navigator.clipboard.writeText(this.dataset.id);
        alert('Order ID copied!');
    });
});

</script>
=======
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
>>>>>>> 05db09b21274c2c101a3a70efef01a1844115506

@endsection