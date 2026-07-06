@extends('admin.layouts.app')

@section('content')

<h2>Brands</h2>

<a href="{{ route('admin.brands.create') }}" class="btn btn-primary mb-3">
    + Add Brand
</a>

<table class="table table-bordered bg-white">

    <thead>
        <tr>
            <th>ID</th>
            <th>Logo</th>
            <th>Name</th>
            <th>Description</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach($brands as $brand)
        <tr>
            <td>{{ $brand->id }}</td>

            <td>
                @if($brand->logo)
                    <img src="{{ asset('storage/' . $brand->logo) }}"
                         width="50"
                         height="50"
                         style="object-fit: cover;">
                @else
                    <span class="text-muted">No Image</span>
                @endif
            </td>

            <td>{{ $brand->name }}</td>

            <td>{{ $brand->description }}</td>

            <td>
                @if($brand->status)
                    <span class="badge bg-success">Active</span>
                @else
                    <span class="badge bg-danger">Inactive</span>
                @endif
            </td>

            <td>
                <a href="{{ route('admin.brands.edit', $brand->id) }}"
                   class="btn btn-warning btn-sm">
                    Edit
                </a>

                <form action="{{ route('admin.brands.destroy', $brand->id) }}"
                      method="POST"
                      style="display:inline;">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger btn-sm"
                            onclick="return confirm('Are you sure?')">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>

</table>

@endsection