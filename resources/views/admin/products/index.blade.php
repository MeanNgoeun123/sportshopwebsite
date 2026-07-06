@extends('admin.layouts.app')

@section('content')

<h2>Products</h2>

<a href="{{ route('admin.products.create') }}" class="btn btn-primary mb-3">
    + Add Product
</a>

<table class="table table-bordered bg-white">

    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Category</th>
            <th>Brand</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
    @foreach($products as $product)
        <tr>
            <td>{{ $product->id }}</td>

            {{-- IMAGE --}}
            <td>
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}"
                         width="50"
                         height="50"
                         style="object-fit: cover;">
                @else
                    <span class="text-muted">No Image</span>
                @endif
            </td>

            <td>{{ $product->name }}</td>

            {{-- CATEGORY --}}
            <td>{{ $product->category->name ?? '-' }}</td>

            {{-- BRAND --}}
            <td>{{ $product->brand->name ?? '-' }}</td>

            <td>${{ number_format($product->price, 2) }}</td>

            <td>{{ $product->stock }}</td>

            {{-- STATUS --}}
            <td>
                @if($product->status)
                    <span class="badge bg-success">Active</span>
                @else
                    <span class="badge bg-danger">Inactive</span>
                @endif
            </td>

            {{-- ACTIONS --}}
            <td>
                <a href="{{ route('admin.products.edit', $product->id) }}"
                   class="btn btn-warning btn-sm">
                    Edit
                </a>

                <form action="{{ route('admin.products.destroy', $product->id) }}"
                      method="POST"
                      style="display:inline;">

                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger btn-sm"
                            onclick="return confirm('Delete this product?')">
                        Delete
                    </button>
                </form>
            </td>

        </tr>
    @endforeach
    </tbody>

</table>

@endsection