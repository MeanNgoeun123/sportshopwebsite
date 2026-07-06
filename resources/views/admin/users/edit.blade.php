@extends('admin.layouts.app')

@section('content')

<div class="container">

    <div class="card shadow-sm border-0 rounded-4 p-4">

        <h3 class="mb-4">Edit User</h3>

        <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
            @csrf
            @method('PUT')

            <!-- NAME -->
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text"
                       name="name"
                       value="{{ $user->name }}"
                       class="form-control"
                       required>
            </div>

            <!-- EMAIL -->
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email"
                       name="email"
                       value="{{ $user->email }}"
                       class="form-control"
                       required>
            </div>

            <!-- ROLE -->
            <div class="mb-3">
                <label class="form-label">Role</label>
                <select name="role" class="form-control">
                    <option value="customer" {{ $user->role == 'customer' ? 'selected' : '' }}>
                        Customer
                    </option>
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>
                        Admin
                    </option>
                </select>
            </div>

            <!-- BUTTON -->
            <button class="btn btn-success px-4">
                Update User
            </button>

            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary px-4">
                Back
            </a>

        </form>

    </div>

</div>

@endsection