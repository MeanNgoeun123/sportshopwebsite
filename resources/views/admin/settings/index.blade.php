@extends('admin.layouts.app')

@section('content')

<div class="container">

    <h2>Settings</h2>

    <div class="card p-4 shadow-sm">

        <form method="POST" action="{{ route('admin.settings.update') }}">
            @csrf

            <label>Site Name</label>
            <input type="text"
                   name="site_name"
                   value="{{ $settings->site_name ?? '' }}"
                   class="form-control mb-2">

            <label>Email</label>
            <input type="email"
                   name="email"
                   value="{{ $settings->email ?? '' }}"
                   class="form-control mb-2">

            <label>Phone</label>
            <input type="text"
                   name="phone"
                   value="{{ $settings->phone ?? '' }}"
                   class="form-control mb-2">

            <label>Currency</label>
            <input type="text"
                   name="currency"
                   value="{{ $settings->currency ?? '' }}"
                   class="form-control mb-2">

            <label>Address</label>
            <textarea name="address"
                      class="form-control mb-3">{{ $settings->address ?? '' }}</textarea>

            <button class="btn btn-success">
                Save Settings
            </button>

        </form>

    </div>

</div>

@endsection