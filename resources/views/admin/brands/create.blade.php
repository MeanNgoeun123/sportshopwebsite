@extends('admin.layouts.app')

@section('content')

<h2>Create Brand</h2>

<form method="POST"
      action="{{ route('admin.brands.store') }}"
      enctype="multipart/form-data">

    @csrf

    {{-- NAME --}}
    <div class="mb-3">
        <label>Brand Name</label>
        <input type="text" name="name" class="form-control" placeholder="Brand Name" required>
    </div>

    {{-- DESCRIPTION --}}
    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control" placeholder="Brand description"></textarea>
    </div>

    {{-- LOGO --}}
    <div class="mb-3">
        <label>Brand Logo</label>
        <input type="file" name="logo" class="form-control">
    </div>

    {{-- STATUS --}}
    <div class="mb-3">
        <label>
            <input type="checkbox" name="status" value="1" checked>
            Active
        </label>
    </div>

    <button class="btn btn-success">
        Save Brand
    </button>

</form>

@endsection