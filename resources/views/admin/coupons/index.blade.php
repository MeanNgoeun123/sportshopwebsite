@extends('admin.layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Coupons</h2>

    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createCoupon">
        + Add Coupon
    </button>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<!-- TABLE -->
<div class="card p-3">

    <table class="table table-bordered align-middle">

        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Code</th>
                <th>Discount</th>
                <th>Type</th>
                <th>Expires</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
        @foreach($coupons as $coupon)
            <tr>
                <td>{{ $coupon->id }}</td>
                <td><strong>{{ $coupon->code }}</strong></td>
                <td>{{ $coupon->discount }}</td>
                <td>{{ $coupon->type }}</td>
                <td>{{ $coupon->expires_at ?? 'No limit' }}</td>
                <td>
                    <span class="badge bg-{{ $coupon->status ? 'success' : 'danger' }}">
                        {{ $coupon->status ? 'Active' : 'Inactive' }}
                    </span>
                </td>
                <td>

                    <!-- EDIT -->
                    <button class="btn btn-warning btn-sm"
                            data-bs-toggle="modal"
                            data-bs-target="#editCoupon{{ $coupon->id }}">
                        Edit
                    </button>

                    <!-- DELETE -->
                    <form action="{{ route('admin.coupons.destroy', $coupon->id) }}"
                          method="POST"
                          style="display:inline;">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Delete coupon?')">
                            Delete
                        </button>
                    </form>

                </td>
            </tr>

            <!-- EDIT MODAL -->
            <div class="modal fade" id="editCoupon{{ $coupon->id }}">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5>Edit Coupon</h5>
                            <button class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">

                            <form method="POST"
                                  action="{{ route('admin.coupons.store') }}">
                                @csrf

                                <input type="hidden" name="id" value="{{ $coupon->id }}">

                                <input type="text"
                                       name="code"
                                       value="{{ $coupon->code }}"
                                       class="form-control mb-2"
                                       placeholder="Coupon Code">

                                <input type="number"
                                       name="discount"
                                       value="{{ $coupon->discount }}"
                                       class="form-control mb-2"
                                       placeholder="Discount">

                                <select name="type" class="form-control mb-2">
                                    <option value="percent" {{ $coupon->type == 'percent' ? 'selected' : '' }}>Percent</option>
                                    <option value="fixed" {{ $coupon->type == 'fixed' ? 'selected' : '' }}>Fixed</option>
                                </select>

                                <input type="date"
                                       name="expires_at"
                                       value="{{ $coupon->expires_at }}"
                                       class="form-control mb-2">

                                <select name="status" class="form-control mb-2">
                                    <option value="1" {{ $coupon->status ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ !$coupon->status ? 'selected' : '' }}>Inactive</option>
                                </select>

                                <button class="btn btn-success w-100">
                                    Update
                                </button>

                            </form>

                        </div>

                    </div>
                </div>
            </div>

        @endforeach
        </tbody>

    </table>

</div>

<!-- CREATE MODAL -->
<div class="modal fade" id="createCoupon">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5>Create Coupon</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">

                <form method="POST" action="{{ route('admin.coupons.store') }}">
                    @csrf

                    <input type="text"
                           name="code"
                           class="form-control mb-2"
                           placeholder="Coupon Code">

                    <input type="number"
                           name="discount"
                           class="form-control mb-2"
                           placeholder="Discount">

                    <select name="type" class="form-control mb-2">
                        <option value="percent">Percent</option>
                        <option value="fixed">Fixed</option>
                    </select>

                    <input type="date"
                           name="expires_at"
                           class="form-control mb-2">

                    <select name="status" class="form-control mb-2">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>

                    <button class="btn btn-primary w-100">
                        Save Coupon
                    </button>

                </form>

            </div>

        </div>
    </div>
</div>

@endsection