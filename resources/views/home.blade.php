@extends('layouts.app')

@section('title', 'Home')

@section('styles')
    <style>
        /* Typing effect styles */
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


    <!--status message-->
    @if (session('success'))
    <div class="alert alert-success text-center">
        {{ session('success') }}
    </div>
    @endif
    <!--status message-->


    <!-- Hero section with background image -->
    <div id="hero-section" class="p-5 text-center bg-dark vh-100" 
         style="background-image: url('{{ asset('images/hero.jpg') }}'); background-size: cover; background-position: center;">
        <div class="mask" style="height: 100%;">
            <div class="d-flex justify-content-center align-items-center h-100">
                <div class="text-dark">
                    <h1 class="display-3 mb-3">Welcome to EchoCart</h1>
                    <h4 class="mb-4">Lorem ipsum dolor amet consectetur adipisicing elit. Quisquam, quod.</h4>
                    <a data-mdb-ripple-init class="btn btn-outline-dark btn-lg m-2" 
                       href="{{route('product.search')}}" role="button" rel="nofollow" target="_blank">Explore our Products</a>
                    <a data-mdb-ripple-init class="btn btn-outline-dark btn-lg m-2" 
                       href="#featured" role="button">Learn more</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Welcome section with typing effect -->
    <div class="d-flex p-5 mb-4 bg-light rounded-3">
        <div class="py-5 mt-5">
            <div class="typing mb-4">
                <h2 class="display-3 fw-bold">Welcome EchoCart</h2>
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

    <!-- Featured section -->
    <div class="container py-5 text-center" id="featured">
        <h2 class="display-3 bold">Why Choose EchoCart</h2>
        <div class="d-flex py-4">
            <div class="feature col border-2 p-4 rounded shadow">
                <div class="feature-icon d-inline-flex align-items-center justify-content-center bg-success text-white rounded-circle fs-3 mb-3" 
                     style="width: 60px; height: 60px;">
                    <i class="bi bi-truck"></i>
                </div>
                <h3 class="fs-5 text-body-emphasis">Fast and Reliable Delivery</h3>
                <p>
                    We offer a wide range of delivery options to ensure that your products reach you quickly and efficiently.
                </p>
            </div>

            <div class="feature col border-2 p-4 rounded shadow mx-4">
                <div class="feature-icon d-inline-flex align-items-center justify-content-center bg-success text-white rounded-circle fs-3 mb-3" 
                     style="width: 60px; height: 60px;">
                    <i class="bi bi-credit-card"></i>
                </div>
                <h3 class="fs-5 text-body-emphasis">Secure Payment Options</h3>
                <p>
                    Our payment options are fully secure and we accept all major credit cards.
                </p>
            </div>

            <div class="feature col border-2 p-4 rounded shadow">
                <div class="feature-icon d-inline-flex align-items-center justify-content-center bg-success text-white rounded-circle fs-3 mb-3" 
                     style="width: 60px; height: 60px;">
                    <i class="bi bi-headset"></i>
                </div>
                <h3 class="fs-5 text-body-emphasis">Customer Support</h3>
                <p>
                    Our customer support team is available 24/7 to assist with any questions or concerns.
                </p>
            </div>
        </div>
    </div>

    <!--line-->
    <div class="border-bottom my-3"></div>
    <!--line-->

    <!-- Categories section -->
    <div class="container-fluid my-5">
        <h2 class="text-center display-3 bold">Explore by Categories</h2>
        <div class="d-flex justify-content-center flex-wrap g-4">
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
                    'Photography',
                    'Smart Devices',
                    'Wellness',
                    'Camping Gear',
                    'Clothing',
                    'Footwear',
                    'Accessories',
                    'Watches',
                    'Cosmetics',
                    'Gaming Accessories',
                    'Kitchen Appliances',
                    'Seasonal Products',
                    'Office Furniture',
                    'DIY & Craft Supplies',
                    'Green Products',
                    'Safety Equipment',
                    'Industrial Tools',
                    'Handbags',
                    'Jewelry',
                    'Baby Clothing',
                    'Kids',
                    'Men',
                    'Women',
                    'Collectibles',
                    'Coins',
                    'Sports Memorabilia',
                    'Toys',
                    'Vintage',
                    'Home & Garden',
                    'Kitchen',
                    'Pet',
                    'Tools & Hardware',
                    'Electronics',
                    'Laptop',
                    'Mobile',
                    'Tablet',
                    'TV',
                    'Home Audio',
                    'Headphones',
                    'Gaming',
                    'Software',
                    'Camera',
                    'Smartwatches',
                ];
            
            @endphp

            @foreach ($categories as $index => $category)
                <div class="d-flex {{ $index % 2 === 0 ? 'ms-md-0' : 'ms-md-2' }} mt-3">
                    <div class="card text-center border-1 mx-1 py-0">
                        <div class="card-body py-1">
                            {{ $category }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row text-center row-cols-3 row-cols-md-3 mt-4">
            <span class="col"></span>
            <button class="btn btn-secondary btn-md" type="button">And Many More</button>
            <span class="col"></span>
        </div>
    </div>
    

    <!-- Contact Us Section -->
<!-- Contact Us Section -->
<section class="py-5 bg-light" id="contact-us">
    <div class="container justify-content-center text-center py-3">

        <!-- Section Header -->
        <div class="text-center mb-5">
            <h2 class="fw-bold">Contact Us</h2>
            <p class="text-muted">
                Have questions? We'd love to hear from you. Our team is here to assist you!
            </p>
        </div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="row justify-content-center text-center">
            <!-- Contact Form -->
            <div class="flex justify-content-center col-md-7 me-7">
                <form
                    id="contact-form"
                    action="{{ route('contact.submit') }}"
                    method="POST"
                    class="p-4 shadow rounded bg-white d-flex justify-content-center">
                    @csrf

                    <div>
                        <!-- Name and Email -->
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}"  placeholder="Name" required />
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <label for="name">Your Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Email" required />
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <label for="email">Your Email</label>
                                </div>
                            </div>
                        </div>

                        <!-- Subject -->
                        <div class="form-floating my-3">
                            <input type="text" id="subject" name="subject" class="form-control" placeholder="Subject" required />
                            @error('subject')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <label for="subject">Subject</label>
                        </div>

                        <!-- Message -->
                        <div class="form-floating mb-4">
                            <textarea id="message" name="message" class="form-control" placeholder="Your Message" style="height: 150px;" required></textarea>
                            @error('message')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <label for="message">Your Message</label>
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-secondary btn-md">
                                Send Message
                            </button>
                        </div>
                    </div>
                    <!-- Contact Information -->
                    <div class="ms-5 mt-4">
                        <div class="grid cols-3 justify-content-end text-center">
                            <div class="col-12">
                                <div class="mb-3">
                                    <i class="bi bi-geo-alt fs-2 text-secondary"></i>
                                    <p class="mb-0">
                                        El Frena, Essaouira, Morocco
                                    </p>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <i class="bi bi-telephone fs-2 text-secondary"></i>
                                    <p class="mb-0">+1 234 567 89</p>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <i class="bi bi-envelope fs-2 text-secondary"></i>
                                    <p class="mb-0">ymeftah777@gmail.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- End of Contact Form -->

        </div>
    </div>
</section>
<!-- End of Contact Us Section -->


    



    <!-- Back to top button -->
    <a href="#hero-section" class="btn btn-secondary btn-md position-fixed bottom-0 end-0 m-4" style="z-index: 1000;">
        <i class="bi bi-arrow-up"></i>
    </a>

@endsection




