@extends('admin.layouts.app')

@section('content')

<div class="container">

    <h2>Add Slider</h2>

    <div class="card shadow-sm p-4">

        <form method="POST"
              action="{{ route('admin.sliders.store') }}"
              enctype="multipart/form-data">

            @csrf

            <div class="mb-3">
                <label>Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Subtitle</label>
                <input type="text" name="subtitle" class="form-control">
            </div>

            <div class="mb-3">
                <label>Image</label>
                <input type="file" name="image" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Button Text</label>
                <input type="text" name="button_text" class="form-control">
            </div>

            <button class="btn btn-success">
                Save Slider
            </button>

        </form>

    </div>

</div>

@endsection