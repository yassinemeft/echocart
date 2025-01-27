@extends('layouts.app')

@section('title', 'Home')

@section('styles')
<style>
    .typing::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 2px;
        height: 100%;
        background: transparent;
        animation: cursorBlink 0.8s steps(3) infinite;
    }

    @keyframes cursorBlink {
        0%,
        75% {
            opacity: 1;
        }

        76%,
        100% {
            opacity: 0;
        }
    }

    .typing {
        position: relative;
    }

    .typing h2 {
        position: relative;
        color: hsl(195, 4.90%, 32.20%);
        letter-spacing: 5px;
        font-size: 4rem;
        overflow: hidden;
        margin-bottom: 0;
        animation: type 5s steps(11) infinite;
    }

    @keyframes type {
        0%,
        100% {
            width: 0px;
        }

        30%,
        60% {
            width: 394.09px;
        }
    }
</style>

@media(max-width: 330px) {
    .typing h2 {
        font-size: 3rem;
        animation: type 5s steps(10) infinite;
    }

    @keyframes type {
        0%,
        100% {
            width: 0px;
        }

        30%,
        60% {
            width: 305px;
        }
    }
}
</style>
@endsection

@section('content')
    <div id="hero-section" class="p-5 text-center bg-dark vh-100" style="background-image: url('{{ asset('images/hero.jpg') }}'); background-size: cover; background-position: center;">
        <div class="mask" style="height: 100%;">
            <div class="d-flex justify-content-center align-items-center h-100">
                <div class="text-dark">
                    <h1 class="display-3 mb-3">Welcome to EchoCart</h1>
                    <h4 class="mb-4">Lorem ipsum dolor amet consectetur adipisicing elit. Quisquam, quod.</h4>
                    <a data-mdb-ripple-init class="btn btn-outline-dark btn-lg m-2" href="https://www.youtube.com/watch?v=c9B4TPnak1A" role="button" rel="nofollow" target="_blank">Explore our Products</a>
                    <a data-mdb-ripple-init class="btn btn-outline-dark btn-lg m-2" href="https://mdbootstrap.com/docs/standard/" target="_blank" role="button">Learn more</a>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex p-5 mb-4 bg-light rounded-3">
        <div class="py-5 mt-5">
            <div class="typing mb-4">
                <h2 class="display-3 fw-bold">Welcome to EchoCart</h2>
            </div>
            <p class="col-md-10 fs-3">
                Discover the best deals on top-quality products. Shop with ease and find everything you need in one place. Start exploring our collection today!
            </p>
            <button class="btn btn-primary btn-lg" type="button">Shop now</button>
        </div>
        <div class="py-5 mt-5">
            <div class="row row-cols-md-2 g-4">
                @foreach ($products as $product)
                    <div class="col">
                        <div class="card h-100 w-100">
                            <img src="{{ $product->imgUrl }}" class="card-img-top img-fluid" alt="Product Image">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="container py-5 text-center" id="featured-3">
        <h2 class="display-3 bold">Why Choose EchoCart</h2>
        <div class="d-flex py-4">
            <div class="feature col border-2 p-4 rounded shadow">
                <div class="feature-icon d-inline-flex align-items-center justify-content-center bg-success text-white rounded-circle fs-3 mb-3" style="width: 60px; height: 60px;">
                    <i class="bi bi-truck"></i>
                </div>
                <h3 class="fs-5 text-body-emphasis">Fast and Reliable Delivery</h3>
                <p>
                    We offer a wide range of delivery options to ensure that your products reach you quickly and efficiently.
                </p>
            </div>

            <div class="feature col border-2 p-4 rounded shadow mx-4">
                <div class="feature-icon d-inline-flex align-items-center justify-content-center bg-success text-white rounded-circle fs-3 mb-3" style="width: 60px; height: 60px;">
                    <i class="bi bi-credit-card"></i>
                </div>
                <h3 class="fs-5 text-body-emphasis">Secure Payment Options</h3>
                <p>
                    Our payment options are fully secure and we accept all major credit cards.
                </p>
            </div>

            <div class="feature col border-2 p-4 rounded shadow">
                <div class="feature-icon d-inline-flex align-items-center justify-content-center bg-success text-white rounded-circle fs-3 mb-3" style="width: 60px; height: 60px;">
                    <i class="bi bi-headset"></i>
                </div>
                <h3 class="fs-5 text-body-emphasis">Customer Support</h3>
                <p>
                    Our customer support team is available 24/7 to assist with any questions or concerns.
                </p>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <h2 class="text-center display-3 bold">Explore by Categories</h2>
        <div class="d-flex flex-wrap g-4">
        @php
    $categories = [
        'Arts & Crafts', 
        'Automotive', 
        'Baby Products', 
        'Beauty',
        'Personal Care', 
        'Electronics', 
        'Fashion', 
        'Health & Household', 
        'Home & Kitchen', 
        'Office Supplies', 
        'Sports', 
        'Toys & Games', 
        'Books', 
        'Pet Supplies', 
        'Garden', 
        'Gaming Consoles',
        'Crafts', 
        'Auto', 
        'Tech', 
        'Home', 
        'Office', 
        'Fitness', 
        'Games',
        'Music', 
        'Appliances', 
        'Outdoor', 
        'Baby Gear', 
        'Food & Drink', 
        'Jewelry', 
        'Furniture', 
        'Tools', 
        'Travel', 
        'Luggage', 
        'Stationery', 
        'Party Supplies', 
        'Education',
        'Musical Instruments',
        'Arts & Collectibles',
        'Home Decor',
    ];
@endphp

            

            @foreach ($categories as $index => $category)
                <div class="d-flex  {{ $index % 2 === 0 ? 'ms-md-0' : 'ms-md-2' }} mt-3">
                    <div class="card text-center shadow border-0 mx-1">
                        <div class="card-body fs-4" >
                            {{ $category }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row text-center mt-2">
            <button class="btn btn-secondary btn-lg" type="button">And Many More</button>
        </div>

    </div>

    <a href="#hero-section" class="btn btn-secondary btn-md position-fixed bottom-0 end-0 m-4" style="z-index: 1000;">
        <i class="bi bi-arrow-up"></i>
    </a>

    <i class="bi-collection display-1"></i>
    <i class="bi bi-alarm"></i>
    <i class="bi bi-heart-fill text-info"></i>
    <div class="border-bottom my-5"></div>
@endsection

