@extends('frontend.layouts.app')

@section('content')

<<<<<<< HEAD
<style>
/* =======================
   PAGE STYLE
======================= */
.contact-title {
    font-weight: 800;
}

.contact-card {
    border: none;
    border-radius: 16px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.06);
    overflow: hidden;
}

/* =======================
   FORM STYLE
======================= */
.form-control {
    border-radius: 10px;
    padding: 10px;
}

.form-control:focus {
    border-color: #0d6efd;
    box-shadow: 0 0 0 0.15rem rgba(13,110,253,.15);
}

.btn-send {
    border-radius: 10px;
    font-weight: 600;
}

/* =======================
   RIGHT INFO BOX
======================= */
.contact-info {
    background: #0d6efd;
    color: #fff;
    padding: 25px;
    border-radius: 16px;
    height: 100%;
}

.contact-item {
    margin-bottom: 12px;
    font-size: 14px;
}

/* =======================
   MAP
======================= */
.map {
    width: 100%;
    height: 220px;
    border: 0;
    border-radius: 12px;
    margin-top: 15px;
}

/* =======================
   WHATSAPP BUTTON
======================= */
.whatsapp-float {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background: #25D366;
    color: white;
    width: 55px;
    height: 55px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 26px;
    z-index: 999;
    box-shadow: 0 10px 25px rgba(0,0,0,0.2);
    transition: 0.3s;
}

.whatsapp-float:hover {
    transform: scale(1.1);
}
</style>

<div class="container py-5">

    <h2 class="mb-4 contact-title">
        <i class="bi bi-envelope"></i> Contact Us
    </h2>

    <div class="row g-4">

        <!-- ================= LEFT FORM ================= -->
        <div class="col-lg-7">

            <div class="card contact-card">
                <div class="card-body p-4">

                    {{-- SUCCESS --}}
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- ERRORS --}}
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('contact.send') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Subject</label>
                            <input type="text" name="subject" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Message</label>
                            <textarea name="message" rows="6" class="form-control" required></textarea>
                        </div>

                        <button class="btn btn-primary btn-send w-100">
                            <i class="bi bi-send"></i> Send Message
                        </button>

                    </form>

                </div>
            </div>

        </div>

        <!-- ================= RIGHT INFO ================= -->
        <div class="col-lg-5">

            <div class="contact-info">

                <h5>📍 Contact Info</h5>

                <div class="contact-item">🏢 Phnom Penh, Cambodia</div>
                <div class="contact-item">📞 +855 12 345 678</div>
                <div class="contact-item">📧 support@yourstore.com</div>
                <div class="contact-item">⏰ Mon - Sun: 8AM - 10PM</div>

                <!-- CALL BUTTON -->
                <a href="tel:+85512345678" class="btn btn-light btn-sm w-100 mb-2">
                    📞 Call Now
                </a>

                <p class="small mt-2">
                    We usually reply within 24 hours.
                </p>

                <!-- MAP -->
                <iframe
                    class="map"
                    src="https://www.google.com/maps?q=Phnom+Penh,+Cambodia&output=embed"
                    loading="lazy">
                </iframe>

            </div>

=======
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
>>>>>>> 05db09b21274c2c101a3a70efef01a1844115506
        </div>

    </div>

</div>
<<<<<<< HEAD

<!-- WHATSAPP -->
<a href="https://wa.me/85512345678" target="_blank" class="whatsapp-float">
    <i class="bi bi-whatsapp"></i>
</a>

@endsection
=======
```

</div>

@endsection
>>>>>>> 05db09b21274c2c101a3a70efef01a1844115506
