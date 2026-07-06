@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">


<div class="d-flex justify-content-between align-items-center mb-4">

    <h2 class="fw-bold">
        ⚙️ Website Settings
    </h2>

</div>



<div class="card shadow border-0 rounded-4">


<div class="card-header bg-dark text-white">
    <h5 class="mb-0">
        SportShop Configuration
    </h5>
</div>



<div class="card-body p-4">


@if(session('success'))

<div class="alert alert-success">
    {{ session('success') }}
</div>

@endif



<form method="POST"
action="{{ route('admin.settings.update') }}"
enctype="multipart/form-data">

@csrf



<div class="row">



{{-- Site Name --}}

<div class="col-md-6 mb-3">

<label class="fw-bold">
Site Name
</label>

<input type="text"
name="site_name"
class="form-control"
value="{{ old('site_name',$settings->site_name ?? '') }}">

</div>




{{-- Email --}}

<div class="col-md-6 mb-3">

<label class="fw-bold">
Email
</label>

<input type="email"
name="email"
class="form-control"
value="{{ old('email',$settings->email ?? '') }}">

</div>




{{-- Phone --}}

<div class="col-md-6 mb-3">

<label class="fw-bold">
Phone
</label>


<input type="text"
name="phone"
class="form-control"
value="{{ old('phone',$settings->phone ?? '') }}">

</div>





{{-- Currency --}}

<div class="col-md-6 mb-3">


<label class="fw-bold">
Currency
</label>


<select name="currency"
class="form-control">


<option value="USD">
USD $
</option>


<option value="KHR">
KHR ៛
</option>


</select>


</div>





{{-- Logo --}}

<div class="col-md-6 mb-3">


<label class="fw-bold">
Website Logo
</label>


<input type="file"
name="logo"
class="form-control"
onchange="previewLogo(event)">



@if(!empty($settings->logo))

<img src="{{asset('storage/'.$settings->logo)}}"
width="120"
class="mt-3 rounded">

@endif



<img id="logoPreview"
width="120"
class="mt-3 rounded d-none">


</div>






{{-- Favicon --}}

<div class="col-md-6 mb-3">


<label class="fw-bold">
Favicon
</label>


<input type="file"
name="favicon"
class="form-control">


@if(!empty($settings->favicon))

<img src="{{asset('storage/'.$settings->favicon)}}"
width="50"
class="mt-3">

@endif


</div>







{{-- Address --}}

<div class="col-12 mb-3">


<label class="fw-bold">
Address
</label>


<textarea
name="address"
rows="3"
class="form-control">

{{ old('address',$settings->address ?? '') }}

</textarea>


</div>








{{-- Social --}}


<div class="col-md-4 mb-3">

<label>
Facebook
</label>


<input type="text"
name="facebook"
class="form-control"
value="{{ $settings->facebook ?? '' }}">


</div>



<div class="col-md-4 mb-3">

<label>
Telegram
</label>


<input type="text"
name="telegram"
class="form-control"
value="{{ $settings->telegram ?? '' }}">


</div>





<div class="col-md-4 mb-3">


<label>
Instagram
</label>


<input type="text"
name="instagram"
class="form-control"
value="{{ $settings->instagram ?? '' }}">


</div>







{{-- Status --}}


<div class="col-md-6">


<label class="fw-bold">
Shop Status
</label>


<select name="status"
class="form-control">


<option value="open">
🟢 Open
</option>


<option value="close">
🔴 Close
</option>


</select>


</div>






<div class="col-md-6">


<label class="fw-bold">
Maintenance Mode
</label>


<select name="maintenance"
class="form-control">


<option value="0">
OFF
</option>


<option value="1">
ON
</option>


</select>


</div>



</div>





<button class="btn btn-success btn-lg mt-4 px-5">


<i class="bi bi-save"></i>

Save Settings


</button>



</form>


</div>


</div>


</div>






<script>


function previewLogo(event){

let img=document.getElementById('logoPreview');

img.src=URL.createObjectURL(event.target.files[0]);

img.classList.remove('d-none');

}


</script>



@endsection