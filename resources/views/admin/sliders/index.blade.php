@extends('admin.layouts.app')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Sliders</h2>

        <a href="{{ route('admin.sliders.create') }}" class="btn btn-primary">
            + Add Slider
        </a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">

            <table class="table table-bordered align-middle bg-white">

                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Subtitle</th>
                        <th>Status</th>
                        <th width="180">Action</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($sliders as $slider)
                        <tr>

                            <td>{{ $slider->id }}</td>

                            {{-- IMAGE --}}
                            <td>
                                @if($slider->image)
                                    <img src="{{ asset('storage/' . $slider->image) }}"
                                         width="60"
                                         height="60"
                                         style="object-fit: cover; border-radius: 6px;">
                                @else
                                    <span class="text-muted">No Image</span>
                                @endif
                            </td>

                            <td>{{ $slider->title }}</td>

                            <td>{{ $slider->subtitle }}</td>

                            <td>
                                @if($slider->status)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>

                            {{-- ACTION --}}
                            <td>

                                <a href="{{ route('admin.sliders.edit', $slider->id) }}"
                                   class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <form action="{{ route('admin.sliders.destroy', $slider->id) }}"
                                      method="POST"
                                      style="display:inline-block;">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('Delete slider?')">
                                        Delete
                                    </button>

                                </form>

                            </td>

                        </tr>
                    @endforeach

                </tbody>

            </table>

        </div>
    </div>

</div>

@endsection