@extends('admin.layouts.app')

@section('content')

<div class="container">

    <div class="card shadow border-0">
        <div class="card-body">

            <h2 class="mb-4">Edit Category</h2>

            <form action="{{ route('admin.categories.update', $category->id) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <!-- NAME -->
                <div class="mb-3">
                    <label class="form-label">Category Name</label>
                    <input type="text"
                           name="name"
                           class="form-control"
                           value="{{ old('name', $category->name) }}"
                           required>
                </div>

                <!-- CURRENT IMAGE -->
                <div class="mb-3">
                    <label class="form-label">Current Image</label><br>

                    @if($category->image)
                        <img src="{{ asset('storage/' . $category->image) }}"
                             width="80"
                             height="80"
                             style="object-fit: cover;"
                             class="rounded border">
                    @else
                        <p class="text-muted">No image available</p>
                    @endif
                </div>

                <!-- NEW IMAGE -->
                <div class="mb-3">
                    <label class="form-label">Change Image</label>
                    <input type="file"
                           name="image"
                           class="form-control"
                           accept="image/*">
                </div>

                <!-- BUTTONS -->
                <button type="submit" class="btn btn-primary">
                    Update Category
                </button>

                <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">
                    Back
                </a>

            </form>

        </div>
    </div>

</div>

@endsection