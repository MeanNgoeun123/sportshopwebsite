@extends('admin.layouts.app')

@section('content')

<div class="container mt-4">

    <h2>Edit Product</h2>

    {{-- SHOW VALIDATION ERRORS --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST"
          action="{{ route('admin.products.update', $product->id) }}"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        {{-- NAME --}}
        <div class="mb-3">
            <label class="form-label">Product Name</label>
            <input type="text"
                   name="name"
                   class="form-control"
                   value="{{ old('name', $product->name) }}"
                   required>
        </div>

        {{-- PRICE --}}
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="number"
                   name="price"
                   class="form-control"
                   value="{{ old('price', $product->price) }}"
                   required>
        </div>

        {{-- STOCK --}}
        <div class="mb-3">
            <label class="form-label">Stock Quantity</label>
            <input type="number"
                   name="stock"
                   class="form-control"
                   value="{{ old('stock', $product->stock) }}"
                   min="0"
                   required>
        </div>

        {{-- CATEGORY (FIX ADDED) --}}
        <div class="mb-3">
            <label class="form-label">Category</label>
            <select name="category_id" class="form-control" required>
                <option value="">-- Select Category --</option>

                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach

            </select>
        </div>

        {{-- BRAND (FIX ADDED) --}}
        <div class="mb-3">
            <label class="form-label">Brand</label>
            <select name="brand_id" class="form-control">
                <option value="">-- Select Brand --</option>

                @foreach($brands as $brand)
                    <option value="{{ $brand->id }}"
                        {{ old('brand_id', $product->brand_id) == $brand->id ? 'selected' : '' }}>
                        {{ $brand->name }}
                    </option>
                @endforeach

            </select>
        </div>

        {{-- DESCRIPTION --}}
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description"
                      class="form-control"
                      rows="4">{{ old('description', $product->description) }}</textarea>
        </div>

        {{-- IMAGE --}}
        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file" name="image" class="form-control">

            @if($product->image)
                <div class="mt-2">
                    <img src="{{ asset('storage/'.$product->image) }}"
                         width="100"
                         style="border-radius:8px;">
                </div>
            @endif
        </div>

        {{-- BUTTONS --}}
        <button type="submit" class="btn btn-primary">
            Update Product
        </button>

        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
            Cancel
        </a>

    </form>

</div>

@endsection