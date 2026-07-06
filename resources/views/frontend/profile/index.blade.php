@extends('layouts.app')

@section('content')

<div class="container py-4">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <!-- PROFILE CARD -->
            <div class="card shadow-sm border-0">

                <div class="card-header bg-dark text-white">
                    <h4 class="mb-0">My Profile</h4>
                </div>

                <div class="card-body">

                    <div class="text-center mb-4">
                        <i class="bi bi-person-circle" style="font-size: 80px;"></i>
                    </div>

                    <table class="table">

                        <tr>
                            <th>Name</th>
                            <td>{{ auth()->user()->name }}</td>
                        </tr>

                        <tr>
                            <th>Email</th>
                            <td>{{ auth()->user()->email }}</td>
                        </tr>

                        <tr>
                            <th>Role</th>
                            <td>
                                <span class="badge bg-{{ auth()->user()->role == 'admin' ? 'danger' : 'primary' }}">
                                    {{ auth()->user()->role ?? 'customer' }}
                                </span>
                            </td>
                        </tr>

                        <tr>
                            <th>Member Since</th>
                            <td>{{ auth()->user()->created_at->format('d M Y') }}</td>
                        </tr>

                    </table>

                    <div class="mt-3 d-flex gap-2">

                        <a href="{{ route('profile') }}" class="btn btn-outline-dark">
                            Refresh
                        </a>

                        <a href="/orders" class="btn btn-primary">
                            My Orders
                        </a>

                    </div>

                </div>
            </div>

        </div>

    </div>

</div>

@endsection