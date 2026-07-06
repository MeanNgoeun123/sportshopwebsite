@extends('admin.layouts.app')

@section('content')

<div class="container">

    <h2>Edit Slider</h2>

    <div class="card shadow-sm p-4">

        <form method="POST"
              action="{{ route('admin.sliders.update', $slider->id) }}"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Title</label>
                <input type="text"
                       name="title"
                       value="{{ $slider->title }}"
                       class="form-control"
                       required>
            </div>

            <div class="mb-3">
                <label>Subtitle</label>
                <input type="text"
                       name="subtitle"
                       value="{{ $slider->subtitle }}"
                       class="form-control">
            </div>

            <div class="mb-3">
                <label>Current Image</label><br>
                <img src="{{ asset('uploads/sliders/'.$slider->image) }}"
                     width="120"
                     style="border-radius:8px;">
            </div>

            <div class="mb-3">
                <label>Change Image</label>
                <input type="file" name="image" class="form-control">
            </div>

            <div class="mb-3">
                <label>Button Text</label>
                <input type="text"
                       name="button_text"
                       value="{{ $slider->button_text }}"
                       class="form-control">
            </div>

            <div class="mb-3">
                <label>Button Link</label>
                <input type="text"
                       name="button_link"
                       value="{{ $slider->button_link }}"
                       class="form-control">
            </div>

            <button class="btn btn-primary">
                Update Slider
            </button>

        </form>

    </div>

</div>

@endsection