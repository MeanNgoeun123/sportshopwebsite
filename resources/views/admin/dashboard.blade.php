@extends('admin.layouts.app')

@section('content')

<<<<<<< HEAD

<div class="container-fluid">


<!-- HEADER -->

<div class="d-flex justify-content-between align-items-center mb-4">


<div>

<h2 class="fw-bold">
🔥 SportShop Dashboard
</h2>

<p class="text-muted">
Manage your store performance
</p>

</div>


<button onclick="darkMode()" class="btn btn-dark">

🌙 Dark Mode

</button>


</div>







<!-- MAIN STATS -->


<div class="row g-4">



<div class="col-lg-3 col-md-6">

<div class="card stat-card p-4">


<h6>
Products
</h6>


<h2 class="counter">
{{ $products }}
</h2>


<div class="icon black">

<i class="bi bi-box"></i>

</div>


</div>


</div>





<div class="col-lg-3 col-md-6">


<div class="card stat-card p-4">


<h6>
Orders
</h6>


<h2 class="counter">

{{ $orders }}

</h2>


<div class="icon red">

<i class="bi bi-cart"></i>

</div>


</div>


</div>






<div class="col-lg-3 col-md-6">


<div class="card stat-card p-4">


<h6>
Users
</h6>


<h2 class="counter">

{{ $users }}

</h2>


<div class="icon orange">

<i class="bi bi-people"></i>

</div>


</div>


</div>






<div class="col-lg-3 col-md-6">


<div class="card stat-card p-4">


<h6>
Revenue
</h6>


<h2>

${{ $revenue ?? 0 }}

</h2>


<div class="icon dark">

<i class="bi bi-currency-dollar"></i>

</div>


</div>


</div>




</div>









<!-- ORDER STATUS -->


<div class="row g-4 mt-3">


<div class="col-md-3">

<div class="card p-4">

<h6>
Pending
</h6>

<h2 class="text-warning">

{{ $pendingOrders ?? 0 }}

</h2>


⏳ Waiting

</div>

</div>





<div class="col-md-3">

<div class="card p-4">

<h6>
Processing
</h6>


<h2 class="text-primary">

{{ $processingOrders ?? 0 }}

</h2>


📦 Shipping

</div>

</div>





<div class="col-md-3">


<div class="card p-4">


<h6>
Completed
</h6>


<h2 class="text-success">

{{ $completedOrders ?? 0 }}

</h2>


✅ Done


</div>


</div>





<div class="col-md-3">


<div class="card p-4">


<h6>
Cancelled
</h6>


<h2 class="text-danger">

{{ $cancelledOrders ?? 0 }}

</h2>


❌ Cancel


</div>


</div>



</div>









<!-- CHART -->


<div class="row mt-5 g-4">


<div class="col-lg-8">


<div class="card p-4">


<h5>
📈 Sales Overview
</h5>


<canvas id="salesChart"></canvas>


</div>


</div>






<div class="col-lg-4">


<div class="card p-4">


<h5>
⚡ Quick Action
</h5>


<hr>


<a href="/admin/products/create"
class="btn btn-dark mb-2">

+ Add Product

</a>


<a href="/admin/orders"
class="btn btn-danger mb-2">

View Orders

</a>



<a href="/admin/settings"
class="btn btn-secondary">

Settings

</a>



</div>


</div>



</div>









<!-- PRODUCTS -->
<div class="card mt-5 p-4 border-0 shadow-sm rounded-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="fw-bold mb-0">
            🔥 Top Products
        </h5>

        <span class="badge bg-primary">
            Best Seller
        </span>
    </div>


    <div class="row g-4">

        @forelse($topProducts as $product)

            <div class="col-xl-3 col-lg-4 col-md-6">

                <div class="product-card bg-white rounded-4 shadow-sm overflow-hidden">

                    {{-- IMAGE --}}
                    <div class="position-relative">

                        <img src="{{ $product->image 
                            ? asset('storage/'.$product->image) 
                            : asset('images/no-image.png') }}"
                            class="w-100 product-img">


                        {{-- SOLD BADGE --}}
                        <span class="position-absolute top-0 end-0 m-2 badge bg-danger">
                            🔥 {{ $product->total_sold ?? 0 }} Sold
                        </span>

                    </div>


                    {{-- INFO --}}
                    <div class="p-3 text-center">

                        <h6 class="fw-bold mb-2">
                            {{ $product->name }}
                        </h6>


                        <div class="text-muted small">
                            Total Sales
                        </div>


                        <h5 class="text-primary fw-bold mb-0">
                            {{ $product->total_sold ?? 0 }}
                        </h5>


                    </div>

                </div>

            </div>


        @empty

            <div class="text-center text-muted py-4">
                No products found
            </div>

        @endforelse
=======
<div class="container-fluid">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Admin Dashboard</h2>
        <span class="text-muted">Welcome back 👋</span>
    </div>

    <!-- STATS CARDS -->
    <div class="row g-4">

        <!-- PRODUCTS -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 p-3 stat-card">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted">Products</h6>
                        <h2 class="fw-bold">{{ $products }}</h2>
                    </div>
                    <div class="icon-box bg-primary text-white">
                        <i class="bi bi-box fs-3"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- ORDERS -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 p-3 stat-card">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted">Orders</h6>
                        <h2 class="fw-bold">{{ $orders }}</h2>
                    </div>
                    <div class="icon-box bg-success text-white">
                        <i class="bi bi-cart fs-3"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- USERS -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 p-3 stat-card">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted">Users</h6>
                        <h2 class="fw-bold">{{ $users }}</h2>
                    </div>
                    <div class="icon-box bg-warning text-white">
                        <i class="bi bi-people fs-3"></i>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- EXTRA SECTION -->
    <div class="row mt-5">

        <div class="col-md-6">
            <div class="card border-0 shadow-sm rounded-4 p-4">
                <h5 class="fw-bold">Quick Actions</h5>
                <hr>
                <a href="/admin/products/create" class="btn btn-primary w-100 mb-2">
                    + Add New Product
                </a>
                <a href="/admin/orders" class="btn btn-success w-100 mb-2">
                    View Orders
                </a>
                <a href="/admin/users" class="btn btn-dark w-100">
                    Manage Users
                </a>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card border-0 shadow-sm rounded-4 p-4">
                <h5 class="fw-bold">System Overview</h5>
                <hr>
                <p class="text-muted">
                    Your SportShop admin panel is running smoothly.
                    Manage products, orders, and users easily.
                </p>

                <div class="progress mb-2">
                    <div class="progress-bar bg-primary" style="width: 70%"></div>
                </div>
                <small class="text-muted">System Health: 70%</small>
            </div>
        </div>
>>>>>>> 05db09b21274c2c101a3a70efef01a1844115506

    </div>

</div>

<<<<<<< HEAD


<style>

.product-card{
    transition:.3s;
    cursor:pointer;
}


.product-card:hover{
    transform:translateY(-8px);
}


.product-img{

    height:180px;
    object-fit:cover;

}


</style>









<!-- ACTIVITY -->


<div class="card mt-5 p-4">


<h5>
⚡ Recent Activity
</h5>


<hr>


<p>
🟢 New order received
</p>


<p>
📦 Product updated
</p>


<p>
👤 New customer joined
</p>


<p>
💳 Payment completed
</p>



</div>







</div>









<!-- CHART -->


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script>


new Chart(document.getElementById('salesChart'),{


type:'line',


data:{


labels:[
'Jan',
'Feb',
'Mar',
'Apr',
'May',
'Jun'
],


datasets:[{


label:'Sales',


data:[
200,
500,
800,
700,
1200,
1600
],


borderColor:'#e10600',

backgroundColor:'rgba(225,6,0,.2)',

fill:true,

tension:.4


}]


}


});






function darkMode(){

document.body.classList.toggle('dark');


}





document.querySelectorAll('.counter')
.forEach(el=>{


let target=parseInt(el.innerHTML);

let count=0;


let timer=setInterval(()=>{


count++;

el.innerHTML=count;


if(count>=target){

clearInterval(timer);

}


},40);



});



</script>










<style>
    


body{

background:#f5f5f5;

}




.card{


border:none!important;

border-radius:22px!important;

box-shadow:

0 8px 25px rgba(0,0,0,.08);


transition:.3s;


}


.card:hover{


transform:translateY(-5px);


}




.stat-card{


position:relative;

overflow:hidden;


}



.icon{


width:65px;

height:65px;

border-radius:20px;

display:flex;

align-items:center;

justify-content:center;

color:white;

font-size:28px;


}



.black{

background:#111;

}


.red{

background:#e10600;

}


.orange{

background:#ff9800;

}


.dark{

background:#333;

}





.product-card{


text-align:center;

padding:15px;

background:#fff;

border-radius:18px;


}



.product-card img{


width:100%;

height:150px;

object-fit:cover;

border-radius:15px;


}





.btn{


border-radius:14px;

padding:12px;


}




.dark{


background:#111!important;

color:white;


}



.dark .card{


background:#1d1d1d!important;

color:white;


}



@media(max-width:768px){


.card{

margin-bottom:15px;

}


}



</style>



=======
<!-- STYLES -->
<style>
.stat-card {
    transition: 0.3s;
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
}

.icon-box {
    width: 60px;
    height: 60px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
}
</style>

>>>>>>> 05db09b21274c2c101a3a70efef01a1844115506
@endsection