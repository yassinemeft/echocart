@extends('layouts.app') <!-- Extend your layout -->

@section('content')

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
@endsection
