@extends('admin.layouts.app')

@section('content')

<div class="container">

    <h2>Reviews</h2>

    <table class="table table-bordered bg-white">

        <tr>
            <th>ID</th>
            <th>User</th>
            <th>Product</th>
            <th>Rating</th>
            <th>Status</th>
            <th>Action</th>
        </tr>

        @foreach($reviews as $review)
        <tr>

            <td>{{ $review->id }}</td>

            <td>{{ $review->user->name ?? '-' }}</td>

            <td>{{ $review->product->name ?? '-' }}</td>

            <td>
                ⭐ {{ $review->rating }}/5
            </td>

            <td>
                <span class="badge bg-{{ $review->status == 'approved' ? 'success' : 'warning' }}">
                    {{ $review->status }}
                </span>
            </td>

            <td>

                <!-- APPROVE -->
                <form action="{{ route('admin.reviews.update', $review->id) }}"
                      method="POST"
                      style="display:inline;">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="status" value="approved">

                    <button class="btn btn-success btn-sm">
                        Approve
                    </button>
                </form>

                <!-- REJECT -->
                <form action="{{ route('admin.reviews.update', $review->id) }}"
                      method="POST"
                      style="display:inline;">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="status" value="rejected">

                    <button class="btn btn-warning btn-sm">
                        Reject
                    </button>
                </form>

                <!-- DELETE -->
                <form action="{{ route('admin.reviews.destroy', $review->id) }}"
                      method="POST"
                      style="display:inline;">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger btn-sm"
                            onclick="return confirm('Delete review?')">
                        Delete
                    </button>
                </form>

            </td>

        </tr>
        @endforeach

    </table>

</div>

@endsection