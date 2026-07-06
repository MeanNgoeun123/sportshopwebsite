@extends('admin.layouts.app')

@section('content')

<div class="container py-4">

    <div class="card shadow border-0">
        <div class="card-body">

            <h3 class="mb-4">Add Category</h3>

            <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- NAME -->
                <div class="mb-3">
                    <label class="form-label">Category Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <!-- IMAGE -->
                <div class="mb-3">
                    <label class="form-label">Image</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">
                    Save Category
                </button>

                <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">
                    Back
                </a>

            </form>

        </div>
    </div>

</div>

@endsection