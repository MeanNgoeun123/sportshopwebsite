@extends('admin.layouts.app')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between mb-3">
        <h2>Categories</h2>

        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
            + Add Category
        </a>
    </div>

    <table class="table table-bordered bg-white">

        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
        @forelse($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>

                <td>
                    @if($category->image)
                        <img src="{{ asset('storage/' . $category->image) }}"
                             width="60"
                             height="60"
                             style="object-fit: cover;">
                    @else
                        <span class="text-muted">No Image</span>
                    @endif
                </td>

                <td>{{ $category->name }}</td>

                <td>
                    <a href="{{ route('admin.categories.edit', $category->id) }}"
                       class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <form action="{{ route('admin.categories.destroy', $category->id) }}"
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
        @empty
            <tr>
                <td colspan="4" class="text-center">
                    No categories found
                </td>
            </tr>
        @endforelse
        </tbody>

    </table>

</div>

@endsection