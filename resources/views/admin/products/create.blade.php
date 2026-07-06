@extends('admin.layouts.app')

@section('content')

<h2>Add Product</h2>

<form method="POST"
      action="{{ route('admin.products.store') }}"
      enctype="multipart/form-data">

@csrf

{{-- PRODUCT NAME --}}
<input type="text"
       name="name"
       class="form-control mb-2"
       placeholder="Product Name"
       value="{{ old('name') }}"
       required>

{{-- PRICE --}}
<input type="number"
       name="price"
       class="form-control mb-2"
       placeholder="Price"
       value="{{ old('price') }}"
       required>

{{-- DESCRIPTION --}}
<textarea name="description"
          class="form-control mb-2"
          placeholder="Description">{{ old('description') }}</textarea>

{{-- CATEGORY --}}
<select name="category_id" class="form-control mb-2" required>
    <option value="">Select Category</option>
    @foreach($categories as $category)
        <option value="{{ $category->id }}">
            {{ $category->name }}
        </option>
    @endforeach
</select>

{{-- BRAND --}}
<select name="brand_id" class="form-control mb-2">
    <option value="">Select Brand</option>
    @foreach($brands as $brand)
        <option value="{{ $brand->id }}">
            {{ $brand->name }}
        </option>
    @endforeach
</select>

{{-- STOCK --}}
<input type="number"
       name="stock"
       class="form-control mb-2"
       placeholder="Stock"
       value="{{ old('stock', 0) }}">

{{-- IMAGE --}}
<input type="file"
       name="image"
       class="form-control mb-2">

{{-- STATUS --}}
<label class="mb-2">
    <input type="checkbox" name="status" value="1" checked>
    Active Product
</label>

<br>

<button class="btn btn-success">
    Save Product
</button>

</form>

@endsection