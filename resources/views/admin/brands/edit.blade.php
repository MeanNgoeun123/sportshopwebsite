@extends('admin.layouts.app')

@section('content')

<h2>Edit Brand</h2>

<form method="POST"
      action="{{ route('admin.brands.update', $brand->id) }}"
      enctype="multipart/form-data">

    @csrf
    @method('PUT')

    {{-- NAME --}}
    <div class="mb-3">
        <label>Brand Name</label>
        <input type="text" name="name" class="form-control"
               value="{{ $brand->name }}" required>
    </div>

    {{-- DESCRIPTION --}}
    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control">{{ $brand->description }}</textarea>
    </div>

    {{-- STATUS --}}
    <div class="mb-3">
        <label>Status</label><br>

        <input type="checkbox" name="status" value="1"
               {{ $brand->status ? 'checked' : '' }}>
        Active
    </div>

    {{-- CURRENT LOGO --}}
    <div class="mb-3">
        <label>Current Logo</label><br>

        @if($brand->logo)
            <img src="{{ asset('storage/' . $brand->logo) }}"
                 width="80"
                 height="80"
                 style="object-fit: cover;">
        @else
            <span class="text-muted">No Logo</span>
        @endif
    </div>

    {{-- NEW LOGO --}}
    <div class="mb-3">
        <label>Change Logo</label>
        <input type="file" name="logo" class="form-control">
    </div>

    <button class="btn btn-primary">
        Update Brand
    </button>

</form>

@endsection