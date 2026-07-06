@extends('frontend.layouts.app')

@section('content')

<div class="container py-5">

```
<div class="row justify-content-center">

    <div class="col-lg-8">

        <h2 class="mb-4">
            <i class="bi bi-envelope"></i> Contact Us
        </h2>

        {{-- Success Message --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Validation Errors --}}
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card shadow-sm border-0">
            <div class="card-body">

                <form action="{{ route('contact.send') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input
                            type="text"
                            name="name"
                            class="form-control"
                            value="{{ old('name') }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            value="{{ old('email') }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Subject</label>
                        <input
                            type="text"
                            name="subject"
                            class="form-control"
                            value="{{ old('subject') }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Message</label>
                        <textarea
                            name="message"
                            class="form-control"
                            rows="6"
                            required>{{ old('message') }}</textarea>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-send"></i>
                            Send Message
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>

</div>
```

</div>

@endsection
